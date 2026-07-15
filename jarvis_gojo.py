import cv2
import mediapipe as mp
import numpy as np
import random
import math

# --- Инициализация MediaPipe ---
mp_hands = mp.solutions.hands
hands = mp_hands.Hands(
    max_num_hands=2, 
    min_detection_confidence=0.7, 
    min_tracking_confidence=0.7
)

WIDTH, HEIGHT = 1280, 720

# --- Частицы Джарвиса ---
NUM_PARTICLES = 160
particles = []
for _ in range(NUM_PARTICLES):
    particles.append({
        "x": random.randint(0, WIDTH),
        "y": random.randint(0, HEIGHT),
        "vx": random.uniform(-3, 3),
        "vy": random.uniform(-3, 3),
        "size": random.randint(4, 7)
    })

# Состояние фиолетового шара
purple_ball = {
    "active": False, "attached": True,
    "x": 0, "y": 0, "vx": 0, "vy": 0,
    "radius": 40, "trail": []
}

was_fist = False
holo_angle = 0.0

# 3D Вершины куба для Тессеракта (Outer & Inner Cube)
cube_vertices = np.array([
    [-1, -1, -1], [1, -1, -1], [1, 1, -1], [-1, 1, -1],
    [-1, -1, 1],  [1, -1, 1],  [1, 1, 1],  [-1, 1, 1]
], dtype=float)

# --- Вспомогательные 3D функции ---
def rotate_3d(points, angle_x, angle_y):
    """Вращение 3D точек по осям X и Y"""
    rad_x, rad_y = math.radians(angle_x), math.radians(angle_y)
    
    # Матрица поворота Y
    rot_y = np.array([
        [math.cos(rad_y), 0, math.sin(rad_y)],
        [0, 1, 0],
        [-math.sin(rad_y), 0, math.cos(rad_y)]
    ])
    # Матрица поворота X
    rot_x = np.array([
        [1, 0, 0],
        [0, math.cos(rad_x), -math.sin(rad_x)],
        [0, math.sin(rad_x), math.cos(rad_x)]
    ])
    
    return np.dot(points, np.dot(rot_y, rot_x).T)

def project_3d(points_3d, center, scale):
    """Перспективная проекция 3D точек на 2D экран"""
    cx, cy = center
    points_2d = []
    for p in points_3d:
        z = p[2] + 4  # Дистанция камеры
        x = int(p[0] * scale / z + cx)
        y = int(p[1] * scale / z + cy)
        points_2d.append((x, y))
    return points_2d

def apply_welding_glow(frame, effects_layer):
    """Аниме-свечение высокого уровня"""
    blur_large = cv2.GaussianBlur(effects_layer, (51, 51), 0)
    kernel_h = cv2.getStructuringElement(cv2.MORPH_RECT, (41, 1))
    kernel_v = cv2.getStructuringElement(cv2.MORPH_RECT, (1, 41))
    flare_h = cv2.morphologyEx(effects_layer, cv2.MORPH_CLOSE, kernel_h)
    flare_v = cv2.morphologyEx(effects_layer, cv2.MORPH_CLOSE, kernel_v)
    
    glow = cv2.addWeighted(blur_large, 2.2, flare_h, 1.8, 0)
    glow = cv2.addWeighted(glow, 1.0, flare_v, 1.8, 0)
    
    combined = cv2.addWeighted(frame, 0.85, glow, 2.0, 0)
    combined = cv2.add(combined, effects_layer)
    return combined

def draw_welding_sphere(img, center, radius, color):
    """Сверхъяркая аниме-сфера со свечением"""
    x, y = center
    cv2.circle(img, (x, y), int(radius * 2.0), color, -1)
    cv2.circle(img, (x, y), int(radius * 1.2), (min(color[0]+80, 255), min(color[1]+80, 255), min(color[2]+80, 255)), -1)
    cv2.circle(img, (x, y), int(radius * 0.5), (255, 255, 255), -1)

# --- Распознавание пальцев ---
def count_fingers(hand_landmarks):
    """Считает количество поднятых пальцев"""
    tips = [8, 12, 16, 20]
    pips = [6, 10, 14, 18]
    count = 0
    # Большой палец
    if abs(hand_landmarks.landmark[4].x - hand_landmarks.landmark[0].x) > 0.15:
        count += 1
    # Остальные пальцы
    for tip, pip in zip(tips, pips):
        if hand_landmarks.landmark[tip].y < hand_landmarks.landmark[pip].y:
            count += 1
    return count

def is_fist(hand_landmarks):
    wrist = hand_landmarks.landmark[0]
    tips, mcp = [8, 12, 16, 20], [5, 9, 13, 17]
    closed = sum(1 for tip, base in zip(tips, mcp) if math.hypot(hand_landmarks.landmark[tip].x - wrist.x, hand_landmarks.landmark[tip].y - wrist.y) < math.hypot(hand_landmarks.landmark[base].x - wrist.x, hand_landmarks.landmark[base].y - wrist.y))
    return closed >= 3

def is_pointing(hand_landmarks):
    return hand_landmarks.landmark[8].y < hand_landmarks.landmark[6].y and hand_landmarks.landmark[12].y > hand_landmarks.landmark[10].y

def is_open_palm(hand_landmarks):
    wrist = hand_landmarks.landmark[0]
    tips = [4, 8, 12, 16, 20]
    open_fingers = sum(1 for tip in tips if math.hypot(hand_landmarks.landmark[tip].x - wrist.x, hand_landmarks.landmark[tip].y - wrist.y) > 0.25)
    return open_fingers >= 4

cap = cv2.VideoCapture(0)
cap.set(3, WIDTH)
cap.set(4, HEIGHT)

earth_rot_x, earth_rot_y = 0, 0

while cap.isOpened():
    ret, frame = cap.read()
    if not ret: break

    frame = cv2.flip(frame, 1)
    rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    results = hands.process(rgb_frame)

    effects_layer = np.zeros_like(frame)

    fist_center = None
    pointing_hands = []
    open_palms = []
    hands_info = []

    if results.multi_hand_landmarks:
        for hand in results.multi_hand_landmarks:
            cx, cy = int(hand.landmark[9].x * WIDTH), int(hand.landmark[9].y * HEIGHT)
            ix, iy = int(hand.landmark[8].x * WIDTH), int(hand.landmark[8].y * HEIGHT)
            
            f_count = count_fingers(hand)
            hands_info.append({"pos": (cx, cy), "index_pos": (ix, iy), "fingers": f_count, "landmarks": hand})

            if is_fist(hand): fist_center = (cx, cy)
            if is_pointing(hand): pointing_hands.append((ix, iy))
            if is_open_palm(hand): open_palms.append((cx, cy))

    # --- 1. ЛОГИКА ВЗРЫВА ДЖАРВИСА ---
    holo_angle += 2.0

    if was_fist and len(open_palms) > 0 and not fist_center:
        for p in particles:
            angle = random.uniform(0, 2 * math.pi)
            speed = random.uniform(18, 40)
            p["vx"] = math.cos(angle) * speed
            p["vy"] = math.sin(angle) * speed

    was_fist = (fist_center is not None)

    # --- 2. 3D ТЕССЕРАКТ ИЛИ ГОЛОГРАММА ЗЕМЛИ ---
    active_3d_mode = None
    center_3d = None
    controller_hand_pos = None

    for h in hands_info:
        if h["fingers"] == 2 and not active_3d_mode:
            active_3d_mode = "TESSERACT"
            center_3d = h["index_pos"]
        elif h["fingers"] == 3 and not active_3d_mode:
            active_3d_mode = "EARTH"
            center_3d = h["pos"]
        elif active_3d_mode and not controller_hand_pos:
            controller_hand_pos = h["pos"] # Вторая рука управляет вращением!

    # Отрисовка Тессеракта (2 пальца)
    if active_3d_mode == "TESSERACT" and center_3d:
        rot_pts_outer = rotate_3d(cube_vertices * 1.2, holo_angle, holo_angle * 0.7)
        rot_pts_inner = rotate_3d(cube_vertices * 0.6, -holo_angle * 1.2, -holo_angle)
        
        pts2d_out = project_3d(rot_pts_outer, center_3d, 350)
        pts2d_in = project_3d(rot_pts_inner, center_3d, 350)

        edges = [(0,1),(1,2),(2,3),(3,0), (4,5),(5,6),(6,7),(7,4), (0,4),(1,5),(2,6),(3,7)]
        
        # Грани внутреннего и внешнего куба
        for i, j in edges:
            cv2.line(effects_layer, pts2d_out[i], pts2d_out[j], (255, 230, 0), 2)
            cv2.line(effects_layer, pts2d_in[i], pts2d_in[j], (255, 100, 0), 2)
            cv2.line(effects_layer, pts2d_out[i], pts2d_in[i], (255, 255, 255), 1)

    # Отрисовка 3D Голограммы Земли (3 пальца)
    elif active_3d_mode == "EARTH" and center_3d:
        if controller_hand_pos:
            earth_rot_y = (controller_hand_pos[0] - WIDTH // 2) * 0.5
            earth_rot_x = (controller_hand_pos[1] - HEIGHT // 2) * 0.5
        else:
            earth_rot_y += 1.5

        # Меридианы и Экватор
        r = 90
        cv2.circle(effects_layer, center_3d, r, (255, 180, 0), 2) # Оболочка
        
        for lat in range(-60, 90, 30):
            rad = math.radians(lat)
            lat_r = int(r * math.cos(rad))
            lat_y = int(center_3d[1] + r * math.sin(rad) * math.cos(math.radians(earth_rot_x)))
            cv2.ellipse(effects_layer, (center_3d[0], lat_y), (lat_r, int(lat_r * 0.3)), int(earth_rot_y), 0, 360, (255, 200, 50), 1)

        # Текст Голограммы
        cv2.putText(effects_layer, "HOLOGRAM EARTH 3D", (center_3d[0] - 80, center_3d[1] + r + 25), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (255, 255, 255), 1)

    # --- 3. ОБРАБОТКА ЧАСТИЦ ДЖАРВИСА ---
    for i, p in enumerate(particles):
        if fist_center:
            target_angle = math.radians(holo_angle) + (i * (2 * math.pi / NUM_PARTICLES))
            radius = 70 + (i % 3) * 15
            tx = fist_center[0] + radius * math.cos(target_angle)
            ty = fist_center[1] + radius * math.sin(target_angle)
            
            p["x"] += (tx - p["x"]) * 0.25
            p["y"] += (ty - p["y"]) * 0.25
        else:
            p["x"] += p["vx"]
            p["y"] += p["vy"]
            p["vx"] *= 0.95
            p["vy"] *= 0.95

            if abs(p["vx"]) < 1.0: p["vx"] = random.uniform(-2, 2)
            if abs(p["vy"]) < 1.0: p["vy"] = random.uniform(-2, 2)

            if p["x"] <= 0 or p["x"] >= WIDTH: p["vx"] *= -1
            if p["y"] <= 0 or p["y"] >= HEIGHT: p["vy"] *= -1

        cv2.circle(effects_layer, (int(p["x"]), int(p["y"])), p["size"], (255, 220, 50), -1)
        cv2.circle(effects_layer, (int(p["x"]), int(p["y"])), max(1, p["size"]-3), (255, 255, 255), -1)

    # --- 4. МАКЕТ СВАРКИ И ТЕХНИКА ГОДЖО ---
    if len(pointing_hands) == 1 and not purple_ball["active"]:
        draw_welding_sphere(effects_layer, pointing_hands[0], 35, (255, 120, 0)) # Слепящий Синий

    elif len(pointing_hands) >= 2 and not purple_ball["active"]:
        p1, p2 = pointing_hands[0], pointing_hands[1]
        dist = math.hypot(p1[0] - p2[0], p1[1] - p2[1])

        if dist < 80:
            purple_ball["active"] = True
            purple_ball["attached"] = True
            purple_ball["x"], purple_ball["y"] = (p1[0] + p2[0]) // 2, (p1[1] + p2[1]) // 2
            purple_ball["radius"] = 45
            purple_ball["trail"] = []
        else:
            draw_welding_sphere(effects_layer, p1, 35, (255, 120, 0)) # Синий
            draw_welding_sphere(effects_layer, p2, 35, (0, 0, 255))   # Красный

    # --- 5. УПРАВЛЕНИЕ ФИОЛЕТОВЫМ ШАРОМ ---
    if purple_ball["active"]:
        if purple_ball["attached"]:
            if len(hands_info) > 0:
                purple_ball["x"], purple_ball["y"] = hands_info[0]["pos"]
                if purple_ball["radius"] < 80: purple_ball["radius"] += 0.8
                
                if len(open_palms) > 0 and not was_fist:
                    purple_ball["attached"] = False
                    purple_ball["vx"], purple_ball["vy"] = 0, -32
            else:
                purple_ball["attached"] = False
                purple_ball["vy"] = -25
        else:
            purple_ball["x"] += purple_ball["vx"]
            purple_ball["y"] += purple_ball["vy"]
            purple_ball["radius"] += 2.0
            
            purple_ball["trail"].append((int(purple_ball["x"]), int(purple_ball["y"]), int(purple_ball["radius"])))
            if len(purple_ball["trail"]) > 8: purple_ball["trail"].pop(0)

            if purple_ball["y"] < -150: purple_ball["active"] = False

        for tx, ty, tr in purple_ball["trail"]:
            cv2.circle(effects_layer, (tx, ty), int(tr * 0.8), (200, 0, 200), -1)

        draw_welding_sphere(
            effects_layer, 
            (int(purple_ball["x"]), int(purple_ball["y"])), 
            int(purple_ball["radius"]), 
            (255, 0, 200)
        )

    # Применение свечения
    final_output = apply_welding_glow(frame, effects_layer)

    cv2.imshow("Jarvis Gojo 3D Hologram Engine", final_output)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
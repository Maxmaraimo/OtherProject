<?php 
ini_set('display_errors',1);

ob_start();
define('API_KEY','token');

$tolovkanal="-1001924669357";
$auksionkanal="-1001922251092";
$bot=bot('getMe',['bot'])->result->username;
$admin = "1085806656";

require_once 'Qiwi.php';
$qiwi = new Qiwi('+998777772982', 'token');

echo file_get_contents('https://api.telegram.org/bot'.API_KEY.'/setwebhook?url='.$_SERVER["SERVER_NAME"].''.$_SERVER["SCRIPT_NAME"].'&allowed_updates=["message","edited_message","callback_query","my_chat_member","chat_member"]');

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}


$db = mysqli_connect("localhost","login","parol","login");
if($db){
echo "Ulandi</br>";
}else{
echo "error";
}


mysqli_query($db,"create table users(
id int(20) auto_increment primary key,
user_id varchar(300),
odam varchar(400),
myref varchar(400),
sana varchar(300),
balans varchar(700),
plus varchar(700),
minus varchar(700),
gamebalans varchar(700)
)");


mysqli_query($db,"create table step(
id int(20) auto_increment primary key,
userid varchar(500),
text varchar(800)
)");



mysqli_query($db,"create table ban(
id int(20) auto_increment primary key,
user_id varchar(300),
sana varchar(500)
)");


$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
if($update->message){
$cid = $message->chat->id;
$mid = $message->message_id;
$text = $message->text;  
$type = $update->message->chat->type;
$uid= $message->from->id;
$contact=$message->contact;
$nomer=$contact->phone_number;
$conid=$contact->user_id;
$name1=$message->from->first_name;
$namee = str_replace(["[","]","(",")","*","_","`","<",">","/"],["","","","","","","","","",""],$name1);
$name="<a href='tg://user?id=$uid'>$name1</a>";
}


if($update->callback_query){
$data=$update->callback_query->data;
$mid= $update->callback_query->message->message_id;
$cid= $update->callback_query->message->chat->id;
$uid= $update->callback_query->from->id;
$qid = $update->callback_query->id;
$type=$update->callback_query->message->chat->type;
$name1= $update->callback_query->from->first_name;
$namee = str_replace(["[","]","(",")","*","_","`","<",">","/"],["","","","","","","","","",""],$name1);
$name="<a href='tg://user?id=$uid'>$name1</a>";
}

date_default_timezone_set("asia/Tashkent");
$sana=date("d.m.Y");


if($type=="private"){
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$uid'");
    $row = mysqli_fetch_assoc($result);
if($row){
}else{
mysqli_query($db, "INSERT INTO users(user_id,balans,odam,plus,minus,gamebalans,sana) VALUES ('$uid','0','0','0','0','0','$sana')");
mysqli_query($db, "INSERT INTO step(userid,text) VALUES ('$uid','null')");
}
}


$botdel = $update->my_chat_member->new_chat_member;  
$botdelid = $update->my_chat_member->chat->id;  
$userstatus= $botdel->status;  
if($botdel){  
if($userstatus=="kicked"){  
mysqli_query($db, "DELETE FROM users WHERE user_id='$botdelid'");
}
}

if($text){
$result = mysqli_query($db,"SELECT * FROM auksion");
$rew = mysqli_fetch_assoc($result);
if($rew){
}else{
mysqli_query($db,"INSERT INTO auksion (mid,soni,start,vaqt,status,send,holat) VALUES ('1000','0','00:00','00:00','passive','800','copyMessage')");
}
}




$menu=json_encode(['resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💎Auksion"],['text'=>"🗄 Kabinet"]],
[['text'=>"👥 Referal"],['text'=>"🎮O'yinlar"]],
[['text'=>"📂Qo'llanma"],['text'=>"📈 Statistika"]],
]
]);


$kabinet=json_encode(['inline_keyboard'=>[
[['callback_data'=>"toldirish",'text'=>"📥 To'ldirish"],['callback_data'=>"yechish",'text'=>"📤 Yechib Olish"]],
[['callback_data'=>"promokod",'text'=>"🎟Promo aktivlash"],['callback_data'=>"invest",'text'=>"💱Qayta invest"]],
]
]);

$auksion=json_encode(['inline_keyboard'=>[
[['callback_data'=>"startauksion",'text'=>"🧑‍⚖️ Auksionni boshlash"]],
[['url'=>"https://t.me/Auksioner_Uz",'text'=>"👀 Auksionni kuzatish"]],
]
]);


$games=json_encode(['inline_keyboard'=>[
[['callback_data'=>"sandiq",'text'=>"🔐 Sandiq"]],
[['callback_data'=>"ruletka",'text'=>"💈 Ruletka"]],
]
]);

$toldirish=json_encode(['inline_keyboard'=>[
[['callback_data'=>"qiwi",'text'=>"🥝Qiwi(avto)"],['callback_data'=>"karta",'text'=>"💳Karta"]],
[['callback_data'=>"payeer",'text'=>"🅿ayeer"]],
]
]);

$yechish=json_encode(['inline_keyboard'=>[
[['callback_data'=>"yech_qiwi",'text'=>"🥝Qiwi"],['callback_data'=>"yech_karta",'text'=>"💳Karta"]],
]
]);

$statics=json_encode(['inline_keyboard'=>[
[['url'=>"https://t.me/King_0958",'text'=>"👨‍💻Texnik Yordam"]],
[['url'=>"https://t.me/sto_coder",'text'=>"👨‍💻Administrator"]],
[['url'=>"https://t.me/auksioner_pay",'text'=>"💳 To'lovlar"],['url'=>"https://t.me/Auksioner_Group",'text'=>"💬 Chat"]],
[['url'=>"https://t.me/Auksioner_Uz",'text'=>"🎩 Auksion Kanal"]],
[['callback_data'=>"yechganlar",'text'=>"📤 Yechganlar"]],
[['callback_data'=>"referallar",'text'=>"👥 Referallar"]],
]
]);

$diqqat=json_encode(['inline_keyboard'=>[
[['url'=>"https://t.me/sto_coder",'text'=>"👨‍⚖️ Admin"]],
[['url'=>"https://t.me/Auksioner_group",'text'=>"💬 Rasmiy guruhimiz"]],
]
]);


$refs=json_encode(['inline_keyboard'=>[
[['callback_data'=>"referallar",'text'=>"👥Top referallar"]],
]
]);

$back=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"],],
]
]);

$toldirback=json_encode(['inline_keyboard'=>[
[['callback_data'=>"toldirish",'text'=>"◀️ Orqaga"]],
]
]);

$sandiq=json_encode(['inline_keyboard'=>[
[['callback_data'=>"sandiq=1",'text'=>"1₽"],['callback_data'=>"sandiq=2",'text'=>"2₽"],['callback_data'=>"sandiq=5",'text'=>"5₽"],['callback_data'=>"sandiq=10",'text'=>"10₽"]],
[['callback_data'=>"sandiq=25",'text'=>"25₽"],['callback_data'=>"sandiq=50",'text'=>"50₽"],['callback_data'=>"sandiq=100",'text'=>"100₽"],['callback_data'=>"sandiq=250",'text'=>"250₽"]],
]
]);



function auksion($cid,$text,$menu){
bot('sendMessage', [
'chat_id' =>$cid,
'parse_mode'=>'HTML',
'text' =>$text,
'disable_web_page_preview'=>true,
'reply_markup'=>$menu
]);
}

function delete(){
	global $cid,$mid;
bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$mid]);
}


$auksionstart=file_get_contents("admin/auksion.start");
if(!$auksionstart){
file_put_contents("admin/auksion.start","finish");
}

$yechilgan=file_get_contents("admin/yechilgan.pul");
if($yechilgan){
}else{
file_put_contents("admin/yechilgan.pul","0");
}
mkdir("admin");
mkdir("step");
mkdir("user");
mkdir("game");
mkdir("Qiwi");

function step($txt){
global $uid;
file_put_contents("step/$uid.step",$txt);
}



$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$uid'");
$row = mysqli_fetch_assoc($result);
$gamebalans=$row['gamebalans'];
$balans=$row['balans'];
$plus=$row['plus'];
$minus=$row['minus'];
$odam=$row['odam'];
$myref=$row['myref'];


$step=file_get_contents("step/$uid.step");

function joinchannel($uid){
$kanal1 = bot("getChatMember",[
"chat_id"=>"-1001924669357",
"user_id"=>$uid,
])->result->status;
$kanal2= bot("getChatMember",[
"chat_id"=>"-1001922251092",
"user_id"=>$uid,
])->result->status;
$gurux = bot("getChatMember",[
"chat_id"=>"-1001934504918",
"user_id"=>$uid,
])->result->status;
if(($kanal1=="creator" or $kanal1=="administrator" or $kanal1=="member") and ($kanal2=="creator" or $kanal2=="administrator" or $kanal2=="member") and ($gurux=="creator" or $gurux=="administrator" or $gurux=="member")){
return true;
}else{
bot("sendMessage",[
"chat_id"=>$uid,
"text"=>"<b>👋  Auksionda ishtirok etib 5000₱ yutib olish uchun quydagi kanallarga obuna bo'ling! ⤵️</b>",
"parse_mode"=>"html",
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"💳 To'lovlar","url"=>"https://t.me/Auksioner_Pay"],["text"=>"💬 Rasmiy guruh","url"=>"https://t.me/Auksioner_Group"]],
[["text"=>"🎩 Auksion Kanali","url"=>"https://t.me/Auksioner_Uz"]],
]
]),
]);
exit();
}
}

$ids=file_get_contents("users.id");
if(mb_stripos($ids,$uid)!==false){
}else{
file_put_contents("users.id",$ids."\n".$uid);
}

if($type=="private"){

if(mb_stripos($text,"/start ")!==false){
$id=explode(" ",$text)[1];
if($id==$uid){
auksion($cid,"👋 Assalomu alaykum, $name1
👨‍⚖️ Rasmiy Auksionga xush kelibsiz!

📰 Auksion juda oddiy ishlangan
├─Hisobni to'ldiring! 💳 
├─Auksionda qatnashing
├─G'alaba qozoning   👑 
└─Pulni yechib oling 📥 

💬 Rasmiy guruh: <a href='https://t.me/Auksioner_Group'>AuksionChat</a>
💳 To'lovlar kanali: <a href='https://t.me/auksioner_pay'>AuksionPay</a>",$menu);
}else{
if(mb_stripos($ids,$uid)!==false){
auksion($cid,"👋 Assalomu alaykum, $name1
👨‍⚖️ Rasmiy Auksionga xush kelibsiz!

📰 Auksion juda oddiy ishlangan
├─Hisobni to'ldiring! 💳 
├─Auksionda qatnashing
├─G'alaba qozoning   👑 
└─Pulni yechib oling 📥 

💬 Rasmiy guruh: <a href='https://t.me/Auksioner_Group'>AuksionChat</a>
💳 To'lovlar kanali: <a href='https://t.me/auksioner_pay'>AuksionPay</a>",$menu);
}else{
auksion($cid,"👋 Assalomu alaykum, $name1
👨‍⚖️ Rasmiy Auksionga xush kelibsiz!

📰 Auksion juda oddiy ishlangan
├─Hisobni to'ldiring! 💳 
├─Auksionda qatnashing
├─G'alaba qozoning   👑 
└─Pulni yechib oling 📥 

💬 Rasmiy guruh: <a href='https://Auksioner_Group'>AuksionChat</a>
💳 To'lovlar kanali: <a href='https://t.me/auksioner_pay'>AuksionPay</a>",$menu);
auksion($id,"👥Sizda yangi referal mavjud va sizga 0.25₽ berildi.",$menu);
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$id'");
$row = mysqli_fetch_assoc($result);
$gamebalans=$row['gamebalans'];
$odam=$row['odam'];
$a=$odam+1;
$b=$gamebalans+0.25;
mysqli_query($db,"UPDATE users SET odam='$a' WHERE user_id='$id'");
mysqli_query($db,"UPDATE users SET gamebalans='$b' WHERE user_id='$id'");
file_put_contents("users.id",$ids."\n".$uid);
}
}
}



if($text=="/start" or $text=="🔙Orqaga"){
step(" ");
auksion($cid,"👋 Assalomu alaykum, $name1
👨‍⚖️ Rasmiy Auksionga xush kelibsiz!

📰 Auksion juda oddiy ishlangan
├─Hisobni to'ldiring! 💳 
├─Auksionda qatnashing
├─G'alaba qozoning   👑 
└─Pulni yechib oling 📥 

💬 Rasmiy guruh: <a href='https://t.me/Auksioner_Group'>AuksionChat</a>
💳 To'lovlar kanali: <a href='https://t.me/auksioner_pay'>AuksionPay</a>",$menu);
exit();
}

if(joinchannel($uid)==true){

if($data=="back"){
delete();
unlink("step/$uid.step");
auksion($cid,"<b>👋 O'zingizga kerakli bo'limni tanlang!</b>",$menu);
exit();
}


if($text=="📂Qo'llanma"){
step(" ");
auksion($cid,"
<b>📚 Qo'llanma bilan tanishib chiqing❗️</b>
   
<b>▫️Halollik birinchi o'rinda⚖️.
▫️Hechkimga malumotlar berilmaydi💾.
▫️Shunchakiy hisobingizni to'ldiring💵.
▫️Auksionda qatnashib g'olib bo'ling👤.
▫️Istalgan hamyonga pulingizni yechib oling📤.
▫️User Nik va avatarka bo'lmagan hisoblar bloklanadi🔐.
▫️Auksion bu onlayn pul ishlash tizimi📲. </b>",$diqqat);
exit();
}


if($text=="👥 Referal"){
step(" ");
bot('sendphoto',[
'chat_id'=>$cid,
'photo'=>"https://m2945.myxvest.ru/AuksionerUz/Photos/referal.png",
'caption'=>"
<b>🔗 Sizning referal havolangiz:</b>

▫️ <code>https://t.me/$bot?start=$uid</code> ▫️

<b>▪️👤 1 ta taklif uchun 1 ₽ va 10% sarmoya kiritish▪️</b>

<b>🔔Takliflaringiz : </b> $odam",
'parse_mode'=>"html",
'reply_markup'=>$refs,
]);
exit();
}

if($text=="📈 Statistika"){
step(" ");
$use = mysqli_query($db, "SELECT * FROM `users`");
$users = mysqli_num_rows($use);
$to = mysqli_query($db, "SELECT * FROM `users` WHERE sana='$sana'");
$today = mysqli_num_rows($to);
$yechilgan=file_get_contents("admin/yechilgan.pul");
bot('sendphoto',[
'chat_id'=>$cid,
'photo'=>"https://m2945.myxvest.ru/AuksionerUz/Photos/statistika.png",
'caption'=>"
<b>📊Auksionimizning statistikasi:</b>

<b>👥Foydalanuvchilar:</b> $users
<b>👥 Bugun qo'shilganlar:</b> $today
<b>📤 Yechib olingan:</b> $yechilgan ₽",
'parse_mode'=>"html",
'reply_markup'=>$statics,
]);
exit();
}

if($text=="🎮O'yinlar"){
step(" ");
bot('sendphoto',[
'chat_id'=>$cid,
'photo'=>"https://m2945.myxvest.ru/AuksionerUz/Photos/games.png",
'caption'=>"
<b>🎮 O'yin xonasi bo'limiga xush kelibsiz.</b>",
'parse_mode'=>"html",
'reply_markup'=>$games,
]);
exit();
}

if($data=="sandiq"){
delete();
auksion($cid,"🔒 Sandiq narxini tanlang
🔒 Siz ikji barobar ko'p ₽ yutishingiz 
🔒 Yoki sandiq bo'sh bo'lishi mumkun
🎲 Ehtimollik: 50%",$sandiq);
}

if(mb_stripos($data,"sandiq=")!==false){
$stavka=explode("=",$data)[1];
delete();
$win=$stavka*2;
auksion($cid,"🔒 Sandiq narxini tanlang
🔒 Siz ikki barobar ko'p ₽ yutishingiz 
🔒 Yoki sandiq bo'sh bo'lishi mumkun
🎲 Ehtimollik: 50%
     
💳 Sizning O'yin balansingiz: $gamebalans ₽
🏹 Sizning stafkangiz: $stavka ₽
🎰 Mumkun bo'lgan yutuq: $win ₽",json_encode(['inline_keyboard'=>[
[['callback_data'=>"sandiq=1",'text'=>"1₽"],['callback_data'=>"sandiq=2",'text'=>"2₽"],['callback_data'=>"sandiq=5",'text'=>"5₽"],['callback_data'=>"sandiq=10",'text'=>"10₽"]],
[['callback_data'=>"sandiq=25",'text'=>"25₽"],['callback_data'=>"sandiq=50",'text'=>"50₽"],['callback_data'=>"sandiq=100",'text'=>"100₽"],['callback_data'=>"sandiq=250",'text'=>"250₽"]],
[['callback_data'=>"open=$stavka",'text'=>"🔓Ochish $stavka ₽"]],
]
]));
}

if(mb_stripos($data,"open=")!==false){
$stavka=explode("=",$data)[1];
if($gamebalans>$stavka){
$minus=$gamebalans-$stavka;
$win=$stavka*2;
mysqli_query($db, "UPDATE users SET gamebalans='$minus' WHERE user_id='$uid'");
delete();
$rand=rand(111,999);
if($rand=="111" or $rand=="222" or $rand=="333" or $rand=="444" or $rand=="555" or $rand=="666" or $rand=="777" or $rand=="888" or $rand=="999"){
$plus=$minus+$win;
mysqli_query($db, "UPDATE users SET gamebalans='$plus' WHERE user_id='$uid'");
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🎉Siz $win ₽ Yutdingiz",
'show_alert'=>true,
]);
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"😔Sandiq bo'sh ekan.",
'show_alert'=>true,
]);
}
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🚫Hisobingizda yetarli mablag mavjud emas!",
'show_alert'=>true,
]);
}
}

if($data=="ruletka"){
delete();
$go=file_get_contents("game/$uid.ruletka");
if(!$go){
$go="0";
}
if(mb_stripos(file_get_contents("game/ruletka.limit"),$uid)!==false){
auksion($cid,"🚫Sizda limit tugagan. 1 kunda 5ta ruletka aylantirish mumkin",$menu);
unlink("game/$uid.ruletka");
}else{
auksion($cid,"💈 Ruletka

Aylantirish narxi - 5₽. 
Yutuq o'yin balansiga tushadi
Bugun aylatirdingiz: $go/5

💳 O'yin uchun balansingiz: $gamebalans ₽

Ruletkada 6 ta yutuq bor:
0₽ | 0₽ | 0₽ | 5₽ | 10₽ | 15₽",json_encode(['inline_keyboard'=>[
[['callback_data'=>"buyruletka",'text'=>"💈Aylantirishni sotib olish 5₽"]],
]
]));
}
}

if($data=="buyruletka"){
delete();
$go=file_get_contents("game/$uid.ruletka");
if(!$go){
$go="0";
}
if($go>3){
if(mb_stripos(file_get_contents("game/ruletka.limit"),$uid)!==false){
}else{
file_put_contents("game/ruletka.limit",file_get_contents("game/ruletka.limit")."\n$uid");
}
}
$a=$go+1;
file_put_contents("game/$uid.ruletka",$a);
if($gamebalans>5){
$minus=$gamebalans-5;
mysqli_query($db, "UPDATE users SET gamebalans='$minus' WHERE user_id='$uid'");
$rand=rand(0,20);
if($rand=="5" or $rand=="15" or $rand=="10"){
$plus=$gamebalans+$rand;
mysqli_query($db, "UPDATE users SET gamebalans='$plus' WHERE user_id='$uid'");
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🎉Siz $rand ₽ Yutdingiz",
'show_alert'=>true,
]);
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"😔Afsuski sizga 0₽ tushdi.",
'show_alert'=>true,
]);
}
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🚫Hisobingizda yetarli mablag mavjud emas!",
'show_alert'=>true,
]);
}
}

if($text=="🗄 Kabinet"){
bot('sendphoto',[
'chat_id'=>$cid,
'photo'=>"https://m2945.myxvest.ru/AuksionerUz/Photos/kabinet.png",
'caption'=>"
<b>🗄 Kabinetingizga xush kelibsiz!</b>

<b>🆔 ID raqamingiz:</b> <code>$uid</code>
➖➖➖➖➖➖➖➖➖➖
<b>🎲 O'yin balansingiz:</b> $gamebalans ₽
<b>💳 Yechish balansingiz:</b> $balans ₽
➖➖➖➖➖➖➖➖➖➖
<b>📥 Sarmoyangiz:</b> $plus ₽
<b>📤 Daromadingiz:</b> $minus ₽",
'parse_mode'=>"html",
'reply_markup'=>$kabinet,
]);
step(" ");
exit();
}

if($data=="promokod"){
delete();
auksion($cid,"<b>🎟Promo Kodni kiriting!</b>",$back);
step("promokod");
exit();
}
mkdir("promo");
mkdir("promo/Promo-Aktivatsiyalar");
$promokods=file_get_contents("promo/promo.kod");
$pr=file_get_contents("promo/Promo-Aktivatsiyalar/$uid.PR");
if($step=="promokod"){
if(mb_stripos($promokods,$text && $pr==false)!==false){
$x=explode($text,$promokods)[1];
$x=explode("\n",$x)[0];
$sum=explode("-",$x)[1];
$plus=$gamebalans+$sum;
mysqli_query($db, "UPDATE users SET gamebalans='$plus' WHERE user_id='$uid'");
auksion($cid,"<b>✅Promo Kod</b> Aktivlashtirildi.
💰Summa: $sum ₽
🎮O'yin balansingiz: $plus ₽",$menu);
auksion($tolovkanal,"🎟 <a href='tg://user?id=$uid'>Foydalanuvchi</a> <b>promokodni aktivlashtirdi va o‘yin balansi uchun $sum ₽ oldi.</b>",$no);
$a=str_replace("$text-$sum\n","",$promokods);
file_put_contents("promo/promo.kod",$a);
file_put_contents("promo/Promo-Aktivatsiyalar/$uid.PR","$text");
step(" ");
}else{
auksion($cid,"🎟<b>Promo Kod</b> Mavjud emas. Yoki avval aktivlashtirilgan.",$back);
}
}

if($data == "toldirish"){
delete();
auksion($cid,"💳 Sarmoya kiritish uchun quydagi tizimlardan o'zingizga qulay usulni tanlang",$toldirish);
exit(); 
}

if($data == "qiwi"){
delete();
auksion($cid,"
<b>📲To'lov Turi:</b> <i>🥝Qiwi (Avto) </i>

<b>💳Hamyon</b> : ▫️ <code>+998777772982</code> ▫️
<b>💬Komentariyagiz:</b> <code>$uid</code>

<b>♻️Kommentni to‘gri yozmasangiz to‘lovingiz amalga oshmaydi☑️</b>",$toldirback);
exit(); 
}
if($data == "payeer"){
delete();
auksion($cid,"To'ldirish usuli: 🅿ayeer

<i>Tayyor emas</i>",$toldirish);
exit(); 
}
if($data == "karta"){
delete();
auksion($cid,"
<b>📲To'lov Turi:</b> <i>💳 Karta </i>

<b>💳Hamyon</b> : ▫️ <code>9860606736500111</code> ▫️
<b>💬Komentariyagiz:</b> <code>AUK$uid</code>

💱 150 so'm = 1₽",$toldirback);
exit(); 
}

if($data == "yechish"){
if($balans>=20){
delete();
auksion($cid,"💳 Pulni Chiqarib olish uchun quydagi tizimlardan o'zingizga qulay usulni tanlang",$yechish);
exit(); 
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🚫Minimal pul yechish: 20 rubl!",
'show_alert'=>true,
]);
}
}

if(mb_stripos($data,"yech_")!==false){
$tur=explode("_",$data)[1];
if($balans>=20){
if($tur=="qiwi"){
$t="🥝Qiwi";
}elseif($tur=="karta"){
$t="💳Karta";
}
delete();
auksion($cid,"<b>$t</b> raqamingizni yuboring!",$back);
step("yech|$t|$tur");
exit();
exit();
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🚫Minimal pul yechish: 20 rubl!",
'show_alert'=>true,
]);
}
}



if(mb_stripos($step,"yech|")!==false){
$dd=explode("|",$step);
$t=$dd[1];
$tur=$dd[2];
auksion($cid,"<b>💸Summani kiriting!</b>",$back);
file_put_contents("user/".$uid.".".$tur."",$text);
step("yechpul|$t|$tur");
exit();
}

if(mb_stripos($step,"yechpul|")!==false){
$dd=explode("|",$step);
$t=$dd[1];
$tur=$dd[2];
if($tur=="karta"){
$sum=$text*130;
$t2="UZS($text ₽)";
}elseif($tur=="qiwi"){
$sum=$text;
$t2="₽";
}
if(is_numeric($text)){
$balanss=$balans+1;
if($balanss>$text){
auksion($tolovkanal,"💳<a href='tg://user?id=$uid'>Foydalanuvchi</a> <b>pul yechish uchun ariza yubordi.</b>",$no);
auksion($cid,"<b>✅$t orqali pul yechish uchun Zayavka yuborildi!</b>",$menu);
$minuss=$balans-$text;
$bb=$minus+$text;
mysqli_query($db, "UPDATE users SET minus='$bb' WHERE user_id='$uid'");
mysqli_query($db, "UPDATE users SET balans='$minuss' WHERE user_id='$uid'");
$raqam=file_get_contents("user/".$uid.".".$tur);
bot('sendmessage',[
'chat_id'=>$admin,
'parse_mode'=>"html",
'text'=>"<a href='tg://user?id=$uid'>$name1</a>
<b>$t orqali $sum $t2 Yechib Olmoqchi.</b>
$t raqami: $raqam",
'parse_mode'=>'html',
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['callback_data'=>"tolandi=$uid=$t=$text=$tur",'text'=>"✅ To'lov Qilindi"]],
]
])
]);
step(" ");
}else{
auksion($cid,"🚫Hisobingizda yetarli mablag' mavjud emas.",$back);
}
}else{
auksion($cid,"🚫Faqat <b>Raqam</b> yuboring...",$back);
}
}

if(mb_stripos($data,"tolandi=")!==false){
bot('editMessageReplyMarkup',['chat_id'=>$cid,
'message_id'=>$mid,false]);
$dd=explode("=",$data);
$userid=$dd[1];
$summa=$dd[3];
$t=$dd[2];
$tur=$dd[4];
if($tur=="karta"){
$sum=$summa*130;
$t2="UZS($summa ₽)";
}elseif($tur=="qiwi"){
$sum=$summa;
$t2="₽";
}
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"✅To'lov Malumoti To'lovlar Kanaliga Joylandi!
$userid $t $tur $summa",
'show_alert'=>true,
]);
auksion($tolovkanal,"🤑 <a href='tg://user?id=$userid'>Foydalanuvchi</a>
<b>$t Raqamiga $sum $t2 Yechib oldi.</b>",$no);
$plus=$yechilgan+$summa;
file_put_contents("admin/yechilgan.pul",$plus);
}

if($data=="invest"){
delete();
auksion($cid,"<b>🔥 Qayta invistitsiya uchun: +10% bonus</b>

👉 Qayta investitsiya miqdorini kiriting:",$back);
step("invest");
exit();
exit();
}

if($step=="invest"){
if(is_numeric($text)){
if($balans>$text){
$y=$text/100*10;
$u=$text+$y;
$plus=$gamebalans+$u;
$minus=$balans-$text;
mysqli_query($db,"UPDATE users SET gamebalans='$plus' WHERE user_id='$uid'");
mysqli_query($db,"UPDATE users SET balans='$minus' WHERE user_id='$uid'");
auksion($cid,"<b>💱Siz qayta invest qildingiz.</b>
==========================
🎲 O'yin balansingiz: $plus ₽
💳 Yechish balansingiz: $minus ₽
==========================",$menu);
step(" ");
}else{
auksion($cid,"🚫Hisobingizda yetarli mablag' mavjud emas.",$back);
}
}else{
auksion($cid,"Qayta investitsiya qilish uchun miqdorni kiriting!",$back);
}
}

if($text=="💎Auksion"){
step(" ");
auksion($cid,"
<b>📂Auksion qoidalari:</b>

<b><i>🛎Auksionni 1₽dan boshlashingiz mumkin.
❗️ Auksion 2 ta garovga yetganda tugashi mumkin.
👑 Har qanday ishtirokchi oldingi garovni oshirishi va Liderga aylanishi mumkin.
🖇 Maksimal o'sish bosqichi-10 rubl.
📲 Garov ko'tarilgandan so'ng, auksion 10 daqiqaga uzaytiriladi.
⏰ Taymer nolga yetgandan so'ng, pul oxirgi pul tikgan kishiga o'tkaziladi.
🌐 Foydalanuvchi ketma-ket pul tika olmaydi.
♻️ Auksion tugaganda g'olib bankni 90%ni yechish balansiga oladi.
🔐Agar xechkim boshlang'ich garovni buzmasa auksion 12 soatda tugaydi va pullarini 150% qilib yechish balansiga oladi. </i></b>",$auksion);
exit();
}

if($data=="startauksion"){
delete();
if($auksionstart=="start"){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"❗Auksion allaqachon boshlangan!",
'show_alert'=>false,
]);
exit();
}else{
if($gamebalans>0){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"◀️Botimizga boshlang'ich garov uchun miqdorni yuboring!",
'show_alert'=>true,
]);
auksion($cid,"👉 Auksionni boshlash uchun boshlang'ich garovni kiriting:",$back);
step("stavka");
exit();
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"❗O'yin balansida dastlabki garov uchun mablag' yetarli emas!",
'show_alert'=>false,
]);
}
}
}


if($step=="stavka"){
if(is_numeric($text) and $text<$gamebalans and $text>0){
$tex=$text+1;
$txt=$text+10;
for($o=$tex;$o<=$txt;$o++){
$keyboards[]=["text"=>"$o ₽","callback_data"=>"stavka|$o"];
$key=array_chunk($keyboards, 5);
$key[]=[['callback_data'=>"balansim",'text'=>"💳 Mening balansim"]];
$key[]=[['url'=>"https://t.me/$bot",'text'=>"◀️ Botga Kirish"]];
$stavki=json_encode(['inline_keyboard'=>$key]);
}
auksion($auksionkanal,"✅ <a href='tg://user?id=$uid'>$name1</a> auksionni $text ₽ bilan boshladi!",$no);
$aumid=bot('sendMessage',[
'chat_id'=>$auksionkanal,
'text'=>"👨🏻‍⚖️ Auksion

⚜️ Holati: Boshlangan
⏱ Qolgan vaqt: 12:00:00
💰 Auksion banki: $text rubl
🔨 Garovlar soni: 1

👑 Lider: <a href='tg://user?id=$uid'>$name1</a> Tikdi $text rubl!

👇 Garovni oshirish uchun miqdorini tanlang:",
'parse_mode'=>'HTML',
'reply_markup'=>$stavki
])->result->message_id;
$time=date("H:i",strtotime("+30 minutes"));
$minus=$gamebalans-$text;
mysqli_query($db,"UPDATE users SET gamebalans='$minus' WHERE user_id='$uid'");
auksion($cid,"✅ Siz Auksionni $text ₽ bilan boshlab berdingiz!",$menu);
file_put_contents("admin/last.id","$uid");
file_put_contents("admin/garov.lar","1");
file_put_contents("admin/bank.txt",$text);
file_put_contents("admin/last.stavka","$text");
file_put_contents("admin/auksion.start","start");
file_put_contents("admin/auksion.mid","$aumid");
file_put_contents("admin/auksion.time","$time");
file_put_contents("admin/hour.txt","12");
file_put_contents("admin/hour.txt2","10");
step(" ");
exit();
}else{
auksion($cid,"<b>
❗Garov uchun summa qabul qilinmadi
🔴Buning uchun 3ta sabab bo‘lishi mumkin:
<i>
1. Balansingizda yetarlicha pul yo‘q🙅‍♂️
2. Summa orasiga harf yoki belgi aralashgan⚠️
3. Siz 0₱ tikkan bo‘lishingiz mumkin(minimal 1₱ tiking)✅
</i></b>",$back);
exit();
}
}

}
}

$soat=date("H:i");
$garovv=file_get_contents("admin/garov.lar");
$atime=file_get_contents("admin/auksion.time");
$ho=file_get_contents("admin/hour.txt");
if($soat==$atime and $garovv=="1" and $ho!="0"){
if(!$ho){
$ho=12;
}
$t=$ho-1;
file_put_contents("admin/hour.txt",$t);
$stavka=file_get_contents("admin/last.stavka");
$last=file_get_contents("admin/last.id");
$bank=file_get_contents("admin/bank.txt");
$tex=$stavka+1;
$txt=$stavka+10;
for($o=$tex;$o<=$txt;$o++){
$keyboards[]=["text"=>"$o ₽","callback_data"=>"stavka|$o"];
$key=array_chunk($keyboards, 5);
$key[]=[['callback_data'=>"balansim",'text'=>"💳 Mening balansim"]];
$key[]=[['url'=>"https://t.me/$bot",'text'=>"◀️ Botga Kirish"]];
$stavki=json_encode(['inline_keyboard'=>$key]);
}
$yname = bot ('getChatMember', [
'chat_id'=> $last,
'user_id'=> $last
])->result->user->first_name;
bot('editMessageText',[
'chat_id'=>$auksionkanal,
'message_id'=>file_get_contents("admin/auksion.mid"),
'text'=>"👨🏻‍⚖️ Auksion

⚜️ Holati: Boshlangan
⏱ Qolgan vaqt: $t:00:00
💰 Auksion banki: $bank rubl
🔨 Garovlar soni: 1

👑 Lider: <a href='tg://user?id=$last'>$yname</a> Tikdi $stavka rubl!

👇 Garovni oshirish uchun miqdorini tanlang:",
'parse_mode'=>'HTML',
'reply_markup'=>$stavki
]);
$time=date("H:i",strtotime("+60 minutes"));
file_put_contents("admin/auksion.time","$time");
}



$garovv=file_get_contents("admin/garov.lar");
$atime=file_get_contents("admin/auksion.time");
$hoo=file_get_contents("admin/hour.txt2");
if($soat==$atime and $hoo!="0"){

if(!$hoo){
$hoo=10;
}
$t=$hoo-1;
file_put_contents("admin/hour.txt2",$t);
$stavka=file_get_contents("admin/last.stavka");
$last=file_get_contents("admin/last.id");
$bank=file_get_contents("admin/bank.txt");
$tex=$stavka+1;
$txt=$stavka+10;
for($o=$tex;$o<=$txt;$o++){
$keyboards[]=["text"=>"$o ₽","callback_data"=>"stavka|$o"];
$key=array_chunk($keyboards, 5);
$key[]=[['callback_data'=>"balansim",'text'=>"💳 Mening balansim"]];
$key[]=[['url'=>"https://t.me/$bot",'text'=>"◀️ Botga Kirish"]];
$stavki=json_encode(['inline_keyboard'=>$key]);
}
$yname = bot ('getChatMember', [
'chat_id'=> $last,
'user_id'=> $last
])->result->user->first_name;
bot('editMessageText',[
'chat_id'=>$auksionkanal,
'message_id'=>file_get_contents("admin/auksion.mid"),
'text'=>"👨🏻‍⚖️ Auksion

⚜️ Holati: Boshlangan
⏱ Qolgan vaqt: $t:00
💰 Auksion banki: $bank rubl
🔨 Garovlar soni: $garovv

👑 Lider: <a href='tg://user?id=$last'>$yname</a> Tikdi $stavka rubl!

👇 Garovni oshirish uchun miqdorini tanlang:",
'parse_mode'=>'HTML',
'reply_markup'=>$stavki
]);
$time=date("H:i",strtotime("+1 minutes"));
file_put_contents("admin/auksion.time","$time");
}

if(joinchannel($uid)==true){
if(mb_stripos($data,"stavka|")!==false){
$stavka=explode("|",$data)[1];
$last=file_get_contents("admin/last.id");
if($last==$uid){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"❗Siz ketma-ket 2 ta garov tikolmaysiz!",
'show_alert'=>false,
]);
}else{
$gamebalanss=$gamebalans+1;
if($gamebalanss>$stavka){
$bankk=file_get_contents("admin/bank.txt");
$laststavka=file_get_contents("admin/last.stavka");
$garovv=file_get_contents("admin/garov.lar");
$garov=$garovv+1;
file_put_contents("admin/garov.lar","$garov");
file_put_contents("admin/last.stavka","$stavka");
$time=date("H:i",strtotime("+1 minutes"));
file_put_contents("admin/auksion.time","$time");
file_put_contents("admin/last.id","$uid");
file_put_contents("admin/hour.txt2","10");
$tex=$stavka+1;
$txt=$stavka+10;
for($o=$tex;$o<=$txt;$o++){
$keyboards[]=["text"=>"$o ₽","callback_data"=>"stavka|$o"];
$key=array_chunk($keyboards, 5);
$key[]=[['callback_data'=>"balansim",'text'=>"💳 Mening balansim"]];
$key[]=[['url'=>"https://t.me/$bot",'text'=>"◀️ Botga Kirish"]];
$stavki=json_encode(['inline_keyboard'=>$key]);
}
$bank=$bankk+$stavka;
file_put_contents("admin/bank.txt",$bank);
bot('editMessageText',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"👨🏻‍⚖️ Auksion

⚜️ Holati: Boshlangan
⏱ Qolgan vaqt: 10:00
💰 Auksion banki: $bank rubl
🔨 Garovlar soni: $garov

👑 Lider: <a href='tg://user?id=$uid'>$name1</a> Tikdi $stavka rubl!

👇 Garovni oshirish uchun miqdorini tanlang:",
'parse_mode'=>'HTML',
'reply_markup'=>$stavki
]);
$minnus=$gamebalans-$stavka;
mysqli_query($db,"UPDATE users SET gamebalans='$minnus' WHERE user_id='$uid'");

auksion($auksionkanal,"<a href='tg://user?id=$uid'>$name1</a> Garovni $stavka rublga oshirdi!",$no);
exit();
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"❗O'yin balansida dastlabki garov uchun mablag' yetarli emas!",
'show_alert'=>false,
]);
}
}
}
}


$ho=file_get_contents("admin/hour.txt");
if($ho=="0"){
if($auksionstart=="start"){
$last=file_get_contents("admin/last.id");
$bankk=file_get_contents("admin/bank.txt");
$laststavka=file_get_contents("admin/last.stavka");
$winn=$bankk/100*90;
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$last'");
$row = mysqli_fetch_assoc($result);
$gamebalans=$row['gamebalans'];
$win=$gamebalans+$winn;
mysqli_query($db,"UPDATE users SET gamebalans='$win' WHERE user_id='$last'");
$namei= bot ('getChatMember', [
'chat_id'=> $last,
'user_id'=> $last
])->result->user->first_name;
auksion($auksionkanal,"🧑‍⚖️Auksion Tugadi!

👑Lider: <a href='tg://user?id=$last'>$namei</a> tikdi <b>$laststavka</b> rubl!
💰Auksion Banki: <b>$bankk</b> ₽!
💳G'olib auksion bankining 90%ni oldi - <b>$winn</b>₽",$no);
auksion($last,"📢Hurmatli <a href='tg://user?id=$last'>$namei</a> siz <b>🧑‍⚖️Auksionda</b> g'olib bo'ldingiz!
💰Auksion Banki: <b>$bankk</b> ₽!
💳Siz auksion bankining 90%ni oldingiz - <b>$winn</b>₽
🎲O'yin balansingiz: <b>$win</b>₽",$menu);
bot('deleteMessage',[
'chat_id'=>$auksionkanal,
'message_id'=>file_get_contents("admin/auksion.mid")
]);
unlink("admin/last.id");
unlink("admin/garov.lar");
unlink("admin/bank.txt");
unlink("admin/last.stavka");
unlink("admin/auksion.start");
unlink("admin/auksion.mid");
unlink("admin/auksion.time");
unlink("admin/hour.txt");
unlink("admin/hour.txt2");
exit();
}else{
}}

$hoo=file_get_contents("admin/hour.txt2");
if($hoo=="0"){
if($auksionstart=="start"){
$last=file_get_contents("admin/last.id");
$bankk=file_get_contents("admin/bank.txt");
$laststavka=file_get_contents("admin/last.stavka");
$winn=$bankk/100*90;
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$last'");
$row = mysqli_fetch_assoc($result);
$gamebalans=$row['gamebalans'];
$win=$gamebalans+$winn;
mysqli_query($db,"UPDATE users SET gamebalans='$win' WHERE user_id='$last'");
$namei= bot ('getChatMember', [
'chat_id'=> $last,
'user_id'=> $last
])->result->user->first_name;
auksion($auksionkanal,"🧑‍⚖️Auksion Tugadi!

👑Lider: <a href='tg://user?id=$last'>$namei</a> tikdi <b>$laststavka</b> rubl!
💰Auksion Banki: <b>$bankk</b> ₽!
💳G'olib auksion bankining 90%ni oldi - <b>$winn</b>₽",$no);
auksion($last,"📢Hurmatli <a href='tg://user?id=$last'>$namei</a> siz <b>🧑‍⚖️Auksionda</b> g'olib bo'ldingiz!
💰Auksion Banki: <b>$bankk</b> ₽!
💳Siz auksion bankining 90%ni oldingiz - <b>$winn</b>₽
🎲O'yin balansingiz: <b>$win</b>₽",$menu);
bot('deleteMessage',[
'chat_id'=>$auksionkanal,
'message_id'=>file_get_contents("admin/auksion.mid")
]);
unlink("admin/last.id");
unlink("admin/garov.lar");
unlink("admin/bank.txt");
unlink("admin/last.stavka");
unlink("admin/auksion.start");
unlink("admin/auksion.mid");
unlink("admin/auksion.time");
unlink("admin/hour.txt");
unlink("admin/hour.txt2");
exit();
}else{
}}


if($data=="balansim"){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"💳 Sizning o'yin balansingiz: $gamebalans ₽",
'show_alert'=>false,
]);
}


if(joinchannel($uid)==true){
if($data == "referallar"){
$top = mysqli_query($db,"SELECT * FROM `users` ORDER BY odam DESC  LIMIT 20");
$i =1;
$text = "👥 Eng ko'p referallar:\n\n";
while($row = mysqli_fetch_array($top)){
$userid = $row['user_id'];
$soni = $row["odam"];
$nomi = bot ('getChatMember', [
'chat_id'=> $userid,
'user_id'=> $userid
])->result->user->first_name;
$nomi = str_replace(["[","]","(",")","*","_","`"],["","","","","","",""],$nomi);
if(strlen($nomi)<31){
$namee=$nomi;
}else{
$namee=$userid;
}
if($soni>0){
$text.="<b>$i)</b> <a href='tg://user?id=$userid'>$namee</a> - <b>$soni</b> referal\n";
}
$i++;
}
delete();
if(mb_stripos($text,"1)")!==false){
auksion($cid,$text,$menu);
exit(); 
}else{
auksion($cid,"👥Referallar mavjud emas!",$menu);
exit(); 
}
}

if($data == "yechganlar"){
$top = mysqli_query($db,"SELECT * FROM `users` ORDER BY minus DESC  LIMIT 20");
$i =1;
$text = "💳Ko'p pul yechib olganlar:\n\n";
while($row = mysqli_fetch_array($top)){
$userid = $row['user_id'];
$yech = $row["minus"];
$nomi = bot ('getChatMember', [
'chat_id'=> $userid,
'user_id'=> $userid
])->result->user->first_name;
$nomi = str_replace(["[","]","(",")","*","_","`"],["","","","","","",""],$nomi);
if(strlen($nomi)<31){
$namee=$nomi;
}else{
$namee=$userid;
}
if($yech>0){
$text.="<b>$i)</b> <a href='tg://user?id=$userid'>$namee</a> - <b>$yech</b>₽\n";
}
$i++;
}
delete();
if(mb_stripos($text,"1)")!==false){
auksion($cid,$text,$menu);
exit(); 
}else{
auksion($cid,"💳Botdan pul yechganlar mavjud emas!",$menu);
exit(); 
}
}

}
/////ADMIN PANEL/////
$panel=json_encode(['inline_keyboard'=>[
[['callback_data'=>"pulplus",'text'=>"💰Pul Berish➕"],['callback_data'=>"pulminus",'text'=>"💰Pul Ayirish➖"]],
[['callback_data'=>"stat",'text'=>"📊Statistika"],['callback_data'=>"send",'text'=>"↗️Xabar Yuborish"]],
[['callback_data'=>"exit",'text'=>"🚪Yopish"]],
]
]);






if($text=="/panel" and $uid==$admin){
auksion($admin,"🛠️Administrator Paneli",$panel);
step("");
exit();
}

if($data=="panel"){
delete();
auksion($admin,"🛠️Administrator Paneli",$panel);
step(" ");
exit();
}

if($data=="exit"){
delete();
exit();
}

if($data=="stat"){
$use = mysqli_query($db, "SELECT * FROM `users`");
$users = mysqli_num_rows($use);
$leftt = mysqli_query($db, "SELECT * FROM `ban`");
$lefted= mysqli_num_rows($leftt);
$bann=file_get_contents("banned.ids");
$bans=substr_count($bann,"\n");
auksion('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"📊Statistika
👤Aktivlar: $users
🚪Chiqib ketganlar: $lefted
🚫Banlanganlar: $bans",
'show_alert'=>true]);
}


if($data=="pulplus"){
delete();
auksion($cid,"❗<b>Foydalanuvchi</b> 🆔️+PUL miqdorini yubroing.",$backp);
step("pulber");
}

if($step=="pulber"){
$id=explode("+",$text)[0];
$pul=explode("+",$text)[1];
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$id'");
$row = mysqli_fetch_assoc($result);
$ba=$row['gamebalans'];
$win=$ba+$pul;
mysqli_query($db,"UPDATE users SET gamebalans='$win' WHERE user_id='$id'");
auksion($cid,"<b><a href='tg://user?id=$id'>👤Foydalanuvchi</a> Hisobi $pul ₽ga to'ldirildi!</b>",$backp); 
auksion($tolovkanal,"<b><a href='tg://user?id=$id'>👤Foydalanuvchi</a> Hisobini $pul ₽ga to'ldirildi!</b>",$backp); 

}

if($data=="pulminus"){
delete();
auksion($cid,"❗<b>Foydalanuvchi</b> 🆔️-PUL miqdorini yubroing.",$backp);
step("pulol");
}

if($step=="pulol"){
$id=explode("-",$text)[0];
$pul=explode("-",$text)[1];
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$id'");
$row = mysqli_fetch_assoc($result);
$ba=$row['gamebalans'];
$win=$ba-$pul;
mysqli_query($db,"UPDATE users SET gamebalans='$win' WHERE user_id='$id'");
auksion($cid,"<b><a href='tg://user?id=$id'>👤Foydalanuvchi</a> Hisobidan $pul ₽ Olib tashlandi!</b>",$backp); 
}





if($data=="send" and $uid==$admin){
delete();
$result=mysqli_query($db, "SELECT * FROM auksion"); 
$row= mysqli_fetch_assoc($result);
if($row['status']=="passive"){
auksion('sendMessage', [
'chat_id' => $uid,
'parse_mode'=>'HTML',
'text' =>"❗<b>Xabar</b> Turini tanlang.",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"📝Xabar","callback_data"=>"sms_post"]],
[["text"=>"🗂Forward","callback_data"=>"sms_forward"]],
[["text"=>"🔙Orqaga","callback_data"=>"panel"]]
]
]),
]); 
exit();
}else{
auksion($cid,"❌<b>Xabar Yuborilmoqda. Tugashini kuting!</b>",$backp);
exit();
}
}



if(mb_stripos($data,"sms_")!==false){
delete();
$tur=explode("_",$data)[1];
$result=mysqli_query($db, "SELECT * FROM auksion"); 
$row= mysqli_fetch_assoc($result);
if($row['status']=="passive"){
auksion($cid,"❗<b>Xabarni</b> Yuboring.",$backp);
step("send|$tur");
}else{
auksion($cid,"❌<b>Xabar Yuborilmoqda. Tugashini kuting!</b>",$backp);
exit();
}
}

if(mb_stripos($step,"send|")!==false){
$tur=explode("|",$step)[1];
if($tur=="post"){
$uz="CopyMessage";
}elseif($tur=="forward"){
$uz="ForwardMessage";
}
$vt=date('H:i', strtotime("1 minutes"));
$soat=date('H:i');
auksion($cid,"✅<b>Xabar yuborishga tayyor.
⏳Start: $vt da</b>",$backp); 
auksion('editMessageReplyMarkup',['chat_id'=>$cid,
'message_id'=>$mid-1,false]);
$result=mysqli_query($db, "SELECT * FROM `auksion`"); 
$bor=mysqli_num_rows($result);
if($bor>0){
mysqli_query($db, "UPDATE `auksion` SET `mid`='$mid', `start`='$soat'");  
mysqli_query($db, "UPDATE `auksion` SET `soni`='0', `vaqt`='$vt', `status`='active', `send`='0', `holat`='$uz', `creator`='$uid'");  
}else{
mysqli_query($db, "INSERT INTO `auksion` (`mid`,`start`,`soni`,`vaqt`,`status`,`send`,`holat`,`creator`) VALUES('$mid', '$vt', 0, '$soat', 'active', 0, '$uz','$uid')");
}
$keyb=$update->message->reply_markup;
if(isset($keyb)){
file_put_contents("key.txt",file_get_contents('php://input'));
} 
unlink("step/$cid.step");
exit();
}
//qiwi avto
$check = file_get_contents("Qiwi/check.txt");
$balance = $qiwi->getBalance();
$getbalance = $balance['accounts'][0]['balance']['amount'];
$yil = date('Y-m-d');
$vaqti = date('H:i:s');
$jam = $yil . 'T' . $vaqti . '+03:00';


if (true) {
    $getHistory = $qiwi->getPaymentsHistory([
    'startDate' => '2023-01-01T00:00:00+03:00',
    'endDate' => "$jam",
    'rows' => '10',
    'operation' => 'IN',
]);
    foreach ($getHistory['data'] as $key => $value) {
    $txnId = $value['txnId'];
    $date = $value['date'];
    $type = $value['type'];
    $qaccount = $value['account'];
    $personId = $value['personId'];
    $sum = $value['sum']['amount'];
    $comment = $value['comment'];
    $currency = $value['sum']['currency'];
if ($currency == '$getbalance'){
    $currency = 'RUB';
}
if ($txnId){
if (stripos($check, "$txnId") !== false){
}else{
file_put_contents("Qiwi/check.txt", "$check\n$txnId");
$id = $comment;
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$comment'");
$row = mysqli_fetch_assoc($result);
$ba=$row['gamebalans'];
$win=$ba+$sum;
mysqli_query($db,"UPDATE users SET gamebalans='$win' WHERE user_id='$id'");
auksion($admin,"<b><a href='tg://user?id=$id'>👤Foydalanuvchi</a> Hisobi $sum ₽ga to'ldirildi!</b>",$backp); 
auksion($id,"<b><a href='tg://user?id=$id'>👤Foydalanuvchi</a> Hisobingiz $sum ₽ga to'ldirildi!</b>",$menu); 
auksion($tolovkanal,"<b><a href='tg://user?id=$id'>👤Foydalanuvchi</a> Hisobini $sum ₽ga to'ldirdi!</b>",$backp);
bot('SendMessage',[
'chat_id'=>$admin,
'text'=>"<b>
<i>Qiwi hisobingizga to‘lov keldi✅</i>
🧾Tranzkatsiya haqida ma‘lumot:

<i>👤Yuboruchi: $qaccount
✍️Kommentariya: $comment
💵Tushgan: $sum ₱</i></b>",
'parse_mode'=>"html",
]);
break;
}
}
}
}
if($text=="Balans" and $cid==$admin){
$uzs = $getbalance * 130;
bot('SendMessage',[
'chat_id'=>$admin,
'text'=>"<b>
<i>🥝Qiwi Balansingiz:</i>

💵So‘mda: $uzs UZS
💰Rublda: $getbalance ₱
</b>",
'parse_mode'=>"html",
]);
}
?>
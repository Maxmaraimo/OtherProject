import requests

def download_images(url_list, save_folder='users-3'):
    import os
    
    # Создаём папку для сохранения изображений, если её нет
    if not os.path.exists(save_folder):
        os.makedirs(save_folder)
    
    for i, url in enumerate(url_list):
        try:
            response = requests.get(url)
            response.raise_for_status()  # Проверяем успешность запроса
            
            # Формируем имя файла
            file_name = f'{save_folder}/image_{i+1}.jpg'
            
            # Сохраняем изображение
            with open(file_name, 'wb') as f:
                f.write(response.content)
                
            print(f'Изображение {i+1} сохранено как {file_name}')
        except requests.exceptions.RequestException as e:
            print(f'Не удалось скачать изображение {i+1}: {e}')

# Пример использования
url_list = [
   'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-6.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-5.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-4.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-3.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-2.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-1.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-1.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-6.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-5.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-4.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-3.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-3.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-2.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-6.png', 'https://crocsdjango.pixelstrap.net/crocs/crocsapp/static/assets/images/ecommerce/product-table-5.png'
]
download_images(url_list)
# Tstock
## Yessica Paola Cardenas Niño

¡Hola! Este proyecto es la estructura back-end para el proyecto de la tienda online tstock de [https://github.com/1Jessie9/tstock].
PD: Aún estamos en proceso por lo cual en estos momentos solo comenzaremos con las tablas principales

## Requisitos Previos

Para ejecutar este proyecto, necesitas tener instalado lo siguiente:

- PHP 7.4 o superior
- Composer
- Laravel Laravel 8
- MySQL

## Instalación

1. Clona este repositorio en tu máquina local usando:
   ```sh
   git clone (https://github.com/1Jessie9/back-tstock.git)
   
2. Navega al directorio del proyecto:
      ```sh
   cd nombre_de_tu_proyecto
3. Instala las dependencias de Composer
      ```sh
   composer install

4. Crea un archivo .env copiando el .env.example incluido en el proyecto:
      ```sh
      cp .env.example .env
5. Genera una clave de aplicación Laravel:
      ```sh
    php artisan key:generate

## Instalación
Para crear las tablas, ejecuta:

    + php artisan migrate

Para completar tus tablas con datos iniciales, ejecuta:

    + php artisan db:seed

Para iniciar la conexión, ejecuta:

    + php artisan serve --port=3000

Puedes probar el CRUD con postman localmente, este el link del espacio de trabajo en postman:
[CRUD postman](https://www.postman.com/technical-specialist-85665808/workspace/back-stock/collection/33528189-78a94dbc-3f74-4a29-8a8b-5c82aea13be4)

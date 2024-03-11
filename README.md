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
Para crear las tablas en tu base de datos, ejecuta:

    + php artisan migrate

Para poblar tus tablas con datos iniciales, ejecuta:

    + php artisan db:seed

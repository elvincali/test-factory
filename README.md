## Test
Se utilizo este stack por que es lo que manejo mas actualmente, sin embargo para este tipo de proyecto no habria necesidad de tanta libreria.

## Instalar dependencias

composer install

npm install

npm run dev

## BD: tabla unica (script)

create database 'test_factory';

create table datetimes(
	id int not null primary key auto_increment,
    utc datetime not null
);

## Iniciar servidor local

php artisan serve

## Rutas

 - JS
    - /utc-js
 - PHP
    - /utc-php
    
## Ubicacion de los archivos que contienen la logica
La parte JS es basicamente solo un archivo.
https://www.screencast.com/t/cRUnJM4XX

La parte PHP y MSQL consta de 2 archivos.
Toda la logica esta en un controller del lado Backend.
Toda la logica front(formulario).

https://www.screencast.com/t/Eutqw4UxQxFs



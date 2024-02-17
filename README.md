# MIO

<img src="https://jorgebenitezlopez.com/github/symfony.jpg">
<img src="https://img.shields.io/static/v1?label=PHP&message=Symfony&color=green">

# Requisitos

- Symfony CLI: https://symfony.com/download
- PHP 8.3.0: https://www.php.net/manual/en/install.php
- Composer: https://getcomposer.org/download/
- Symfony 5.4: https://symfony.com/doc/5.x/index.html

# Instalación de Symfony y paquetes

- symfony new mio --version=5.4
- composer require symfony/orm-pack
- composer require symfony/maker-bundle:1.48
- composer require form
- composer require validator
- composer require twig-bundle 
- composer require security-csrf 
- composer require annotations
- composer require symfony/security-bundle
- composer require --dev symfony/profiler-pack 
- composer require "lexik/jwt-authentication-bundle"
- symfony composer require api

# Pasos para el CRUD de User

- Por facilidad de trabajo la base de datos será un sqlite en el propio repo. Modifico el .env para trabajar con sqlite https://www.sqlite.org/index.html
- Crear la entidad user: php bin/console make:user
- Crear formulario de registro: php bin/console make:registration-form (Sin validación de emails)
<kbd><img src="https://jorgebenitezlopez.com/github/register.png"></kbd>

- Creo el CRUD de User: php bin/console make:crud (El new lleva al register)
<kbd><img src="https://jorgebenitezlopez.com/github/CRUD.png"></kbd>

- Formulario de login: php bin/console make:auth (Opción: Login form authenticator)
<kbd><img src="https://jorgebenitezlopez.com/github/login.png"><kbd>

- Actualizar la Base de Datos: php bin/console doctrine:schema:update --force

# Pasos para los endpoints de Users

- Generar las claves públicas y privadas de jwt: php bin/console lexik:jwt:generate-keypair
- Crear el controlador y las rutas para los endpoints: ApiUserController
- Configuración del login a través de jwt en el security.yaml. De tal forma que me puedo recibir un token pasando un usuario y una contraseña válidas por POST a la ruta login_check. Imagen de comprobación con Postman:
<kbd><img src="https://jorgebenitezlopez.com/github/api-login.png"><kbd>

- Una vez que tengo el token lo mando al controlador de API para solicitar info del usuario. Imagen de comprobación con Postman:
<kbd><img src="https://jorgebenitezlopez.com/github/api-info.png"><kbd>

- Para modificar los datos, loe envío en el body de la petición, los persisto y los vuelvo a enviar en formato JSON. Imagen de comprobación con Postman:
<kbd><img src="https://jorgebenitezlopez.com/github/api-update.png"></kbd>

# Rutas de aplicación

| URL path           | Método | Permisos                           | Descripción                          |
|---------------------|--------|------------------------------------|--------------------------------------|
| /register          | GET    | open                               | Formulario de registro               |
| /user              | GET    | Acceso permitido a usuarios        | Listado de usuarios                  |
| /user/[id]/edit    | GET    | Acceso permitido a usuarios        | Edición de un usuario                |
| /login             | GET    | open                               | Formulario para logarse               |
| /api/login_check   | POST   | open                               | Mandas un usuario y una contraseña y devuelve un token |
| /api/user/info     | GET    | Devuelve info de usuario en formato JSON | Restringida para usuarios con token |
| /api/user/info     | POST   | Guarda los datos enviados y los devuelve en formato JSON | Restringida para usuarios con token |


# Extras

- Mejora del diseño utilizando Boostrap

<kbd><img src="https://jorgebenitezlopez.com/github/boostrap.png"></kbd>

- Test: Instalaciones: composer require --dev symfony/test-pack y symfony/panther | composer require --dev dbrekelmans/bdi && vendor/bin/bdi detect drivers. Con su propia Base de Datos para los tests: DATABASE_URL="sqlite:///%kernel.project_dir%/var/dataTest.db". Ejecutar: php bin/console --env=test doctrine:schema:create y php bin/phpunit

<kbd><img src="https://jorgebenitezlopez.com/github/test2.png"></kbd>


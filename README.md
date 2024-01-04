# MIO

<img src="https://jorgebenitezlopez.com/github/symfony.jpg">
<img src="https://img.shields.io/static/v1?label=PHP&message=Symfony&color=green">

# Requisitos

- Symfony CLI: https://symfony.com/download
- PHP 8.3.0: https://www.php.net/manual/en/install.php
- Composer: https://getcomposer.org/download/
- Symfony 5.4: https://symfony.com/doc/5.x/index.html

# Instalación de Symfomy y paquetes

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
- Creo el CRUD de User: php bin/console make:crud (El new lleva al register)
- Formulario de login: php bin/console make:auth (Opción: Login form authenticator)

# Pasos para los endpoints de Users

- Generar las claves públicas y privadas de jwt: php bin/console lexik:jwt:generate-keypair
- Crear el controlador y las rutas para los endpoints: ApiUserController
- Configuración del login a través de jwt en el security.yaml. De tal forma que me puedo recibir un token pasando un usuario y una contraseña válidas por POST a la ruta login_check. Comprobación con Postman
<img src="https://jorgebenitezlopez.com/github/symfony.jpg">




php bin/console doctrine:schema:update --force
/register
/user
/user/[id]/edit
/login


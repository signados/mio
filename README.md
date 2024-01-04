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

# Pasos

- Por facilidad de trabajo la base de datos será un sqlite en el propio repo. Modifico el .env para trabajar con sqlite https://www.sqlite.org/index.html
- Crear la entidad user: php bin/console make:user
- Crear formulario de registro: php bin/console make:registration-form (Sin validación de emails)
- Creo el CRUD de User: php bin/console make:crud (El new lleva al register)

php bin/console doctrine:schema:update --force
https://127.0.0.1:8000/register


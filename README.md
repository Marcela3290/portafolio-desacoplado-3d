<img src="https://jorgebenitezlopez.com/github/symfony.jpg">
<img src="https://img.shields.io/static/v1?label=PHP&message=Symfony&color=green">

# Symfony token

Instalación de Symfony, creación de usuarios con validación por email y acceso por token

# Requisitos

- Symfony CLI: https://symfony.com/download
- PHP 8.2.3 (cli). Por ejemplo se puede descargar en OSX con: https://formulae.brew.sh/formula/php
- Composer: https://getcomposer.org/download/

# Pasos para la instalación de Symfomy y paquetes

- symfony new symfony-token --version=5.4
- composer require symfony/orm-pack
- composer require symfony/maker-bundle
- composer update
- composer require form validator twig-bundle security-csrf annotations
- composer require symfony/security-bundle
- composer require symfonycasts/verify-email-bundle
- composer require symfony/mailer 
- composer require --dev symfony/profiler-pack 
- composer require "lexik/jwt-authentication-bundle"
- symfony composer require api (Para habilitar el CORS)


# Configuración y creación de entidades

- Modificamos el .env para que genere un sqlite (https://www.sqlite.org/index.html)
- Crear usuario:  php bin/console make:user
- Formulario de registro: php bin/console make:registration-form (Con email to verify the user's)
- Formulario de login: php bin/console make:auth (Opción: Login form authenticator)
- Generar las claves públicas y privadas de jwt: php bin/console lexik:jwt:generate-keypair
- Actualizamos la base de datos: php bin/console doctrine:schema:update --force (2 queries were executed)
- En env. añadimos: MAILER_DSN="smtp://xxxxx:yyyyy@smtp1.s.ipzmarketing.com:587" (Actualizar usuario y contraseña)
- Control de acceso por rol admin en el security.yaml - { path: ^/admin, roles: ROLE_ADMIN }
- En la base de dato en el usuario seleccionado se puede añadir en rol: ["ROLE_ADMIN"] (Por defecto podría añadir un rol en el entity de user)
- En el Registration controller, en la linea 56, cambiar la ruta a home o a la ruta que quieres ir una vez registrado
- En el src/Security/AppCustomAutheticator.php en la linea 50 especificar a dónde quieres llegar una vez realizado el login
- Configuración del config/packages/security.ymal para el funcionamiento del jwt 
- Creado un controlador para comprobar el token: ChecktokenController.php
- Levantar servidor: symfony server:start -d 
- Hacer pruebas con postman: https://www.postman.com/

<img src="https://jorgebenitezlopez.com/github/postman1.png">
<img src="https://jorgebenitezlopez.com/github/postman2.png">

# Rutas de la aplicación:

| URL path                    | Description           | 
| :--------------------------:|:---------------------:|
| /                    |  Página en blanco|
| /register                    |  Registro de usuarios| 
| /login                       |  Login               |
| /logout                      |  Logout                |
| /admin                      |   Acceso restringido              |
| /api/login_check            |  Logarse enviando el username y el password por GET             |
| /checktoken                      |  Descifrar el token               |
| /api/test                      |   Acceder a ruta con un token              |

# Referencias

- https://symfony.com/doc/5.4/security/user_providers.html
- https://symfony.com/doc/master/mailer.html
- https://symfony.com/bundles/LexikJWTAuthenticationBundle/current/index.html#installatio
- https://symfony.com/doc/5.4/security.html#form-login
- https://www.youtube.com/watch?v=PxToeu4ySxU


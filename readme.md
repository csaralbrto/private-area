# Área Privada

[![N|Solid](https://laravel.com/img/logomark.min.svg)](https://laravel.com/)[![N|Solid](https://laravel.com/img/logotype.min.svg)](https://laravel.com/)


Private area is an app created in laravel framework version 5.8. that allows:
  - CRUD Properties
  - CRUD Users
  - CRUD Projects
  - Change Passwords

### Database Configuration

Create a database in mysql with the name: 

areap

Or the one you want, then download a production backup and restore it in the created database.

### Installation

Private area requires [php](https://www.php.net/manual/es/install.php) v7.1+ as well as [composer](https://getcomposer.org/download/) and php modules like:
  - PDO
  - soap
  - xml
  - gd
  - dom
  - openssl
  - mbstring
  - mysqlnd
  - zlib
  - pdo_mysql
  - mysqli
  - jso
Among others
  

Installs the application dependencies.

```sh
Go to the source of the project and execute the following command
$ composer install 
$ cp .env.example .env
php artisan key:generate

Configure the database accesses in the following lines of the .env file:

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=valorem
DB_USERNAME= user_database
DB_PASSWORD= password_databse

```
Compilation:
----
```sh
Go to the source of the project and run the following command
$ npm run watch

```
License
----

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


**Free Software, Hell Yeah!**

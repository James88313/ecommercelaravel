PROJECT ECOMMERCE LARAVEL v1.0

www.vistomarketing.com.br/ecommercelaravel

This project was built using Laravel 5.5
By Daniel Paz

##### FEATURES IN THIS PROJECT #####
1- 2 Types of Authentication (Admin and User)
2- User Registration
3- Admin - CRUD OF (Users, Categories, Brands, Products, Tags, Coupons)
4- Product with Multiple images
5- Module showing latest products in the front page
6- Shopping Cart
7- Checkout

##### FIRST OF ALL YOU NEED TO FILL ALL THE REQUISITES #######

##### REQUIREMENTS #######
1- WEB Server Installed With PHP and MySql (Eg: Wamp, Xampp)
-- PHP >= 7.0.0
-- OpenSSL PHP Extension
-- PDO PHP Extension
-- Mbstring PHP Extension
-- Tokenizer PHP Extension
-- XML PHP Extension
-- PHP Mod_rewrite
2- Composer installed in this WEB Server
3- Database created called ecommercelaravel (Obs: You can change this in .env file)

######### HOW TO SETUP #########
1- First of all you have to check the .env file for the config
-- DB_HOST=localhost

-- DB_PORT=3306

-- DB_DATABASE=laravelecommerce

-- DB_USERNAME=root

-- DB_PASSWORD=null

2- How to Deploy
If you are running a Windows WEB SERVER (Eg: Wampp, Xampp)
2.1- Just exec the file start.bat

2.2- If you are running a Linux Server you have to type the following commands directly in the project folder
php artisan config:clear // CLEAR CONFIG CACHE
php artisan cache:clear // CLEAR CACHE
php artisan migrate // THIS COMMAND WILL CREATE ALL THE TABLES
composer dump-autoload // THIS COMMAND LOAD COMPOSER
php artisan db:seed // THIS COMMAND WILL FILL THE TABLES WITH DEFAULT ENTRIES
php artisan serve // THIS COMMAND START THE SERVER

After this, you can access the website. There are two login types, Admin and User
By Default the admin user is danielpaz92@hotmail.com and the password is: p4ssw0rd
Admin URL: http://localhost/ecommercelaravel/admin

For a Single User you can use
test@laravelecommerce.com
password: p4ssw0rd
User Login: http://localhost/ecommercelaravel/login


#### ADDITIONAL INFORMATION ####

CSS Libraries
-- https://mdbootstrap.com/
-- https://getbootstrap.com/docs/3.3/

jQuery Libraries
-- https://igorescobar.github.io/jQuery-Mask-Plugin/
-- https://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/
-- http://fancyapps.com/fancybox/3/
-- https://owlcarousel2.github.io/OwlCarousel2/

### DESIGN INSPIRATION ###
-- http://themes.rokaux.com/unishop/v2.1/template-1/index.html
-- https://devitems.com/html/subas-preview/subas/index-2.html

#### TABLE STRUCTURE ######

- Admin
-- ID
-- Name
-- E-mail
-- Password
-- rememberToken
-- timestamps

- Users
-- ID
-- Name
-- E-mail
-- password
-- rememberToken
-- CPF
-- Birth
-- Sex
-- Phone
-- CEP
-- estate ID
-- city ID
-- address
-- newsletter

- Categories
-- id
-- name
-- slug
-- description
-- category Image

- Products
-- id
-- name
-- slug
-- description
-- Price
-- quantity
-- category ID
-- brand ID

Brands
-- brand ID
-- name
-- image

- Product_Image
-- Product ID
-- Product Image

Product_Tag
-- Product ID
-- Tag ID

- Tags
-- ID
-- Name

- Coupons
-- ID
-- Name
-- Code
-- Discount


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Login - Laravel + Vue
## Purpose
Create a User Login Project using PHP + Laravel/Lumen + Vue.js + TypeScript. In this task, a database is not required, you can use a hard-coded password for validation. 

## Basic Features
- Laravel 8
- Vue 2 + VueRouter + sweetalert2
- PHPUnit Test Case

## Installation Steps

**Download the .zip file or Clone the git repository on your computer**
```
git clone https://github.com/onlybell/PHP-Laravel-Login.git
```
**Navigate in project folder**
```
cd PHP-Laravel-Login
```
**Run composer install**
```
composer install
```
**Generate APP_KEY**
```
php artisan key:generate
```
**Run npm install**
```
npm install
```
**Compile the js and sass code**
```
npm run dev
```
**Once everything is done, start a development server**
```bash
php artisan serve
```
- Then go to `http://localhost:8000` from your browser and see the app.
- Login email - test@test.com, password - 123456


## PHPUnit Test
To run the unit test, go to the project root and run
```
./vendor/bin/phpunit --testsuite Feature Tests
```

## Preview
- Login
![Login Page](/screen/login.png)
- Profile
![Profile Page](/screen/profile.png)

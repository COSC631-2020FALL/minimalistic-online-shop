# project

step 1 PowerShell cd c:\xampp\mysql\bin
step 2 C:\xampp\mysql\bin>.\mysql -u root
step 3 MariaDB>create database eStore; 
step 4 MariaDB>use eStore;
step 5 copy eStore.sql to C:\xampp\mysql\bin>
step 6 MariaDB>source eStore.sql



Install Laravel 
step 1 Download Composer from https://getcomposer.org/download/
step 2 Select C:/XAMPP/Php/php.exe
step 3 PowerShell cd C:/XAMPP/htdocs/Laravel (created empty directory)
step 4 C:/XAMPP/htdocs/Laravel> composer create-project --prefer-dist laravel/laravel Laravel
step 5 C:/XAMPP/htdocs/Laravel> cd Laravel
step 6 C:/XAMPP/htdocs/Laravel/Laravel> php artisan serve
Laravel development server started: http://127.0.0.1:8000

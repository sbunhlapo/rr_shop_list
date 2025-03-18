# MiShoppi Features
A simple app to manage your grocery and shopping list!

## Features
1. Login, Authentication and Session Management
2. Password Hashing
3. Account Creation
4. Data Tables JS
5. Bootstrap 5.3.3
6. Fontawesome
7. Custom Style Sheet and Java Script
8. Vanilla PHP PDO / OOP Functions
9. MySQL Database
10 Apache Server with custom .htaccess for routing

## .htaccess 

<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On 
    RewriteBase /yourserver/mishoppi/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>    

## Usage
1.  Register an account.
2.  Log in.
3.  Create add new product to list
4.  View, edit, and delete your product.

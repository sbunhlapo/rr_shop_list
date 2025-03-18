<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/PageController.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ProductController.php';

$pdo = getPDOConnection();
$controller = new PageController($pdo);
$authController = new AuthController($pdo);
$productController = new ProductController($pdo);

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = strtok($requestUri, '?');

$basePath = '/demos/mishoppi/public/';
if (substr($requestUri, 0, strlen($basePath)) === $basePath) {
    $requestUri = substr($requestUri, strlen($basePath));
}


// Trim leading/trailing slashes
$requestUri = trim($requestUri, '/');

// Routing using switch
switch ($requestUri) {
    case '':
        $controller->home();
        break;
    case 'about':
        $controller->about();
        break;
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break; 
   
    case 'products':
        $productController->index();
        break;
    case 'products/create':
        $productController->create();
        break;
    case 'products/edit':
        $productController->edit($_GET['id']);
        break;
    case 'products/delete':
        $productController->delete($_GET['id']);
        break;
     
    default:
        echo "404 Not Found. Request URI: " . htmlspecialchars($requestUri);
        break;
}


?>




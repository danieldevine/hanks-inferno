<?php
$app = require_once __DIR__ . '/bootstrap.php';

use App\Controllers\HomeController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        $controller = new HomeController;
        $controller->show();
        break;


    default:
        http_response_code(404);
        require __DIR__ . '/../app/Views/404.php';
        break;
}

<?php
$app = require_once __DIR__ . '/bootstrap.php';

use App\Controllers\HomeController;
use App\Controllers\VerseController;
use App\Models\Verse;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        $home = new HomeController;
        $home->show();
        break;

    case '/create':
        $controller = new VerseController;
        $controller->execute();
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/../app/Views/404.php';
        break;
}

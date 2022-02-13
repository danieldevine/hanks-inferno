<?php

namespace App\Controllers;

class Controller
{
    public $request;
    public $vars = array();

    public function view($view_name, $data)
    {
        require_once __DIR__ . '/../Views/' . $view_name . '.php';
    }
}

<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Verse;


class HomeController extends Controller
{

    public function show()
    {
        $verse = new Verse;
        $this->view('home', $verse);
    }
}

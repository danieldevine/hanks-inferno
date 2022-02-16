<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Verse;


class PurgatoryController extends Controller
{

    public function show()
    {
        $verse = new Verse;
        $this->view('purgatory', $verse);
    }
}

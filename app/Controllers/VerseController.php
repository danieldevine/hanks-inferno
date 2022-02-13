<?php

namespace App\Controllers;

use App\Services\VerseService;
use App\Services\ImageService;
use App\Services\DatabaseService;

class VerseController
{

    public function execute()
    {
        $verse = new VerseService;
        $verse = $verse->compose();

        $db = new DatabaseService;
        $db->insert($verse);

        $image = new ImageService;
        $image = $image->create($verse, 'LibreBaskerville-Regular.ttf');

        return 'verse created';
    }
}

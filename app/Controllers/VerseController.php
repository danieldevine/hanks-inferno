<?php

namespace App\Controllers;

use App\Services\VerseService;
use App\Services\ImageService;
use App\Services\DatabaseService;
use App\Services\TweetService;

class VerseController
{

    public function execute()
    {
        $book = 2;
        $verse = (new VerseService)->compose($book);
        $db = (new DatabaseService)->insert($verse, $book);
        $image = (new ImageService)->create($verse, 'LibreBaskerville-Regular.ttf');

        try {
            $tweet = (new TweetService)->sendTweet(__DIR__ . '/../../public/assets/img/verse.png');
        } catch (\Throwable $th) {
            error_log($th->getMessage(), 3, "/var/tmp/hanks-errors.log");
        }
    }
}

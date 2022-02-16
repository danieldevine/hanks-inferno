<?php

namespace App\Services;

use DivineOmega\WordInfo\Word;

class WordService
{
    public function rhyme($word)
    {
        new Word($word);
    }
}

<?php

namespace App\Services;


class VerseService
{
    /**
     * writes the verse from
     * the source texts
     *
     * @return string
     */
    public function compose($book)
    {
        $hank  = file(__DIR__ . "/../../storage/texts/hank.txt");

        if ($book == 1) {
            $dante = file(__DIR__ . "/../../storage/texts/purgatorio.txt");
        } else {
            $dante = file(__DIR__ . "/../../storage/texts/inferno.txt");
        }


        $hank1 = $hank[array_rand($hank)];
        $hank2 = $hank[array_rand($hank)];

        $dante1 = $dante[array_rand($dante)];
        $dante2 = $dante[array_rand($dante)];

        $verse = "<div class='verse'>" . $dante1 . "<br>" . $hank1 . "<br>" . $dante2 . "<br>" . $hank2 . "</div>";

        return $verse;
    }
}

<?php

namespace App\Models;

use App\Services\DatabaseService;
use App\Helpers;

class Verse
{
    /**
     * Display all verses
     *
     * @return string
     */
    public function index($book = 1)
    {
        $db = new DatabaseService;
        return $this->format($db->query("SELECT verse, book FROM verses WHERE book = '" . $book . "'"));
    }

    /**
     * Formats verses for output on the website.
     *
     * @param Object $result
     * @return string
     */
    protected function format($verses)
    {
        if ($verses->num_rows > 0) {
            $index = 1;
            $count = 1;

            while ($row = $verses->fetch_assoc()) {
                if ($index % 12 == 1) {
                    $roman_numeral = Helpers::intToRomanNumeral($count);
                    echo '<h5 id="canto' . $count . '">Canto ' . $roman_numeral . "</h5>";
                    $count++;
                }
                $verse = $row["verse"];
                $verse = str_replace('”', '', $verse);
                echo  $verse . "<br>";

                $index++;
            }
        } else {
            echo "No verses";
        }
    }
}

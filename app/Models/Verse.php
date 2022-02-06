<?php

namespace App\Models;

use App\Helpers;

class Verse
{
    public function index()
    {
        $servername = $_ENV['MYSQL_DB_HOST'];
        $dbname = $_ENV['MYSQL_DB_NAME'];
        $username  = $_ENV['MYSQL_DB_USER'];
        $password = $_ENV['MYSQL_DB_PASSWORD'];

        $mysqli = new \mysqli($servername, $username, $password, $dbname);

        if ($mysqli->connect_errno) {
            die("ERROR : -> " . $mysqli->connect_error);
        }

        $sql = "SELECT verse FROM verses";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $i = 1;
            $c = 1;

            while ($row = $result->fetch_assoc()) {
                if ($i % 12 == 1) {
                    $roman_numeral = Helpers::intToRomanNumeral($c);
                    echo '<h5 id="canto' . $c . '">Canto ' . $roman_numeral . "</h5>";
                    $c++;
                }
                $verse = $row["verse"];
                $verse = str_replace('”', '', $verse);
                echo  $verse . "<br>";

                $i++;
            }
        } else {
            echo "No verses";
        }
        $mysqli->close();
    }
}

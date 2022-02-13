<?php

namespace App\Services;

class DatabaseService
{

    public function __construct()
    {
        $this->mysql_host = $_ENV['MYSQL_DB_HOST'];
        $this->mysql_db_name = $_ENV['MYSQL_DB_NAME'];
        $this->mysql_db_user  = $_ENV['MYSQL_DB_USER'];
        $this->mysql_db_password = $_ENV['MYSQL_DB_PASSWORD'];
    }

    /**
     * Retrieves all verses from the database.
     *
     * @return object
     */
    public function query($query)
    {
        $mysqli = new \mysqli($this->mysql_host, $this->mysql_db_user, $this->mysql_db_password, $this->mysql_db_name);

        if ($mysqli->connect_error) {
            die("ERROR : -> " . $mysqli->connect_error);
        }

        $result = $mysqli->query($query);
        $mysqli->close();

        return $result;
    }

    /**
     * Writes a verse to the database
     *
     * @param string $verse
     * @return void
     */
    public function insert($verse)
    {
        $mysqli = new \mysqli($this->mysql_host, $this->mysql_db_user, $this->mysql_db_password, $this->mysql_db_name);

        if ($mysqli->connect_error) {
            die("ERROR : -> " . $mysqli->connect_error);
        }

        $statement = $mysqli->prepare(
            'INSERT INTO verses (verse) VALUES (?)'
        );

        $statement->bind_param("s", $verse);

        $statement->execute();
        $statement->close();
        $mysqli->close();
    }
}

<?php

namespace App\Services;

class DatabaseService
{

    protected $mysql_host;

    protected $mysql_db_name;

    protected $mysql_db_user;

    protected $mysql_db_password;

    public function __construct()
    {
        $this->mysql_host = $_ENV['MYSQL_DB_HOST'];
        $this->mysql_db_name = $_ENV['MYSQL_DB_NAME'];
        $this->mysql_db_user  = $_ENV['MYSQL_DB_USER'];
        $this->mysql_db_password = $_ENV['MYSQL_DB_PASSWORD'];
    }

    /**
     * Retrieves all verses.
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
}

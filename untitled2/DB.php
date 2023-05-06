<?php
/**
 * Created by PhpStorm.
 * @author: Kate
 * @date: 2023/4/8 6:31 PM
 */

class DB
{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = '123456';
    private $database = 'electronicReport';
    private $port = 3306;

    public function connect()
    {
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}



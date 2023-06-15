<?php

class Connection
{
    private $mysqlConnectionData = [
        'servername' => 'localhost',
        'username' => 'roman',
        'password' => 'Roman@123'
    ];

    public function mysqlConnection($database = null) {
        if ($database !== null) {
            $conn = new mysqli($this->mysqlConnectionData['servername'], $this->mysqlConnectionData['username'], $this->mysqlConnectionData['password'], $database);
        } else {
            $conn = new mysqli($this->mysqlConnectionData['servername'], $this->mysqlConnectionData['username'], $this->mysqlConnectionData['password']);
        }

        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        return $conn;
    }
}
<?php

namespace Model;
use App\Connection;

class User extends Connection  {
    private $pdo;

    public function __construct() {   
        $this->pdo = Connection::get()->connect();
    }

    public function tableUser() {
        $query = "CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            nama VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        $this->pdo->exec($query);
        return $this;
    }
}
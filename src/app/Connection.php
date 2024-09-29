<?php

namespace App;

class Connection {
    private static $conn;

    public function connect() {
        try {
            $dsn = "pgsql:host=" . getenv("HOST") . ";port=" . getenv("PORT") . ";dbname=" . getenv("DBNAME") . ";user=" . getenv("USER") . ";password=" . getenv("PASSWORD");
            $conn = new \PDO($dsn);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function get() {
        if (null === static::$conn) {
            static::$conn = new static();
        }

        return static::$conn;
    }
}
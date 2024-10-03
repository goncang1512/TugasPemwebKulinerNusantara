<?php

namespace App;

class Connection {
    private static $conn;

    public function connect() {
        try {
            $dsn = "pgsql:host=" . $_ENV["HOST"] . ";port=" . $_ENV["PORT"] . ";dbname=" . $_ENV["DBNAME"] . ";user=" . $_ENV["USER"] . ";password=" . $_ENV["PASSWORD"];
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

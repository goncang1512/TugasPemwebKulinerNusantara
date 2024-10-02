<?php

namespace Model;
use App\Connection;

class User extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::get()->connect();
    }

    public function tableUser() {
        $sql = 'CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            username VARCHAR(255) NOT NULL UNIQUE,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            avatar VARCHAR(255),
            role VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

        $this->pdo->exec($sql);
        return $this;
    }

    public function create($data) {
        $sql = "INSERT INTO users (username, email, password, avatar, role) VALUES (:username, :email, :password, :avatar, :role)";

        $stmt = $this->pdo->prepare($sql);
        $newpassword = password_hash($data["password"], PASSWORD_DEFAULT);
        $stmt->execute([
                ":username" => $data["username"],
                ":email" => $data["email"],
                ":password" => $newpassword,
                ":avatar" => "avatar-1.jpg",
                ":role" => "reguler"
            ]);

        $publisher_id = $this->pdo->lastInsertId();
        return [
            "status" => 201,
            "message" => "Berhasil di upload",
            "data" => $publisher_id
            ]; 
    }

    public function findOne($data) {
        $sql = "SELECT username, email FROM users WHERE username = :username OR email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':username' => $data["username"], ":email" => $data["email"]]);

        $result = $stmt->fetch();
        return $result;
    }
}
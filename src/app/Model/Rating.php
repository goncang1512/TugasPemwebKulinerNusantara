<?php

namespace Model;

use App\Connection;

class Rating extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::get()->connect();
    }

    public function ratingTable() {
        $sql = "CREATE TABLE IF NOT EXISTS rating (
            id SERIAL PRIMARY KEY,
            rating INT CHECK (rating >= 1 AND rating <= 5),
            user_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            resep_id INT NOT NULL,
            FOREIGN KEY (resep_id) REFERENCES resep(id) ON DELETE CASCADE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->pdo->exec($sql);
        return $this;
    }

    public function addRating() {
        $sql = "INSERT INTO rating (user_id, resep_id, rating) VALUES (:user_id, :resep_id, :rating)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
                ":user_id" => $_GET["user_id"],
                ":resep_id" => $_GET["resep_id"],
                ":rating" => $_GET["rating"]
            ]);

        $publisher_id = $this->pdo->lastInsertId();

        return $publisher_id;
    }
}


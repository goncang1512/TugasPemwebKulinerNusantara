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
    function createRating($resepId, $rating) {
        $userId = getCurrentUserId();
    
        try {
            $sql = "INSERT INTO ratings (resep_id, user_id, rating) VALUES (:resep_id, :user_id, :rating)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':resep_id' => $resepId,
                ':user_id' => $userId,
                ':rating' => $rating
            ]);
    
            return true; 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

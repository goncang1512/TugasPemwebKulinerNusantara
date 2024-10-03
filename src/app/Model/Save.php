<?php

namespace Model;

use App\Connection;

class Save extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::get()->connect();
    }

    public function tableSave() {
        $sql = "CREATE TABLE IF NOT EXISTS saves (
            id SERIAL PRIMARY KEY,
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

    public function post($user_id, $resep_id) {
        $sql = "INSERT INTO saves (user_id, resep_id) VALUES (:user_id, :resep_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":user_id" => $user_id, ":resep_id" => $resep_id]);

        $publisher_id = $this->pdo->lastInsertId();

        return [
            "status" => 201,
            "message" => "Berhasil di upload",
            "data" => $publisher_id
        ]; 
    }

    public function getByUser($user_id) {
        $sql = "SELECT * FROM saves WHERE user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":user_id" => $user_id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUsRs($user_id, $resep_id) {
        $sql = "SELECT * FROM saves WHERE user_id = :user_id AND resep_id = :resep_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":user_id" => $user_id, ":resep_id" => $resep_id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function deleteSave($save_id) {
        $sql = "DELETE FROM saves WHERE id = :save_id";

        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([":save_id" => $save_id]);
        return $result;
    }
}
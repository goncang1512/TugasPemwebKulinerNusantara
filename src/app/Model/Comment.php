<?php

namespace Model;

use App\Connection;

class Comment
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::get()->connect();
    }

    public function createComment()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS comment (
            id SERIAL PRIMARY KEY,
            user_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            resep_id INT NOT NULL,
            FOREIGN KEY (resep_id) REFERENCES resep(id) ON DELETE CASCADE,
            comment VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

        $this->pdo->exec($sql);
        return $this;
    }

    public function addComment($user_id, $resep_id, $comment)
    {
        $sql = "INSERT INTO comment (user_id, resep_id, comment)
            VALUES (:user_id, :resep_id, :comment)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':resep_id' => $resep_id,
            ':comment' => $comment,
        ]);

        $lastInsertId = $this->pdo->lastInsertId();
        return $lastInsertId;
    }

    public function getByResep($resep_id)
    {
        $sql = "SELECT
                    c.id,
                    c.user_id,
                    c.comment,
                    c.created_at,
                    u.username,
                    u.avatar
                FROM comment c
                INNER JOIN users u
                    ON u.id = c.user_id
                INNER JOIN resep r
                    ON r.id = c.resep_id
                WHERE c.resep_id = :resep_id
                ORDER BY
                    c.updated_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':resep_id' => $resep_id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}

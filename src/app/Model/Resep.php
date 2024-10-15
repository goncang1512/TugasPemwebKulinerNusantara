<?php

namespace Model;
use App\Connection;

class Resep extends Connection {
    private $pdo;

    public function __construct() {   
        $this->pdo = Connection::get()->connect();
    }

    public function createTables() {
        $sql = 'CREATE TABLE IF NOT EXISTS  resep (
            id SERIAL PRIMARY KEY,
            judul VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL,
            deskripsi TEXT NOT NULL,
            bahan_bahan TEXT NOT NULL,
            langkah_langkah TEXT NOT NULL,
            waktu_persiapan VARCHAR(255) NOT NULL,
            waktu_memasak VARCHAR(255) NOT NULL,
            total_waktu VARCHAR(255) NOT NULL,
            porsi VARCHAR(255) NOT NULL,
            kesulitan VARCHAR(255) NOT NULL,
            asal_makanan VARCHAR(255) NOT NULL,
            kategori VARCHAR(255) NOT NULL,
            gambar VARCHAR(255) NOT NULL,
            gambar_id VARCHAR(255) NOT NULL,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )';

        $this->pdo->exec($sql);
        return $this;
    }

    private function createSlug($title) {
        $slug = strtolower($title);
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    public function tableExists($tableName) {
        $stmt = $this->pdo->query("SELECT table_name FROM information_schema.tables WHERE table_name = '$tableName'");
        $result = $stmt->fetch();
        return $result['table_exists'] !== null;
    }

    public function ambilData() {
        $stmt = $this->pdo->query("SELECT * FROM resep ORDER BY created_at DESC");
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function ambilSatu($resep_id) {
        $sql = "SELECT * FROM resep WHERE slug = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $resep_id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function getOneById($resep_id) {
        $sql = "SELECT * FROM resep WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $resep_id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function getByTitle($title) {
        $sql = "SELECT * FROM resep WHERE judul = :title";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":title" => $title]);
        $result = $stmt->fetch();

        return $result;
    }

    public function deleteOneData($resep_id) {
        $sql = "DELETE FROM resep WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':id', $resep_id, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "Resep dengan ID $resep_id telah dihapus.";
        } else {
            return "Gagal menghapus resep.";
        }
    }

    public function uploadResep($data, $image) {
        $sql = "INSERT INTO resep (judul, slug, deskripsi, bahan_bahan, langkah_langkah, waktu_persiapan, waktu_memasak, total_waktu, porsi, kesulitan, asal_makanan, kategori, user_id, gambar, gambar_id) 
        VALUES (:judul, :slug, :deskripsi, :bahan_bahan, :langkah_langkah, :waktu_persiapan, :waktu_memasak, :total_waktu, :porsi, :kesulitan, :asal_makanan, :kategori,:user_id, :gambar, :gambar_id)";

        $stmt = $this->pdo->prepare($sql);
        $slug = $this->createSlug($data["judul"]);

        $stmt->execute([
                ':judul' => $data["judul"],
                ':slug' => $slug,
                ':deskripsi' => $data["deskripsi"],
                ':bahan_bahan' => $data["bahan_bahan"],
                ':langkah_langkah' => $data["langkah_langkah"],
                ':waktu_persiapan' => $data["waktu_persiapan"],
                ':waktu_memasak' => $data["waktu_memasak"],
                ':total_waktu' => $data["total_waktu"],
                ':porsi' => $data["porsi"],
                ':kesulitan' => $data["kesulitan"],
                ':asal_makanan' => $data["asal_makanan"],
                ':kategori' => $data["kategori"],
                ':user_id' => $_POST['user_id'],
                ':gambar' => $image["url_secure"],
                ':gambar_id' => $image["public_id"],
            ]);

        $publisher_id = $this->pdo->lastInsertId();

        return [
            "status" => 201,
            "message" => "Berhasil di upload",
            "data" => $publisher_id
            ]; 
    }

    public function search(string $keyword) {
        $pattern = "%".$keyword."%";
        $sql = "SELECT r.id, r.judul, r.gambar, r.slug, r.user_id AS make_id,
                u.id AS user_id, u.username, u.email, u.avatar,
                COALESCE(SUM(rating.rating), 0) AS total_rating,
                COUNT(rating.id) AS jumlah_rating
                FROM resep r
                LEFT JOIN rating ON rating.resep_id = r.id
                JOIN users u ON u.id = r.user_id
                WHERE judul ILIKE :pattern OR kategori ILIKE :pattern OR asal_makanan ILIKE :pattern
                GROUP BY r.id, r.judul, r.gambar, r.slug, u.id, u.username, u.email, u.avatar";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':pattern' => $pattern]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByUserId($user_id) {
        $sql = "SELECT r.id, r.judul, r.gambar, r.slug, r.user_id AS make_id,
                u.id AS user_id, u.username, u.email, u.avatar,
                COALESCE(SUM(rating.rating), 0) AS total_rating,
                COUNT(rating.id) AS jumlah_rating
                FROM resep r
                LEFT JOIN rating ON rating.resep_id = r.id
                JOIN users u ON u.id = r.user_id
                WHERE r.user_id = :user_id
                GROUP BY r.id, r.judul, r.gambar, r.slug, u.id, u.username, u.email, u.avatar
                ORDER BY r.updated_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($data, $resep_id) {
        $sql = "UPDATE resep SET 
            judul = :judul, 
            slug = :slug,
            deskripsi = :deskripsi,
            waktu_persiapan = :waktu_persiapan,
            waktu_memasak = :waktu_memasak,
            bahan_bahan = :bahan_bahan,  /* Tambahkan bahan_bahan */
            langkah_langkah = :langkah_langkah,
            total_waktu = :total_waktu,
            porsi = :porsi,
            kesulitan = :kesulitan,
            asal_makanan = :asal_makanan,
            kategori = :kategori
            WHERE id = :resep_id";

        $stmt = $this->pdo->prepare($sql);

        $slug = $this->createSlug($data["judul"]);
        $result = $stmt->execute([
                ':judul' => $data["judul"],
                ':slug' => $slug,
                ':deskripsi' => $data["deskripsi"],
                ':bahan_bahan' => $data["bahan_bahan"],
                ':langkah_langkah' => $data["langkah_langkah"],
                ':waktu_persiapan' => $data["waktu_persiapan"],
                ':waktu_memasak' => $data["waktu_memasak"],
                ':total_waktu' => $data["total_waktu"],
                ':porsi' => $data["porsi"],
                ':kesulitan' => $data["kesulitan"],
                ':asal_makanan' => $data["asal_makanan"],
                ':kategori' => $data["kategori"],
                ':resep_id' => $resep_id
            ]);
        if($result) {
            http_response_code(200);
            return [
                    "status" => 200,
                    "message" => "Berhasil update resep"
                ];
        } else {
            http_response_code(400);
            return [
                    "status" => 400,
                    "message" => "Gagal update resep"
                ];
        }
    }

    public function updateGambar($gambar, $gambar_id, $resep_id) {
        $sql = "UPDATE resep SET gambar = :gambar, gambar_id = :gambar_id WHERE id = :resep_id";

        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([":gambar" => $gambar, ":gambar_id" => $gambar_id, ":resep_id" => $resep_id]);

        if($result) {
            http_response_code(200);
            return [
                    "status" => 200,
                    "message" => "Berhasil update resep"
                ];
        } else {
            http_response_code(422);
            return [
                    "status" => 422,
                    "message" => "Gagal update resep"
                ];
        }
    }
}
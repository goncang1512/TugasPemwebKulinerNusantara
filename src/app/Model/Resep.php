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
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );' ;

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
        $stmt = $this->pdo->query("SELECT to_regclass('$tableName') as table_exists");
        $result = $stmt->fetch();
        return $result['table_exists'] !== null;
    }

    public function ambilData() {
        $stmt = $this->pdo->query("SELECT * FROM resep ORDER BY created_at DESC");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function ambilSatu($resep_id) {
        $sql = "SELECT * FROM resep WHERE slug = :id";
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
        $stmt = $this->pdo->prepare("DELETE FROM resep WHERE id = :id");
        
        $stmt->bindParam(':id', $resep_id, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "Resep dengan ID $resep_id telah dihapus.";
        } else {
            return "Gagal menghapus resep.";
        }
    }

    public function uploadResep($data, $image) {
        $sql = "INSERT INTO resep (judul, slug, deskripsi, bahan_bahan, langkah_langkah, waktu_persiapan, waktu_memasak, total_waktu, porsi, kesulitan, asal_makanan, kategori, gambar) 
        VALUES (:judul, :slug, :deskripsi, :bahan_bahan, :langkah_langkah, :waktu_persiapan, :waktu_memasak, :total_waktu, :porsi, :kesulitan, :asal_makanan, :kategori, :gambar)";

        $stmt = $this->pdo->prepare($sql);

        $slug = $this->createSlug($data["judul"]);

        $stmt->bindParam(':judul', $data["judul"]);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':deskripsi', $data["deskripsi"]);
        $stmt->bindParam(':bahan_bahan', $data["bahan_bahan"]);
        $stmt->bindParam(':langkah_langkah', $data["langkah_langkah"]);
        $stmt->bindParam(':waktu_persiapan', $data["waktu_persiapan"]);
        $stmt->bindParam(':waktu_memasak', $data["waktu_memasak"]);
        $stmt->bindParam(':total_waktu', $data["total_waktu"]);
        $stmt->bindParam(':porsi', $data["porsi"]);
        $stmt->bindParam(':kesulitan', $data["kesulitan"]);
        $stmt->bindParam(':asal_makanan', $data["asal_makanan"]);
        $stmt->bindParam(':kategori', $data["kategori"]);
        $stmt->bindParam(':gambar', $image["nameFile"]);

        return [
            "status" => 201,
            "message" => "Berhasil di upload",
            "data" => $stmt->execute()
            ]; 
    }
}
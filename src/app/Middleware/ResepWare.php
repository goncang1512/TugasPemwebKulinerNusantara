<?php

namespace Middleware;

class ResepWare {
    public function __construct() {

    }

    public function uploadFoto($file) {
        $nameFile = $file["gambar"]['name'];
        $sizeFile = $file["gambar"]["size"];
        $error = $file["gambar"]["error"];
        $tmpName = $file["gambar"]["tmp_name"];

        if($error === 4) {
            return [
                "status" => false,
                "message" => "Tidak ada image yang di upload"
                ];
        }
        
        $extimage = ["jpg", "jpeg", "png"];
        $extpicture = explode(".", $nameFile);
        $extpicture = strtolower(end($extpicture));

        if(!in_array($extpicture, $extimage)) {
            return [
                "status" => false,
                "message" => "Yang di upload bukan gambar"
                ];
        }

        if($sizeFile > 1000000) {
            return [
                "status" => false,
                "message" => "Ukuran gambar terlalu besar"
                ];
        }

        $newName = uniqid();
        $newName .= ".";
        $newName .= $extpicture;

        $uploadPath = __DIR__ . "/../../../assets/images/" . $newName;
        if (move_uploaded_file($tmpName, $uploadPath)) {
            return [
                "status" => true,
                "message" => "Berhasil upload image",
                "nameFile" => $newName
            ];
        } else {
            return [
                "status" => false,
                "message" => "Gagal mengupload file"
            ];
        }
    }

    public function cekData($data, $image) {

        if (!isset($data["judul"]) || empty(trim($data["judul"]))) {
            return [
                "status" => false,
                "message" => "Judul tidak boleh kosong."
            ];
        }

        if (!isset($data["deskripsi"]) || empty(trim($data["deskripsi"]))) {
            return [
                "status" => false,
                "message" => "Deskripsi tidak boleh kosong."
            ];
        }

        // Cek gambar
        if (!isset($image["gambar"]) || $image["gambar"]["error"] !== UPLOAD_ERR_OK || $image["gambar"]["size"] <= 0) {
            return [
                "status" => false,
                "message" => "Gambar tidak boleh kosong atau terjadi kesalahan saat mengunggah."
            ];
        }

        if (!isset($data["bahan_bahan"]) || empty(trim($data["bahan_bahan"]))) {
            return [
                "status" => false,
                "message" => "Bahan-bahan tidak boleh kosong."
            ];
        }

        if (!isset($data["langkah_langkah"]) || empty(trim($data["langkah_langkah"]))) {
            return [
                "status" => false,
                "message" => "Langkah-langkah tidak boleh kosong."
            ];
        }

        if (!isset($data["waktu_persiapan"]) || empty(trim($data["waktu_persiapan"]))) {
            return [
                "status" => false,
                "message" => "Waktu persiapan tidak boleh kosong."
            ];
        }

        if (!isset($data["waktu_memasak"]) || empty(trim($data["waktu_memasak"]))) {
            return [
                "status" => false,
                "message" => "Waktu memasak tidak boleh kosong."
            ];
        }

        if (!isset($data["total_waktu"]) || empty(trim($data["total_waktu"]))) {
            return [
                "status" => false,
                "message" => "Total waktu tidak boleh kosong."
            ];
        }

        if (!isset($data["porsi"]) || empty(trim($data["porsi"]))) {
            return [
                "status" => false,
                "message" => "Porsi tidak boleh kosong."
            ];
        }

        if (!isset($data["kesulitan"]) || empty(trim($data["kesulitan"]))) {
            return [
                "status" => false,
                "message" => "Kesulitan tidak boleh kosong."
            ];
        }

        if (!isset($data["asal_makanan"]) || empty(trim($data["asal_makanan"]))) {
            return [
                "status" => false,
                "message" => "Asal makanan tidak boleh kosong."
            ];
        }

        if (!isset($data["kategori"]) || empty(trim($data["kategori"]))) {
            return [
                "status" => false,
                "message" => "Kategori tidak boleh kosong."
            ];
        }

        return ["status" => true, "message" => ""]; // Jika semua data valid
    }

}
<?php

include_once("../../src/app/app.php");

use Controller\ResepCtrl;
use Middleware\ResepWare;

$resep = new ResepCtrl();
$resepWr = new ResepWare();

$session = getSession();

if(!$session) {
    header("location:".$_ENV["BASE_URL"]."pages/login");
}

$msgError = "";

if(isset($_POST["upload"]) && $_POST["upload"] == "unggah") {
    header('Content-Type: application/json');
    $_POST["waktu_memasak"] = $_POST["jam"] . ":" . $_POST["menit"] . ":" . $_POST["detik"];
    $result = $resepWr->cekData($_POST, $_FILES);

    if ($result && !$result["status"]) {
        $msgError = $result["message"];

        http_response_code(422); 
        echo json_encode(["message" => $msgError]);
        exit();
    } else {
        $hasil = $resep->unggahResep($_POST, $_FILES["gambar"]["tmp_name"]);

        if ($hasil["status"] == 201) {
            http_response_code(201);
            echo json_encode(["message" => "Berhasil di upload"]);
            exit();
        } else if($hasil["status"] == 422) {
            $msgError = $hasil["message"];

            http_response_code(422);
            echo json_encode(["message" => $msgError]);
            exit();
        } else {
            http_response_code(500); 
            echo json_encode(["message" => "Gagal mengunggah resep. Silakan coba lagi."]);
            exit();
        }
    }

    exit();
} 

if(isset($_GET["resep_id"])) {
    $resep = $resep->getOneById($_GET["resep_id"]);

    list($jam, $menit, $detik) = explode(':', $resep["waktu_memasak"]);

    $_POST["judul"] = $resep["judul"];
    $_POST["deskripsi"] = $resep["deskripsi"];
    $_POST["waktu_persiapan"] = $resep["waktu_persiapan"];
    $_POST["jam"] = $jam;
    $_POST["menit"] = $menit;
    $_POST["detik"] = $detik;
    $_POST["total_waktu"] = $resep["total_waktu"];
    $_POST["porsi"] = $resep["porsi"];
    $_POST["kesulitan"] = $resep["kesulitan"];
    $_POST["asal_makanan"] = $resep["asal_makanan"];
    $_POST["kategori"] = $resep["kategori"];
    $_POST["bahan_bahan"] = $resep["bahan_bahan"];
    $_POST["langkah_langkah"] = $resep["langkah_langkah"];
    $_POST["gambar"] = $resep["gambar"];
}

view("upload/upload", [
    "post" => $_POST, 
    "errMsg" => $msgError, 
    "user" => $session
]);
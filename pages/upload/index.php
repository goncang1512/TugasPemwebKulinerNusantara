<?php

include_once("../../src/app/app.php");

use App\Connection;
use Controller\ResepCtrl;
use Middleware\ResepWare;

$pdo = Connection::get()->connect();
$resep = new ResepCtrl($pdo);
$resepWr = new ResepWare();

$msgError = "";

if(isset($_POST["upload"]) && $_POST["upload"] == "unggah") {
    $result = $resepWr->cekData($_POST, $_FILES);

    if ($result && !$result["status"]) {
        $msgError = $result["message"];
    } else {
        $image = $resepWr->uploadFoto($_FILES);

        if(!$image["status"]) {
            $msgError = $image["message"];
        }

        $hasil = $resep->unggahResep($_POST, $image);

        if ($hasil["status"] == 201) {
            header("location: " . BASE_URL . "pages/profile/");
            exit();
        } else if($hasil["status"] == 422) {
            $msgError = $hasil["message"];
        } else {
            echo "Gagal mengunggah resep. Silakan coba lagi.";
        }
    }
}

view("upload/upload", ["post" => $_POST, "errMsg" => $msgError]);
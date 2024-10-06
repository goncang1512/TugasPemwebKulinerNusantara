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
    $_POST["waktu_memasak"] = $_POST["jam"] . ":" . $_POST["menit"] . ":" . $_POST["detik"];
    $result = $resepWr->cekData($_POST, $_FILES);

    if ($result && !$result["status"]) {
        $msgError = $result["message"];
    } else {
        $hasil = $resep->unggahResep($_POST, $_FILES["gambar"]["tmp_name"]);

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

view("upload/upload", [
    "post" => $_POST, 
    "errMsg" => $msgError, 
    "user" => $session
]);
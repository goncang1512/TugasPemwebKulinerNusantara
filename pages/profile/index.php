<?php
include_once("../../src/app/app.php");

use Controller\ResepCtrl;

$resep = new ResepCtrl();

if(isset($_GET["q"]) && $_GET["q"] == "delete") {
    $result = $resep->deleteOne($_GET["resep_id"]);

    echo $result;
    header("location:".getenv("BASE_URL")."pages/profile/");
    exit();
};

view("profile/profile", ["resep" => $resep->getAll()]);
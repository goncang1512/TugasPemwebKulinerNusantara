<?php
include_once("../../src/app/app.php");

use App\Connection;
use Controller\ResepCtrl;

$pdo = Connection::get()->connect();
$resep = new ResepCtrl();

if(isset($_GET["q"]) && $_GET["q"] == "delete") {
    echo $_GET["resep_id"];
    $resep->deleteOne($_GET["resep_id"]);
    header("location: ".getenv("BASE_URL")."pages/profile/");
}

view("profile/profile", ["resep" => $resep->getAll()]);
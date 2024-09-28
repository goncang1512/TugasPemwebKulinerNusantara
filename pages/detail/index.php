<?php
include_once("../../src/app/app.php");

if (!isset($_GET["resep_id"]) || empty($_GET["resep_id"])) {
    view("not_found");
    die();
}

use App\Connection;
use Controller\ResepCtrl;

$pdo = Connection::get()->connect();
$resep = new ResepCtrl($pdo);

$data = $resep->ambilSatu($_GET["resep_id"]);

if(!$data) {
    view("not_found");
    die();
}

view("detail/detail", ["resep" => $data]);
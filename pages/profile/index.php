<?php
include_once("../../src/app/app.php");

use App\Connection;
use Controller\ResepCtrl;

$pdo = Connection::get()->connect();
$resep = new ResepCtrl($pdo);

view("profile/profile", ["resep" => $resep->getAll()]);
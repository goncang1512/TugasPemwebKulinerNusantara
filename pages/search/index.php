<?php
include_once("../../src/app/app.php");

use Controller\ResepCtrl;

$resep = new ResepCtrl();

if(isset($_GET["keyword"])) {
    $result = $resep->searchResep($_GET["keyword"]);
}

view("search/search", ["resep" => $result, "keyword" => $_GET["keyword"], "user" => getSession()]);
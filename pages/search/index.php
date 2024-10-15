<?php
include_once("../../src/app/app.php");

use Controller\ResepCtrl;
use Controller\SaveCtrl;

$resep = new ResepCtrl();
$save = new SaveCtrl();

$session = getSession();

if(isset($_GET["keyword"])) {
    $result = $resep->searchResep($_GET["keyword"]);
} else if(isset($_GET["q"]) && $_GET["q"] == "save") {
    $save->saveResep($_GET);
    header("location:".$_SERVER['HTTP_REFERER']);
}

view("search/search", [
    "resep" => $result, 
    "keyword" => $_GET["keyword"], 
    "user" => $session,
    "save" => $save->byUser($session["id"])
]);
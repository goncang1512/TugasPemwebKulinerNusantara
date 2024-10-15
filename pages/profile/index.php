<?php
include_once("../../src/app/app.php");

use Controller\ResepCtrl;
use Controller\SaveCtrl;
use Controller\UserCtrl;

$resep = new ResepCtrl();
$user = new UserCtrl();
$save = new SaveCtrl();

$session = getSession();

if(!$session) {
    header("location:".$_ENV["BASE_URL"]."pages/login");
}

if(isset($_GET["q"]) && $_GET["q"] == "delete") {
    $result = $resep->deleteOne($_GET["resep_id"]);

    header("location:".$_SERVER['HTTP_REFERER']);
} else if(isset($_GET["q"]) && $_GET["q"] == "logout") {
    $user->logOut();
    header("location:".$_ENV["BASE_URL"]."pages/login");
} else if(isset($_GET["q"]) && $_GET["q"] == "save") {
    $save->saveResep($_GET);
    header("location:".$_SERVER['HTTP_REFERER']);
}

view("profile/profile", [
    "resep" => $resep->getByUser($session["id"]), 
    "user" => $session, 
    "save" => $save->byUser($session["id"]),
    "mysave" => $save->getBySaveUser($session["id"])
]);

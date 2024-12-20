<?php
include_once(__DIR__."/../../src/app/app.php");

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
    exit();
} else if(isset($_GET["q"]) && $_GET["q"] == "save") {
    header('Content-Type: application/json');
    $res = $save->saveResep($_GET);

    echo json_encode(["result" => $res]);
    exit();
} else if(isset($_GET["q"]) && $_GET["q"] == "getsave") {
    $saveData = $save->getBySaveUser($session["id"]); 

    foreach($saveData as $resep){
        component("card", ["resep" => $resep, "user" => $session, "status" => "save"]);
    }

    exit();
}

view("profile/profile", [
    "resep" => $resep->getByUser($session["id"]), 
    "user" => $session, 
    "save" => $save->byUser($session["id"]),
    "mysave" => $save->getBySaveUser($session["id"])
]);

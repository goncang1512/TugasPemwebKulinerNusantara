<?php
include_once("../../src/app/app.php");

use Controller\UserCtrl;

$user = new UserCtrl();

$errMsg = "";

if(isset($_POST["submit"]) && $_POST["submit"] == "register") {
    $res = $user->createAccount($_POST);

    if($res["status"] == 201) {
        header("location:".getenv("BASE_URL")."pages/login");
    } else {
        $errMsg = $res["message"];
    }
}

view("auth/register", ["errMsg" => $errMsg, "value" => $_POST]);

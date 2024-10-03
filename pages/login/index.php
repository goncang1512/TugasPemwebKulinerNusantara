<?php
include_once("../../src/app/app.php");

use Controller\UserCtrl;

$user = new UserCtrl();

if(getSession()) {
    header("location: ".getenv("BASE_URL")."pages/profile");
}

$errMsg = "";
if(isset($_POST["submit"]) && $_POST["submit"] == "login" ) {
    $remember = isset($_POST["remember"]) ? $_POST["remember"] : 0;
    $res = $user->loginUser($_POST["email"], $_POST["password"], $remember);

    if($res["status"] == 422) {
        $errMsg = $res["message"];
    } else {
        header("location: ".getenv("BASE_URL")."pages/profile");
    }
}

view("auth/login", ["errMsg" => $errMsg]);
?>
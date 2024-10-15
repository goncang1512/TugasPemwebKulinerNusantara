<?php
include_once("../../src/app/app.php");

use Controller\UserCtrl;

$user = new UserCtrl();

$errMsg = "";

if(getSession()) {
    header("location: ".$_ENV["BASE_URL"]."pages/profile");
}

if(isset($_POST["submit"]) && $_POST["submit"] == "register") {
    $res = $user->createAccount($_POST);

    if($res["status"] == 201) {
        header("location:".$_ENV["BASE_URL"]."pages/login");
    } else {
        $errMsg = $res["message"];
    }
}

view("auth/register", ["errMsg" => $errMsg, "value" => $_POST]);

<?php 

include_once(__DIR__."/../src/app/app.php");

use Controller\UserCtrl;

$user = new UserCtrl();
session_start();

$user->logOut();
header("location:".$_ENV["BASE_URL"]."pages/login");
exit();
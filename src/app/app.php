<?php

$pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

define("APP_NAME", dirname(__FILE__)."/../");
define("BASE_URL","/TugasPemwebKulinerNusantara/");
define("APP_PATH", dirname(__DIR__) . '/');

include_once(__DIR__."/../../vendor/autoload.php");
include_once(APP_PATH . "app/function.php");
include_once(APP_PATH  . 'app/env.php');

use App\DotEnv;

if ($pathname === BASE_URL || $pathname === BASE_URL."index.php") {
    (new DotEnv('./.env'))->load();
} else if($pathname === BASE_URL."api/" || $pathname === BASE_URL."api/index.php") {
    (new DotEnv('../.env'))->load();
} else {
    (new DotEnv('../../.env'))->load();
}
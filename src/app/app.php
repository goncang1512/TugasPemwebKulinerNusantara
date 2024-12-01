<?php
$pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

define("APP_NAME", dirname(__FILE__)."/../");
define("APP_PATH", dirname(__DIR__) . '/');
define("ROUTES", dirname(__DIR__,2));

include_once(ROUTES."/vendor/autoload.php");
include_once(APP_PATH . "app/function.php");
include_once(APP_PATH  . 'app/env.php');

use App\DotEnv;

(new DotEnv(ROUTES.'/.env'))->load();

define("BASE_URL", $_ENV["BASE_URL"]);


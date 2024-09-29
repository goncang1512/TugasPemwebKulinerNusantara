<?php
include_once("../../src/app/app.php");

use Controller\ResepCtrl;

$resep = new ResepCtrl();

view("profile/profile", ["resep" => $resep->getAll()]);
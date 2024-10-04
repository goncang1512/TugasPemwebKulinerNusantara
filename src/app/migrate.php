<?php

include_once("./app.php");

use Model\Rating;
use Model\Resep;
use Model\Save;
use Model\User;

$resep = new Resep();
$user = new User();
$save = new Save();
$rating = new Rating();

$resUser = $user->tableUser();
$result = $resep->createTables();
$resSave = $save->tableSave();
$ratingCr = $rating->ratingTable();

if ($result && $resUser && $resSave && $ratingCr) {
    echo "Tabel berhasil dibuat.";
} else {
    echo "Gagal membuat tabel.";
}

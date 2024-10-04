<?php

include_once("./app.php");

use Model\Resep;
use Model\Save;
use Model\User;

$resep = new Resep();
$user = new User();
$save = new Save();

$resUser = $user->tableUser();
$result = $resep->createTables();
$resSave = $save->tableSave();

if ($result && $resUser && $resSave) {
    echo "Tabel berhasil dibuat.";
} else {
    echo "Gagal membuat tabel.";
}

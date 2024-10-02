<?php

include_once("./app.php");

use Model\Resep;
use Model\User;

$resep = new Resep();
$user = new User();

$result = $resep->createTables();
$resUser = $user->tableUser();

if ($result && $resUser) {
    echo "Tabel berhasil dibuat.";
} else {
    echo "Gagal membuat tabel.";
}

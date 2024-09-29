<?php

include_once("./app.php");

use App\Connection;
use Model\Resep;
use Model\User;

$pdo = Connection::get()->connect();
$resep = new Resep($pdo);
$users = new User();

$users->tableUser();
$resep->createTables();

if ($resep->tableExists('resep')) {
    echo "Tabel 'resep' berhasil dibuat.";
    header("location:".BASE_URL."pages/profile");
} else {
    echo "Gagal membuat tabel 'resep'.";
}

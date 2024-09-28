<?php

include_once("./app.php");

use App\Connection;
use Model\Resep;

$pdo = Connection::get()->connect();
$resep = new Resep($pdo);

$resep->createTables();

if ($resep->tableExists('resep')) {
    echo "Tabel 'resep' berhasil dibuat.";
    header("location:".BASE_URL."pages/profile");
} else {
    echo "Gagal membuat tabel 'resep'.";
}

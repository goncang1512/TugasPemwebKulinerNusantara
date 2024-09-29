<?php

include_once("./app.php");

use Model\Resep;

$resep = new Resep();

$resep->createTables();

if ($resep->tableExists('resep')) {
    echo "Tabel 'resep' berhasil dibuat.";
    header("location:".BASE_URL."pages/profile");
} else {
    echo "Gagal membuat tabel 'resep'.";
}

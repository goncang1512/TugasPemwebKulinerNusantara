<?php

include_once("./app.php");

use Model\Resep;

$resep = new Resep();

$result = $resep->createTables();

if ($result) {
    echo "Tabel 'resep' berhasil dibuat.";
} else {
    echo "Gagal membuat tabel 'resep'.";
}

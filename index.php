<?php

include_once("./src/app/app.php");

use App\Connection;

$pdo = Connection::get()->connect();

if($pdo){

    $sql = 'SELECT * FROM resep';

    $statement = $pdo->query($sql);
    $resep = $statement->fetchAll(PDO::FETCH_ASSOC);
}

view("index", ["resep" => $resep]);
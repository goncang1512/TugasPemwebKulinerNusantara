<?php

include_once("./src/app/app.php");

use App\Connection;

$pdo = Connection::get()->connect();

if($pdo){

    $sql = 'SELECT 
    resep.*, 
    users.*, 
    SUM(rating.rating) AS total_rating
FROM rating
JOIN resep ON resep.id = rating.resep_id
JOIN users ON users.id = rating.user_id
GROUP BY resep.id, users.id';

    $statement = $pdo->query($sql);
    $resep = $statement->fetchAll(PDO::FETCH_ASSOC);
}

view("index", ["resep" => $resep]);
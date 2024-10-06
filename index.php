<?php

include_once("./src/app/app.php");

use App\Connection;
use Model\Rating;

$pdo = Connection::get()->connect();
$rating = new Rating();

$session = getSession();

if($pdo){

    $sql = 'SELECT * FROM resep';

    $statement = $pdo->query($sql);
    $resep = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET["req"]) && $_GET["req"] == "addrating") {
        $publisher_id = $rating->addRating();

        if($publisher_id) {
            echo json_encode(['result'=>$publisher_id, 'success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit();
    }
}

view("index", ["resep" => $resep, "user" => $session]);
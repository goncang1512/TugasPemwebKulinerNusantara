<?php

include_once("./src/app/app.php");

use App\Connection;
use Model\Rating;
use Controller\SaveCtrl;

$save = new SaveCtrl();
$pdo = Connection::get()->connect();
$rating = new Rating();

$session = getSession();

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

    if(isset($_GET["req"]) && $_GET["req"] == "addrating") {
        $publisher_id = $rating->addRating();

        if($publisher_id) {
            echo json_encode(['result'=>$publisher_id, 'success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit();
    } else if(isset($_GET["q"]) && $_GET["q"] == "save") {
        $res = $save->saveResep($_GET);

        echo json_encode(["result" => $res]);
        exit();
    }
}

view("index", [
    "resep" => $resep, 
    "user" => $session, 
    "save" => isset($session) ? $save->byUser($session["id"]) : []
]);
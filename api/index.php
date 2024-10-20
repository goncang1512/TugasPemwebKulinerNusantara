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

    $sql = 'SELECT r.id, r.judul, r.gambar, r.slug, r.user_id AS make_id,
        u.id AS user_id, u.username, u.email, u.avatar,
        COALESCE(SUM(rating.rating), 0) AS total_rating,
        COUNT(rating.id) AS jumlah_rating
	 	FROM resep r
		LEFT JOIN rating ON rating.resep_id = r.id
		JOIN users u ON u.id = r.user_id
		GROUP BY r.id, r.judul, r.gambar, r.slug, u.id, u.username, u.email, u.avatar
        ORDER BY r.updated_at DESC';

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
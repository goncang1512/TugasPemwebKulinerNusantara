<?php
include_once("../../src/app/app.php");

use App\Connection;

$resep_id = $_GET['resep'] ?? null;

if(!isset($resep_id)){
    header("location:".BASE_URL);
}

$pdo = Connection::get()->connect();

if ($pdo) {
    
        $sql = "SELECT * FROM resep WHERE slug = :resep_id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':resep_id', $resep_id, PDO::PARAM_INT);
        $statement->execute();

        $resep = $statement->fetch();

}

view("detail/detail",['resep'=>$resep]);
?>

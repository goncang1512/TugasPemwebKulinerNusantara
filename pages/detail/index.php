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

if (isset($_POST['waktu_memasak'])) {
    
    $waktuMemasak = filter_var($_POST['waktu_memasak'], FILTER_SANITIZE_NUMBER_INT);

    
    if ($waktuMemasak && $waktu_memasak > 0) {
        
        $jam = floor($waktu_memasak / 60);
        $menit = $waktu_memasak % 60;
        $detik = "00"; 

       
        $waktuFormatted = sprintf("%02d:%02d:%02d", $jam, $menit, $detik);

        
        echo $waktuFormatted;
    } else {
       
        echo "Waktu memasak tidak valid!";
    }
}

$session = getSession();



view("detail/detail",['resep'=>$resep, 'user' => $session]);
?>

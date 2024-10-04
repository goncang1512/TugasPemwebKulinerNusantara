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
    // Validasi dan sanitasi input
    $waktuMemasak = filter_var($_POST['waktu_memasak'], FILTER_SANITIZE_NUMBER_INT);

    // Cek apakah input valid
    if ($waktuMemasak && $waktu_memasak > 0) {
        // Kembalikan waktu memasak dalam format yang diinginkan
        // Misalnya, konversi menit ke jam:menit:detik jika perlu
        $jam = floor($waktu_memasak / 60);
        $menit = $waktu_memasak % 60;
        $detik = "00";  // Tetapkan detik ke 00 atau sesuaikan sesuai kebutuhan

        // Format hasil menjadi jam:menit:detik
        $waktuFormatted = sprintf("%02d:%02d:%02d", $jam, $menit, $detik);

        // Kirim respon ke AJAX (JavaScript)
        echo $waktuFormatted;
    } else {
        // Jika input tidak valid, kembalikan pesan error
        echo "Waktu memasak tidak valid!";
    }
}

view("detail/detail",['resep'=>$resep]);
?>

<?php
include_once __DIR__.'/../../src/app/app.php';

use App\Connection;
use Model\Rating;
use Model\Comment;

$resep_id = $_GET['resep'] ?? null;
$resep = new Rating();
$comment = new Comment();

if (!isset($resep_id)) {
    header('location:' . BASE_URL);
}

$pdo = Connection::get()->connect();

if ($pdo) {
    $sql = 'SELECT * FROM resep WHERE slug = :resep_id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':resep_id', $resep_id, PDO::PARAM_INT);
    $statement->execute();

    $resepMenu = $statement->fetch();
    $commentResep = $comment->getByResep($resepMenu['id']);

    if (isset($_POST['waktu_memasak'])) {
        $waktuMemasak = filter_var($_POST['waktu_memasak'], FILTER_SANITIZE_NUMBER_INT);

        if ($waktuMemasak && $waktu_memasak > 0) {
            $jam = floor($waktu_memasak / 60);
            $menit = $waktu_memasak % 60;
            $detik = '00';

            $waktuFormatted = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);

            echo $waktuFormatted;
        } else {
            echo 'Waktu memasak tidak valid!';
        }
    } elseif (isset($_GET['rating'])) {
        $resep->addRating();
    } elseif (isset($_POST['quest']) && $_POST['quest'] == 'addComment') {
        $comment = $comment->addComment($_POST['user_id'], $_POST['resep_id'], $_POST['comment']);
        header('Location: ' . $_SERVER['HTTP_REFERER']."#komentar");
    }

    if(isset($_GET['quest']) && $_GET['quest'] == 'delete') {
        $comment = $comment->deleteComment($_GET['comment_id']);
        
        header('Location: ' . $_SERVER['HTTP_REFERER']."#komentar");
    }
}

$session = getSession();

view('detail/detail', ['resep' => $resepMenu, 'user' => $session, 'comment' => $commentResep]);
?>

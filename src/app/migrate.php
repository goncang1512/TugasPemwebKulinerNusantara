<?php

include_once("./app.php");

use Model\Comment;
use Model\Rating;
use Model\Resep;
use Model\Save;
use Model\User;

$resep = new Resep();
$user = new User();
$save = new Save();
$rating = new Rating();
$comment = new Comment();

$resUser = $user->tableUser();
$result = $resep->createTables();
$resSave = $save->tableSave();
$ratingCr = $rating->ratingTable();
$commentMod = $comment->createComment();

if ($result && $resUser && $resSave && $ratingCr && $commentMod) {
    echo "Tabel berhasil dibuat.";
} else {
    echo "Gagal membuat tabel.";
}

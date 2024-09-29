<?php
    $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $excluded_paths = ["/TugasPemwebKulinerNusantara/pages/register/", "/TugasPemwebKulinerNusantara/pages/login/"];
?>

<link href="<?= BASE_URL . "assets/css/style.css" ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL . "assets/css/index.css" ?>">

<!-- CSS PAGES -->
<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/detail/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/detail.css" ?>">
<?php endif; ?>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/profile/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/profile.css" ?>">
<?php endif; ?>

<?php if (allowedComponent($pathname, $excluded_paths)): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/auth.css" ?>">
<?php endif; ?>

<?php if ($pathname === "/TugasPemwebKulinerNusantara/" || $pathname === "/TugasPemwebKulinerNusantara/index.php"): ?>
    <link rel="stylesheet" href="<?= BASE_URL."assets/css/home.css"?>">
<?php endif;?>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/upload/') === 0):?>
    <link rel="stylesheet" href="<?= BASE_URL."assets/css/upload.css"?>">
<?php endif?>
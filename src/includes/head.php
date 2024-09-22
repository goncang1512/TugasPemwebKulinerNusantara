<?php
    $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $excluded_paths = ["/resep_nusantara/pages/register/", "/resep_nusantara/pages/login/"];
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="<?= BASE_URL . "assets/css/index.css" ?>">

<!-- CSS PAGES -->
<?php if (strpos($pathname, '/resep_nusantara/pages/detail/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/detail.css" ?>">
<?php endif; ?>

<?php if (strpos($pathname, '/resep_nusantara/pages/profile/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/profile.css" ?>">
<?php endif; ?>

<?php if (allowedComponent($pathname, $excluded_paths)): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/auth.css" ?>">
<?php endif; ?>

<?php if ($pathname === "/resep_nusantara/" || $pathname === "/resep_nusantara/index.php"): ?>
    <link rel="stylesheet" href="<?= BASE_URL."assets/css/home.css"?>">
<?php endif;?>


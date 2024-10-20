<?php
    $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $excluded_paths = [$_ENV["BASE_URL"]."pages/register/", $_ENV["BASE_URL"]."pages/login/"];
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL . "assets/css/index.css" ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS PAGES -->
<?php if (strpos($pathname, $_ENV["BASE_URL"].'pages/detail/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/detail.css" ?>">
<?php endif; ?>

<?php if (strpos($pathname, $_ENV["BASE_URL"].'pages/profile/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/profile.css" ?>">
<?php endif; ?>

<?php if (strpos($pathname,$_ENV["BASE_URL"].'pages/search/') === 0): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/profile.css" ?>">
<?php endif; ?>

<?php if (allowedComponent($pathname, $excluded_paths)): ?>
    <link rel="stylesheet" href="<?= BASE_URL . "assets/css/auth.css" ?>">
<?php endif; ?>

<?php if ($pathname === $_ENV["BASE_URL"]."api/" || $pathname === $_ENV["BASE_URL"]."api/index.php"): ?>
    <link rel="stylesheet" href="<?= BASE_URL."assets/css/home.css"?>">
<?php endif;?>

<?php if (strpos($pathname, $_ENV["BASE_URL"].'pages/upload/') === 0):?>
    <link rel="stylesheet" href="<?= BASE_URL."assets/css/upload.css"?>">
<?php endif?>
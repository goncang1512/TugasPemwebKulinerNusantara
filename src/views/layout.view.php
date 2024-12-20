<?php
$pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$not_allowed_navbar = [$_ENV['BASE_URL'] . 'pages/register/', $_ENV['BASE_URL'] . 'pages/login/'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL . 'assets/image/logo_web_kuliner-removebg-preview.png' ?>">
    <?php include_once APP_PATH . 'includes/head.php'; ?>
    <title>Resep Nusantara</title>
</head>

<body style="background-color: #f3f4f6;">
    <!-- HEADER -->
    <?php if(!allowedComponent($pathname, $not_allowed_navbar)) :?>
    <header>
        <?php include_once APP_PATH . 'includes/navbar.php'; ?>
    </header>
    <?php endif;?>

    <!-- MAIN CONTENT -->
    <main class="<?php echo allowedComponent($pathname, $not_allowed_navbar) ? '' : ($pathname !== $_ENV['BASE_URL'] ? 'give-padding' : 'main-content-project'); ?>
">
        <?php include_once "$name_path.view.php"; ?>
    </main>

    <?php include_once APP_PATH . 'includes/script.php'; ?>
</body>

</html>

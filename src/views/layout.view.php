<?php
    $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $not_allowed_navbar = ["/TugasPemwebKulinerNusantara/pages/register/", "/TugasPemwebKulinerNusantara/pages/login/"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(APP_PATH . 'includes/head.php')?>
    <title>Resep Nusantara</title>
</head>
<body>
    <!-- HEADER -->
    <?php if(!allowedComponent($pathname, $not_allowed_navbar)) {?>
        <header>
            <?php include_once(APP_PATH . 'includes/navbar.php')?>
        </header>
    <?php }?>

    <!-- MAIN CONTENT -->
    <main class="<?php echo allowedComponent($pathname, $not_allowed_navbar) ? '' : 'main-content-project'; ?> overflow-x-hidden">
        <?php include_once("$name_path.view.php")?>
    </main>

    <?php include_once(dirname(__DIR__, 2)."/assets/script/script.php")?>
</body>
</html>
<?php
    $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $excluded_paths = ["/resep_nusantara/pages/register/", "/resep_nusantara/pages/login/"]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(APP_NAME."components/layouts/head.php")?>
    <title>Resep Nusantara</title>
</head>
<body>
    <!-- HEADER -->
    <?php if(!in_array($pathname, $excluded_paths)) {?>
        <header>
            <?php include_once(APP_NAME."components/layouts/navbar.php")?>
        </header>
    <?php }?>

    <!-- MAIN CONTENT -->
    <main>
        <?php include_once("$name.view.php")?>
    </main>

    <?php include_once(APP_NAME."components/layouts/script.php")?>
</body>
</html>
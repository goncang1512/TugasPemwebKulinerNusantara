<?php
    $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

<script>
    const URL_BASE = "<?= BASE_URL?>"
</script>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/profile/') === 0): ?>
    <script src="<?= BASE_URL."assets/script/profile.js"?>"></script>
<?php endif; ?>
    
<?php if ($pathname === "/TugasPemwebKulinerNusantara/" || $pathname === "/TugasPemwebKulinerNusantara/index.php"): ?>
        <script src="node_modules/flowbite/dist/flowbite.min.js"></script>
<?php endif;?>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/upload/') === 0): ?>
    <script src="<?= BASE_URL."assets/script/upload.js"?>"></script>
<?php endif; ?>
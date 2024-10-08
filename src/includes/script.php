<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>

<script src="<?= BASE_URL."assets/script/script.js"?>"></script>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/profile/') === 0): ?>
    <script src="<?= BASE_URL."assets/script/profile.js"?>"></script>
<?php endif; ?>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/upload/') === 0): ?>
    <script src="<?= BASE_URL."assets/script/upload.js"?>"></script>
<?php endif; ?>

<?php if (strpos($pathname, '/TugasPemwebKulinerNusantara/pages/detail/') === 0): ?>
    <script src="<?= BASE_URL."assets/script/detail.js"?>"></script>
<?php endif;?>

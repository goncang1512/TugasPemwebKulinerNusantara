<?php
$image = [
    ['id' => 1, 'nama' => 'Clorot', 'image' => $_ENV['BASE_URL'] . 'assets/images/resep-pertama.png', 'rotate' => '335deg', 'gambar_rotate' => '25deg', 'position' => '-27%', 'mobile' => '-5%'], 
    ['id' => 2, 'nama' => 'Pecel', 'image' => $_ENV['BASE_URL'] . 'assets/images/resep-kedua.png', 'rotate' => '403deg', 'gambar_rotate' => '-43deg', 'position' => '-55%', 'mobile' => '-30%'], 
    ['id' => 3, 'nama' => 'Sate', 'image' => $_ENV['BASE_URL'] . 'assets/images/resep-ketiga.png', 'rotate' => '503deg', 'gambar_rotate' => '-142deg', 'position' => '-40%', 'mobile' => '-20%']];
?>

<div class="hero-section">
    <div class="hero-first">
        <h1 class="judul-hero">Jelajahi Resep <br> Nusantara</h1>
        <p class="parag-hero">Cari, masak, dan bagikan <br> resep kesukaan anda</p>
        <div class="container-button-resep">
            <?php foreach($image as $data):?>
            <button
                onclick="buttonRotate('<?= $data['rotate'] ?>', '<?= $data['gambar_rotate'] ?>', '<?= $data['position'] ?>', '<?= $data['mobile']?>')"
                class="button-see-resep">
                <img class="image-button-resep" src="<?= $data['image'] ?>" alt="" />
                <p class="name-food" style="color: white; padding-top: 20px; font-weight: 500;"><?= $data['nama'] ?></p>
            </button>
            <?php endforeach;?>
        </div>
    </div>
    <div class="hero-second">
        <div class="image-oracle" style="rotate: 335deg;">
            <div class="image-oracle-satu">
                <img class="gambar-oracle" src="<?= $_ENV['BASE_URL'] . 'assets/images/new-pertama.png' ?>"
                    alt="">
                <div style="display: flex;">
                    <img class="gambar-oracle" src="<?= $_ENV['BASE_URL'] . 'assets/images/new-kedua.png' ?>"
                        alt="">
                    <img class="gambar-oracle" src="<?= $_ENV['BASE_URL'] . 'assets/images/new-ketiga.png' ?>"
                        alt="">
                </div>
            </div>
        </div>
        <div class="table-oracle">
        </div>
    </div>
</div>
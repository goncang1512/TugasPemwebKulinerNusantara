<?php

$asal_makanan = [
    [
        "asal" => "Sumatra Barat",
        "gambar" => "https://shopee.co.id/inspirasi-shopee/wp-content/uploads/2021/11/1.-Batagor.webp"
    ],
    [
        "asal" => "Sulawesi Selatan",
        "gambar" => "https://tribratanews.polri.go.id/web/image/blog.post/70892/image"
    ],
    [
        "asal" => "Papua Barat",
        "gambar" => "https://images.tokopedia.net/blog-tokopedia-com/uploads/2018/09/makanan-khas-Papua-Barat-3-Tribunnews.jpg"
    ],
    [
        "asal" => "Kalimantan Barat",
        "gambar" => "https://images.bisnis.com/posts/2023/05/07/1653214/2._10_makanan_khas_kalimantan_barat,_apa_saja__-_chai_kwe_(instagram.com_kulinerkalimantanbarat).jpg"
    ],
    [
        "asal" => "Jawa Barat",
        "gambar" => "https://www.eatnow.id/wp-content/uploads/2022/12/nagasari-600x400.webp"
    ],
    [
        "asal" => "Kalimantan Timur",
        "gambar" => "https://www.eatnow.id/wp-content/uploads/2022/12/ayam-cincane-600x400.webp"
    ]
];
?>

<main class="utama">
    <div style="overflow-x: hidden;">
        <img style="width: 100vw" src="<?= BASE_URL."assets/images/home.png"?>" alt="">
    </div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="display: none;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= BASE_URL. "assets/images/beranda/11web.png"?>" class="imagecarausel d-block w-100" alt="">
    </div>
    <div class="carousel-item">
        <img src="<?= BASE_URL. "assets/images/beranda/12web'.png"?>" class="imagecarausel d-block w-100" alt="Bika Ambon">
    </div>
    <div class="carousel-item">
        <img src="<?= BASE_URL. "assets/images/beranda/13web.png"?>" class="imagecarausel d-block w-100" alt="Bika Ambon">
    </div>
    <div class="carousel-item">
        <img src="<?= BASE_URL. "assets/images/beranda/14web.png"?>" class="imagecarausel d-block w-100" alt="Bika Ambon">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="Welcome">
        <h2><strong>SELAMAT DATANG DI KULINER NUSANTARA</strong></h2>
    </div>

    <!-- Makanan makanan rekomendasi -->
    <div class="container-scroll">
    <section data-aos="fade-up"data-aos-duration="3000" class="daerah">
        <?php foreach($asal_makanan as $makanan): ?>
            <div class="daerah-item">
                <img src="<?= $makanan["gambar"]?>" alt="Makanan khas Sulawesi Selatan">
                <h5><?= $makanan["asal"]?></h5>
            </div>
        <?php endforeach; ?>
    </section>
    </div>

    <div class="resep-kuliner">
        <h2><strong>Resep Kuliner Nusantara</strong></h2>
    </div>

    <!-- Makanan dan rating makanan -->
<div data-aos="fade-up"data-aos-duration="3000" class="container-scroll">
    <div class="rekomendasi-makanan">
        <?php
            foreach($data["resep"] as $resep) {
                component("card", [
                    "status" => $data["user"] ? "card" : "notlogin",
                    "resep" => $resep,
                    "save" => $data["save"],
                    "user" => $data["user"]
                ]); 
            }
        ?>
    </div>
</div>

<div class="rempah-rempah">
      <h3><strong>Rempah Rempah Khas Indonesia</strong></h3>
    </div>
    <section data-aos="fade-up"data-aos-duration="3000" class="rempah">
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/f7b5dc860236de94e93b595f5d4ecab3.jpg" alt="Rempah Rempah Indonesia">
        <h5>Cengkih</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/13293239f806edc6c0e387de38f5ef6f.jpg" alt="Rempah Rempah Indonesia">
        <h5>Lada</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/7a51f01f02c7cf536e5bd707198e3688.jpg" alt="Rempah Rempah Indonesia">
        <h5>Kayu Manis</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/37db4d260d6e1089614c49ae61437e22.jpg" alt="Rempah Rempah Indonesia">
        <h5>Pala</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/f883d53bf6bfae4d03ad8b6b4af0817b.jpg" alt="Rempah Rempah Indonesia">
        <h5>Kapulaga</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/7efc2e059aaae4c1be4edb1f137188d0.jpg" alt="Rempah Rempah Indonesia">
        <h5>Andaliman</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/7b6ba75357a8e3316a36d09f80644fd1.jpg" alt="Rempah Rempah Indonesia">
        <h5>Kemukus</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/8f151eac3a99ee683feaca8699a8f82d.jpg" alt="Rempah Rempah Indonesia">
        <h5>Kayu Secang</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/ff5a69c8e0a3b2fa2c97896baaacfc9b.jpg" alt="Rempah Rempah Indonesia">
        <h5>Kunyit</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/cd90ff8cffae0257e7f214745edf26cb.jpg" alt="Rempah Rempah Indonesia">
        <h5>Ketumbar</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/e29b9fe861576e7223b34259b60d44c9.jpg" alt="Rempah Rempah Indonesia">
        <h5>Daun Salam</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/47cebadb6fca1b844fc16366ba3647c7.jpg" alt="Rempah Rempah Indonesia">
        <h5>Bunga Lawang</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/9265ad4892ad05bceac2e206558ceac4.jpg" alt="Rempah Rempah Indonesia">
        <h5>Kemiri</h5>
    </div>
    <div class="daerah-item">
        <img src="https://cdn.idntimes.com/content-images/community/2018/08/2225ca1fef8c5fa26af077f12b45871c.jpg" alt="Rempah Rempah Indonesia">
        <h5>Jahe</h5>
    </div>
    </section>
</main>

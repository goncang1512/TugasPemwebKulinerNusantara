<?php

$asal_makanan = [
    [
        "asal" => "Sumatra Barat",
        "gambar" => "https://shopee.co.id/inspirasi-shopee/wp-content/uploads/2021/11/1.-Batagor.webp"
    ],
    [
        "asal" => "Aceh",
        "gambar" => "https://www.astronauts.id/blog/wp-content/uploads/2023/12/makanan-khas-daerah-aceh-mie-aceh-1024x678.jpg"
    ],
    [
        "asal" => "Sumatera Utara",
        "gambar" => "https://www.astronauts.id/blog/wp-content/uploads/2023/12/makanan-khas-daerah-sumatera-utara-bika-ambon-1024x678.jpg"
    ],
    [
        "asal" => "Riau",
        "gambar" => "https://www.astronauts.id/blog/wp-content/uploads/2023/12/1123052022-gulai-belacan-64c26ea408a8b54a806d6933.jpeg"
    ],
    [
        "asal" => "Jambi",
        "gambar" => "https://www.astronauts.id/blog/wp-content/uploads/2023/12/makanan-khas-daerah-jambi-tempoyak-ikan-patin-1024x678.jpg"
    ],
    [
        "asal" => "Sumatera Selatan",
        "gambar" => "https://www.astronauts.id/blog/wp-content/uploads/2023/12/pempek-makanan-khas-daerah-sumatera-selatan-1024x678.jpg"
    ],
    [
        "asal" => "Lampung",
        "gambar" => "https://www.astronauts.id/blog/wp-content/uploads/2023/12/seruit-makanan-khas-daerah-lampung-1024x678.jpg"
    ]
];
?>

<main class="utama">
    <div>
        <?php component('hero')?>
    </div>

<div class="seluruh">
    <div class="Welcome">
        <h2><strong>SELAMAT DATANG DI KULINER NUSANTARA</strong></h2>
    </div>

    <!-- Makanan makanan rekomendasi -->
    <div class="container-scroll">
    <section data-aos="fade-up"data-aos-duration="1000" class="daerah">
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
<div data-aos="fade-up"data-aos-duration="1000" class="geser">
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
            <a href="#popup1" onclick="document.getElementById('popup1').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/7a51f01f02c7cf536e5bd707198e3688.jpg" alt="Rempah Rempah Indonesia">
                <p>Cengkih</p>
            </a>
        </div>
        <div id="popup1" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup1').style.display='none'; return false;">&times;</a>
                <h2>Cengkih</h2>
                <p>Cengkih adalah kuncup bunga kering beraroma khas yang berasal dari pohon cengkih (Syzygium aromaticum). Tanaman ini memiliki rasa pedas dan aroma yang kuat, sehingga sering digunakan sebagai bumbu masakan di berbagai belahan dunia. Penggunaan cengkih juga mencakup pembuatan rokok kretek di Indonesia, pengobatan tradisional, dan sebagai bahan rempah dalam minuman hangat.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup2" onclick="document.getElementById('popup2').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/37db4d260d6e1089614c49ae61437e22.jpg" alt="Rempah Rempah Indonesia">
                <p>Pala</p>
            </a>
        </div>
        <div id="popup2" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup2').style.display='none'; return false;">&times;</a>
            <h2>Pala</h2>
            <p>Pala adalah tanaman rempah yang memiliki bentuk buah bulat hingga lonjong, dengan warna hijau kekuningan saat matang. Buah pala dapat mencapai diameter antara 3 hingga 9 cm dan akan terbelah menjadi dua saat matang. Setiap bagian dari tanaman pala dapat dimanfaatkan, termasuk biji, daging buah, dan fuli.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup3" onclick="document.getElementById('popup3').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/f883d53bf6bfae4d03ad8b6b4af0817b.jpg" alt="Rempah Rempah Indonesia">
                <p>Kapulaga</p>
            </a>
        </div>
        <div id="popup3" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup3').style.display='none'; return false;">&times;</a>
                <h2>Kapulaga</h2>
                <p>Buah kapulaga berbentuk bulat kecil, berwarna hijau atau coklat tua. Biji di dalamnya berwarna hitam dan memiliki aroma yang khas, hangat, dan sedikit pedas.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup4" onclick="document.getElementById('popup4').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/7efc2e059aaae4c1be4edb1f137188d0.jpg" alt="Rempah Rempah Indonesia">
                <p>Andaliman</p>
            </a>
        </div>
        <div id="popup4" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup4').style.display='none'; return false;">&times;</a>
                <h2>Andaliman</h2>
                <p>Berasal dari buah tanaman andaliman yang masih sekeluarga dengan jeruk. Bentuknya kecil-kecil dan berwarna coklat kehitaman.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup5" onclick="document.getElementById('popup5').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/7b6ba75357a8e3316a36d09f80644fd1.jpg" alt="Rempah Rempah Indonesia">
                <p>Kemukus</p>
            </a>
        </div>
        <div id="popup5" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup5').style.display='none'; return false;">&times;</a>
                <h2>Kemukus</h2>
                <p>Biji kemukus berbentuk bulat pipih, berwarna coklat tua hingga hitam. Aromanya kuat, sedikit pahit, dan harum. Sering digunakan dalam masakan tradisional Jawa dan Bali. Memberikan aroma khas pada masakan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup6" onclick="document.getElementById('popup6').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/8f151eac3a99ee683feaca8699a8f82d.jpg" alt="Rempah Rempah Indonesia">
                <p>Kayu Secang</p>
            </a>
        </div>
        <div id="popup6" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup6').style.display='none'; return false;">&times;</a>
                <h2>Kayu Secang</h2>
                <p>Kayu secang berbentuk serpihan atau bubuk, berwarna merah tua. Tidak memiliki rasa yang signifikan, namun menghasilkan warna merah alami pada makanan. Sering digunakan sebagai pewarna alami pada masakan dan minuman. Juga memiliki khasiat untuk kesehatan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup7" onclick="document.getElementById('popup7').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/ff5a69c8e0a3b2fa2c97896baaacfc9b.jpg" alt="Rempah Rempah Indonesia">
                <p>Kunyit</p>
            </a>
        </div>
        <div id="popup7" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup7').style.display='none'; return false;">&times;</a>
                <h2>Kunyit</h2>
                <p>Akar tanaman kunyit berwarna kuning cerah. Biasanya digunakan dalam bentuk segar, bubuk, atau pasta. Pahit, namun menghasilkan warna kuning cerah pada makanan. Selain sebagai bumbu masak, kunyit juga memiliki banyak khasiat untuk kesehatan, seperti anti-inflamasi dan antioksidan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup8" onclick="document.getElementById('popup8').style.display='block'; return false;">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/cd90ff8cffae0257e7f214745edf26cb.jpg" alt="Rempah Rempah Indonesia">
                <p>Ketumbar</p>
            </a>
        </div>
        <div id="popup8" class="popup" style="display:none;">
            <div class="popup-content">
                <a href="#" class="close" onclick="document.getElementById('popup8').style.display='none'; return false;">&times;</a>
                <h2>Ketumbar</h2>
                <p>Biji ketumbar berbentuk bulat kecil, berwarna coklat muda atau keabu-abuan. Aroma harum dan rasa sedikit pedas. Sering digunakan sebagai bumbu dasar dalam berbagai masakan. Memberikan aroma yang khas dan meningkatkan cita rasa.</p>
            </div>
        </div>
    </section>
</main>

<?php include_once(APP_PATH . 'includes/footer.php')?>


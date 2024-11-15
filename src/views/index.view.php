<?php

$asal_makanan = [
    [
        "asal" => "Sumatra Barat",
        "gambar" => "https://shopee.co.id/inspirasi-shopee/wp-content/uploads/2021/11/1.-Batagor.webp"
    ],
    [
        "asal" => "Papua Barat",
        "gambar" => "https://images.tokopedia.net/blog-tokopedia-com/uploads/2018/09/makanan-khas-Papua-Barat-3-Tribunnews.jpg"
    ],
    [
        "asal" => "Papua Barat",
        "gambar" => "https://images.tokopedia.net/blog-tokopedia-com/uploads/2018/09/makanan-khas-Papua-Barat-3-Tribunnews.jpg"
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
    <!-- <div style="overflow-x: hidden;">
        <img style="width: 100vw" src="<?= BASE_URL."assets/images/home.png"?>" alt="">
    </div> -->

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
<div data-aos="fade-up"data-aos-duration="1000" class="container-scroll">
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
        <a href="#popup1" onclick="showPopup('popup1')">
            <a href="#popup1">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/7a51f01f02c7cf536e5bd707198e3688.jpg" alt="Rempah Rempah Indonesia">
                <p>Cengkih</p>
            </a>
        </div>
        <div id="popup1" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Cengkih</h2>
                <p>Cengkih adalah kuncup bunga kering beraroma khas yang berasal dari pohon cengkih (Syzygium aromaticum). Tanaman ini memiliki rasa pedas dan aroma yang kuat, sehingga sering digunakan sebagai bumbu masakan di berbagai belahan dunia. Penggunaan cengkih juga mencakup pembuatan rokok kretek di Indonesia, pengobatan tradisional, dan sebagai bahan rempah dalam minuman hangat.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup2">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/37db4d260d6e1089614c49ae61437e22.jpg" alt="Rempah Rempah Indonesia">
                <p>Pala</p>
            </a>
        </div>
        <div id="popup2" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Pala</h2>
                <p>Pala adalah tanaman rempah yang memiliki bentuk buah bulat hingga lonjong, dengan warna hijau kekuningan saat matang. Buah pala dapat mencapai diameter antara 3 hingga 9 cm dan akan terbelah menjadi dua saat matang. Setiap bagian dari tanaman pala dapat dimanfaatkan, termasuk biji, daging buah, dan fuli.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup3">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/f883d53bf6bfae4d03ad8b6b4af0817b.jpg" alt="Rempah Rempah Indonesia">
                <p>Kapulaga</p>
            </a>
        </div>
        <div id="popup3" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>kapulaga</h2>
                <p>Buah kapulaga berbentuk bulat kecil, berwarna hijau atau coklat tua. Biji di dalamnya berwarna hitam dan memiliki aroma yang khas, hangat, dan sedikit pedas.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup4">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/7efc2e059aaae4c1be4edb1f137188d0.jpg" alt="Rempah Rempah Indonesia">
                <p>Andaliman</p>
            </a>
        </div>
        <div id="popup4" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Andaliman</h2>
                <p>Berasal dari buah tanaman andaliman yang masih sekeluarga dengan jeruk. Bentuknya kecil-kecil dan berwarna coklat kehitaman.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup5">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/7b6ba75357a8e3316a36d09f80644fd1.jpg" alt="Rempah Rempah Indonesia">
                <p>Kemukus</p>
            </a>
        </div>
        <div id="popup5" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Kemukus</h2>
                <p>Biji kemukus berbentuk bulat pipih, berwarna coklat tua hingga hitam. Aromanya kuat, sedikit pahit, dan harum. Sering digunakan dalam masakan tradisional Jawa dan Bali. Memberikan aroma khas pada masakan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup6">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/8f151eac3a99ee683feaca8699a8f82d.jpg" alt="Rempah Rempah Indonesia">
                <p>Kayu Secang</p>
            </a>
        </div>
        <div id="popup6" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Kayu Secang</h2>
                <p>Kayu secang berbentuk serpihan atau bubuk, berwarna merah tua. Tidak memiliki rasa yang signifikan, namun menghasilkan warna merah alami pada makanan. Sering digunakan sebagai pewarna alami pada masakan dan minuman. Juga memiliki khasiat untuk kesehatan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup7">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/ff5a69c8e0a3b2fa2c97896baaacfc9b.jpg" alt="Rempah Rempah Indonesia">
                <p>Kunyit</p>
            </a>
        </div>
        <div id="popup7" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Kunyit</h2>
                <p>Akar tanaman kunyit berwarna kuning cerah. Biasanya digunakan dalam bentuk segar, bubuk, atau pasta. Pahit, namun menghasilkan warna kuning cerah pada makanan. Selain sebagai bumbu masak, kunyit juga memiliki banyak khasiat untuk kesehatan, seperti anti-inflamasi dan antioksidan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup8">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/cd90ff8cffae0257e7f214745edf26cb.jpg" alt="Rempah Rempah Indonesia">
                <p>Ketumbar</p>
            </a>
        </div>
        <div id="popup8" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Ketumbar</h2>
                <p>Biji ketumbar berbentuk bulat kecil, berwarna coklat muda atau keabu-abuan. Aroma harum dan rasa sedikit pedas. Sering digunakan sebagai bumbu dasar dalam berbagai masakan. Memberikan aroma yang khas dan meningkatkan cita rasa.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup9">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/e29b9fe861576e7223b34259b60d44c9.jpg" alt="Rempah Rempah Indonesia">
                <p>Daun Salam</p>
            </a>
        </div>
        <div id="popup9" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Daun Salam</h2>
                <p>Daun salam berbentuk lonjong, berwarna hijau tua. Tidak memiliki rasa yang signifikan, namun memberikan aroma yang khas. Sering digunakan dalam masakan berkuah untuk memberikan aroma yang sedap.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup10">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/47cebadb6fca1b844fc16366ba3647c7.jpg" alt="Rempah Rempah Indonesia">
                <p>Bunga Lawang</p>
            </a>
        </div>
        <div id="popup10" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Bunga Lawang</h2>
                <p>Bentuknya seperti bintang berwarna coklat tua. Aromanya kuat, manis, dan sedikit pedas. Sering digunakan dalam masakan berkuah atau untuk membuat minuman. Memberikan aroma yang khas.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup11">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/9265ad4892ad05bceac2e206558ceac4.jpg" alt="Rempah Rempah Indonesia">
                <p>Kemiri</p>
            </a>
        </div>
        <div id="popup11" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Kemiri</h2>
                <p>Biji kemiri berbentuk bulat, berwarna coklat. Tidak memiliki rasa yang signifikan, namun menghasilkan minyak yang harum saat digoreng. Sering digunakan sebagai bahan dasar bumbu halus. Memberikan rasa gurih pada masakan.</p>
            </div>
        </div>
        <div class="daerah-item">
            <a href="#popup12">
                <img src="https://cdn.idntimes.com/content-images/community/2018/08/2225ca1fef8c5fa26af077f12b45871c.jpg" alt="Rempah Rempah Indonesia">
                <p>Jahe</p>
            </a>
        </div>
        <div id="popup12" class="popup">
            <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h2>Jahe</h2>
                <p>Akar tanaman jahe berwarna kuning cerah. Pedas dan sedikit pahit. Selain sebagai bumbu masak, jahe juga memiliki banyak khasiat untuk kesehatan, seperti menghangatkan tubuh dan meredakan sakit perut.</p>
            </div>
        </div>
    </section>
</div>
</main>

<?php include_once(APP_PATH . 'includes/footer.php')?>


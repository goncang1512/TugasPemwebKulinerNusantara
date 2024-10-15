<main class="body">
    <h1 class="judul-bika"><?= $data["resep"]["judul"]?></h1>
    <div class="atas">
        <img class="gambar1"src="https://c1.wallpaperflare.com/preview/428/552/953/bika-ambon-bika-plate-slice.jpg" alt="Bika Ambon">
        <p><?= $data["resep"]["deskripsi"]?>
        </p>
    </div>
    <div style="border-top: 2px solid black; width: 100%; margin: 20px 0;margin-top:50px"></div>

    <div class="container-timer">
        <div style="height: 35px; width:100%; background-color: green;"></div>
        <div style="padding: 10px;">
            <table style="width:100%;margin-left:40px">
                <tr>
                    <th>Waktu Persiapan :</th>
                    <th>Waktu Memasak :</th>
                    <th>Total Waktu :</th>
                </tr>
                <tr>
                    <th><?= $data["resep"]["waktu_persiapan"]?></th>
                    <th><?= $data["resep"]["waktu_memasak"]?></th>
                    <th><?= $data["resep"]["total_waktu"]?></th>
                </tr>
                <tr>
                    <th style="padding-top:50px">Porsi :</th>
                    <th style="padding-top:50px">Kesulitan :</th>
                </tr>
                <tr>
                    <th><?=$data["resep"]["porsi"]?></th>
                    <th><?= $data["resep"]["kesulitan"]?></th>
                </tr>
            </table>
        </div>
        <div style="padding:20px 50px">
            <div style="border-top: 2px solid #a9e5a9; width: 100%;"></div>
        </div>

        <div class="button">
        <h6 id="displayWaktumemasak" style="font-size:20px">
         <?= isset($data["resep"]["waktu_memasak"]) ? $data["resep"]["waktu_memasak"] : "Waktu Memasak Tidak Ditemukan"; ?>
        </h6>
            <button id="startButton"class="btn"><i class="bi bi-stopwatch"></i>Mulai Waktu</button>
        </div>
        
        <div id="countdown" style="font-size: 2em; margin-top: 20px;display: none;">00:00:00</div>
        
        
    </div>

    <div class="container2">
        <div class="section">
            <h2>Bahan-Bahan</h2>
            <ul><?=$data["resep"]["bahan_bahan"]?>
            </ul>
        </div>
        <div class="section instructions">
            <h2>Cara Membuat</h2>
            <ol><?=$data["resep"]["langkah_langkah"]?>
            </ol>
        </div>
    </div>

        <div class="container3">
            <h2>Kamu menyukai resep ini ?</h1>
            <div class="bintang">
                <a style="color:yellow"href="index.php?resep=<?= $data["resep"]["slug"] ?>&resep_id=<?=$data["resep"]["id"] ?>&user_id=<?=$data["user"]["id"]?>&rating=1"><i class="bi bi-star-fill"></i></a>

                <a style="color:yellow"href="index.php?resep=<?= $data["resep"]["slug"] ?>&resep_id=<?=$data["resep"]["id"] ?>&user_id=<?=$data["user"]["id"]?>&rating=2"><i class="bi bi-star-fill"></i></a>

                <a style="color:yellow"href="index.php?resep=<?= $data["resep"]["slug"] ?>&resep_id=<?=$data["resep"]["id"] ?>&user_id=<?=$data["user"]["id"]?>&rating=3"><i class="bi bi-star-fill"></i></a>

                <a style="color:yellow"href="index.php?resep=<?= $data["resep"]["slug"] ?>&resep_id=<?=$data["resep"]["id"] ?>&user_id=<?=$data["user"]["id"]?>&rating=4"><i class="bi bi-star-fill"></i></a>

                <a style="color:yellow"href="index.php?resep=<?= $data["resep"]["slug"] ?>&resep_id=<?=$data["resep"]["id"] ?>&user_id=<?=$data["user"]["id"]?>&rating=5"><i class="bi bi-star-fill"></i></a>
                
                
            </div>
        </div>

<?php include_once(APP_PATH . 'includes/footer.php')?>
</main>

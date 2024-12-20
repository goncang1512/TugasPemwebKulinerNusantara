<?php 
    $jumlahKomentar = count($data['comment']);
?>
<main style="padding: 20px 80px;"class="body">
    <h1 class="judul-bika"><?= $data['resep']['judul'] ?></h1>
    <div class="container1">
        <div class="atas">
            <img class="gambar1"src="<?= $data['resep']['gambar'] ?>" alt="Bika Ambon">
            <p class="deskripsi1"><?= $data['resep']['deskripsi'] ?>
            </p>
        </div>
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
                    <th><?= $data['resep']['waktu_persiapan'] ?></th>
                    <th><?= $data['resep']['waktu_memasak'] ?></th>
                    <th><?= $data['resep']['total_waktu'] ?></th>
                </tr>
                <tr>
                    <th style="padding-top:50px">Porsi :</th>
                    <th style="padding-top:50px">Kesulitan :</th>
                </tr>
                <tr>
                    <th><?= $data['resep']['porsi'] ?></th>
                    <th><?= $data['resep']['kesulitan'] ?></th>
                </tr>
            </table>
        </div>
        <div style="padding:20px 50px">
            <div style="border-top: 2px solid #a9e5a9; width: 100%;"></div>
        </div>

        <div class="button">
            <h6 id="displayWaktumemasak" style="font-size:20px">
                <?= isset($data['resep']['waktu_memasak']) ? $data['resep']['waktu_memasak'] : 'Waktu Memasak Tidak Ditemukan' ?>
            </h6>
            <button id="startButton"class="btn"><i class="bi bi-stopwatch"></i>Mulai Waktu</button>
        </div>

        <div id="countdown" style="font-size: 2em; margin-top: 20px;display: none;">00:00:00</div>

    </div>


    <div class="containerbahan">
        <div class="section">
            <h2>Bahan-Bahan</h2>
            <div class="bahan-bahan-resep-bahan">
                <?php
                $bahanBahan = explode("\n", $data['resep']['bahan_bahan']);
                $half = ceil(count($bahanBahan) / 2);
                $leftColumn = array_slice($bahanBahan, 0, $half);
                $rightColumn = array_slice($bahanBahan, $half);
                ?>

                <div class="column-resep">
                    <?php foreach($leftColumn as $bahan): ?>
                    <p><?php echo htmlspecialchars($bahan); ?></p>
                    <?php endforeach; ?>
                </div>

                <div class="column-resep">
                    <?php foreach($rightColumn as $bahan): ?>
                    <p><?php echo htmlspecialchars($bahan); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="containercara">
        <h2>Cara Membuat</h2>
        <?php
        $langkahLangkah = explode("\n", $data['resep']['langkah_langkah']);
        
        foreach ($langkahLangkah as $langkah) {
            echo '<p>' . htmlspecialchars($langkah) . '</p>';
        }
        ?>
    </div>

    <?php if(isset($data['resep']['vidio'])):?>
        <div style="padding-top: 20px; display: flex; justify-content: center;">
            <video poster="<?= $data['resep']['gambar']?>" width="720" height="480" style="border: 1px solid #a9e5a9; border-radius: 10px;" controls>
                <source src="<?= $data['resep']['vidio']?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    <?php endif;?>

    <div class="container3" style="margin-bottom: 50px;">
        <h2>Kamu menyukai resep ini ?</h1>
            <div class="bintang">
                <a
                    style="color:#cb9d06"href="index.php?resep=<?= $data['resep']['slug'] ?>&resep_id=<?= $data['resep']['id'] ?>&user_id=<?= $data['user']['id'] ?>&rating=1"><i
                        class="bi bi-star-fill"></i></a>

                <a
                    style="color:#cb9d06"href="index.php?resep=<?= $data['resep']['slug'] ?>&resep_id=<?= $data['resep']['id'] ?>&user_id=<?= $data['user']['id'] ?>&rating=2"><i
                        class="bi bi-star-fill"></i></a>

                <a
                    style="color:#cb9d06"href="index.php?resep=<?= $data['resep']['slug'] ?>&resep_id=<?= $data['resep']['id'] ?>&user_id=<?= $data['user']['id'] ?>&rating=3"><i
                        class="bi bi-star-fill"></i></a>

                <a
                    style="color:#cb9d06"href="index.php?resep=<?= $data['resep']['slug'] ?>&resep_id=<?= $data['resep']['id'] ?>&user_id=<?= $data['user']['id'] ?>&rating=4"><i
                        class="bi bi-star-fill"></i></a>

                <a
                    style="color:#cb9d06"href="index.php?resep=<?= $data['resep']['slug'] ?>&resep_id=<?= $data['resep']['id'] ?>&user_id=<?= $data['user']['id'] ?>&rating=5"><i
                        class="bi bi-star-fill"></i></a>


            </div>
    </div>

    <div class="container-ulasan">
        <h3>Berikan Ulasanmu</h3>
        <form action="" method="POST" class="isi-ulasan">
            <div>
                <p style="margin-top:10px">*komentar</p>
            </div>
            <input type="text" name="quest" value="addComment" readonly hidden>
            <input type="text" name="user_id" value="<?= $data['user']['id'] ?>" readonly hidden>
            <input type="text" name="resep_id" value="<?= $data['resep']['id'] ?>" readonly hidden>
            <textarea style="margin-bottom: 10px" name="comment" id=""></textarea>
            <button type="submit" class="tombol-ulasan"style="margin-top:10px;width:60px;">Kirim</button>
        </form>
    </div>

    <div id="komentar"></div>
    <div class="container-komentar">
        <h3 style="border-bottom: 1px solid black; width: max-content; margin-bottom: 40px; margin-top: 40px;">
            <?= $jumlahKomentar?> Komentar</h3>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <?php foreach($data['comment'] as  $index => $comment):?>
            <div key="<?= $comment['id']?>" class="comment-card-<?= $comment['id']?>" id="<?= $comment['id']?>" style='display: flex;'>
                <img class="profile-picture" src="<?= $_ENV['BASE_URL'] . 'assets/avatar/'.$comment['avatar'] ?>"
                    alt="">
                <div class="chat-bubble">
                    <div class="message-content">
                        <div style="display: flex; justify-content: space-between;">
                            <p class="sender-name"><?= $comment['username']?></p>
                            <?php if($data['user'] ? $data['user']['id']  == $comment['user_id']: null):?>
                                <button onclick="handleRouter('<?= BASE_URL.'pages/detail/index.php?resep='. $_GET['resep'].'&quest=delete&comment_id='.$comment['id']?>')" style="background-color: transparent; border: none;"><i class="bi bi-trash3"></i></button>
                            <?php endif;?>
                        </div>
                        <p class="message-text"><?= $comment['comment']?></p>
                        <p class="timestamp">April 5, 2024</p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

</main>

<?php include_once APP_PATH . 'includes/footer.php'; ?>

<!-- $props -->

<?php if($props["status"] == "save") : ?>
    <div class="card card-content-<?= $props["resep"]["resep_id"]?>">
        <img src="<?= $props["resep"]["gambar"]?>" class="card-img-top" alt="..." style="height: 13rem; object-fit: cover;">
        <div class="card-body">
            <div class="title-body">
                <h5 class="card-title"><?= $props["resep"]["judul"]?></h5>
                <button class="button-save" onclick="save('index.php?q=save&user_id=<?= $props['user']['id']?>&resep_id=<?= $props['resep']['resep_id']?>', <?= $props['resep']['resep_id']?>)">
                    <i id="heart-save-<?= $props['resep']['resep_id']?>" class="bi bi-heart-fill text-danger"></i>
                </button>
            </div>
            <div class="body-rating">
            <div class="body-star">
                    <p>Ulasan <?= $props["resep"]["total_rating"] > 0 ? floor($props["resep"]["total_rating"]/ $props["resep"]["jumlah_rating"]) : 5?>/5</p>
                    <div style="font-size: 15px;">
                        <?php 
                        $rating = round($props["resep"]["total_rating"]);
                        for ($i = 1; $i <= 5; ++$i) : 
                            $hasil = $props["resep"]["total_rating"] > 0 
                                    ? (floor($rating / $props["resep"]["jumlah_rating"]) >= $i ? "#F4E212" : "#94a3b8") 
                                    : "#F4E212";
                        ?>
                            <i class="bi bi-star-fill" style='color: <?= $hasil ?>;'></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between w-100 gap-2">
                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$props['resep']["slug"]?>" class="button-go">Lihat</a>
                    <div class="btn-group" style="display: <?= $props["resep"]["make_id"] == $props["user"]["id"] ? "flex" : "none"?>;">
                        <button type="button" style="background: transparent; border:none;" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <?php if($props["resep"]["make_id"] == $props["user"]["id"]) : ?>
                                    <button class="button-save dropdown-item" onclick="handleRouter('index.php?q=delete&resep_id=<?= $props['resep']['resep_id']?>')" style="color: black; font-size: 16px;">
                                        Hapus
                                    </button>
                                <?php endif;?>
                            </li>
                            <li><a class="dropdown-item" href="<?= $_ENV["BASE_URL"].'pages/upload/index.php?resep_id='.$props["resep"]["resep_id"]?>">Edit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif($props["status"] == "card") : ?>
    <div class="card">
        <img src="<?= $props['resep']["gambar"]?>" class="card-img-top" alt="" style="height: 13rem; object-fit: cover;">
        <div class="card-body">
            <div class="title-body">
                <h5 class="card-title"><?= $props['resep']["judul"]?></h5>
                <button class="button-save" onclick="save('index.php?q=save&user_id=<?= $props['user']['id']?>&resep_id=<?= $props['resep']['id']?>', <?= $props['resep']['id']?>)">
                    <i id="heart-save-<?= $props['resep']['id']?>" class="bi <?= isRecipeSaved($props["save"], $props["user"]["id"], $props['resep']["id"]) ? "bi-heart-fill text-danger" : "bi-heart"?>"></i>
                </button>
            </div>
            <div class="body-rating">
            <div class="body-star">
                    <p>Ulasan <?= $props["resep"]["total_rating"] > 0 ? floor($props["resep"]["total_rating"]/ $props["resep"]["jumlah_rating"]) : 5?>/5</p>
                    <div style="font-size: 15px;">
                        <?php 
                        $rating = round($props["resep"]["total_rating"]);
                        for ($i = 1; $i <= 5; ++$i) : 
                            $hasil = $props["resep"]["total_rating"] > 0 
                                    ? (floor($rating / $props["resep"]["jumlah_rating"]) >= $i ? "#F4E212" : "#94a3b8") 
                                    : "#F4E212";
                        ?>
                            <i class="bi bi-star-fill" style='color: <?= $hasil ?>;'></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between w-100 gap-2">
                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$props['resep']["slug"]?>" class="button-go">Lihat</a>
                    <div class="btn-group" style="display: <?= $props["resep"]["make_id"] == $props["user"]["id"] ? "flex" : "none"?>;">
                        <button type="button" style="background: transparent; border:none;" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <?php if($props["resep"]["user_id"] == $props["user"]["id"]) : ?>
                                    <button class="button-save dropdown-item" onclick="handleRouter('index.php?q=delete&resep_id=<?= $props['resep']['id']?>')" style="color: black; font-size: 16px;">
                                        Hapus
                                    </button>
                                <?php endif;?>
                            </li>
                            <li><a class="dropdown-item" href="<?= $_ENV["BASE_URL"].'pages/upload/index.php?resep_id='.$props["resep"]["id"]?>">Ubah</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif($props["status"] == "notlogin") : ?>
    <div class="card">
        <img src="<?= $props['resep']["gambar"]?>" class="card-img-top" alt="" style="height: 13rem; object-fit: cover;">
        <div class="card-body">
            <div class="title-body">
                <h5 class="card-title"><?= $props['resep']["judul"]?></h5>
                <button class="button-save">
                    <i id="heart-save-<?= $props['resep']['id']?>" class="bi bi-heart"></i>
                </button>
            </div>
            <div class="body-rating">
            <div class="body-star">
                    <p>Rating <?= $props["resep"]["total_rating"] > 0 ? floor($props["resep"]["total_rating"]/ $props["resep"]["jumlah_rating"]) : 5?>/5</p>
                    <div style="font-size: 15px;">
                        <?php 
                        $rating = round($props["resep"]["total_rating"]);
                        for ($i = 1; $i <= 5; ++$i) : 
                            $hasil = $props["resep"]["total_rating"] > 0 
                                    ? (floor($rating / $props["resep"]["jumlah_rating"]) >= $i ? "#F4E212" : "#94a3b8") 
                                    : "#F4E212";
                        ?>
                            <i class="bi bi-star-fill" style='color: <?= $hasil ?>;'></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between w-100 gap-2">
                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$props['resep']["slug"]?>" class="button-go">Lihat</a>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>

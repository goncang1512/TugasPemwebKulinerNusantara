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
                    <p>Rating 5</p>
                    <div style="font-size: 15px; color: #F4E212;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between w-100 gap-2">
                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$props['resep']["slug"]?>" class="button-go">Lihat</a>
                    <?php if($props['user']["id"] == $props['resep']["make_id"]):?>
                        <button class="button-save" onclick="handleRouter('index.php?q=delete&resep_id=<?= $props['resep']['resep_id']?>')" style="color: black;">
                            <i class="bi bi-trash3"></i>
                        </button>
                    <?php endif;?>
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
                    <p>Rating 5</p>
                    <div style="font-size: 15px; color: #F4E212;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between w-100 gap-2">
                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$props['resep']["slug"]?>" class="button-go">Lihat</a>
                    <?php if($props["resep"]["user_id"] == $props["user"]["id"]) : ?>
                        <button class="button-save" onclick="handleRouter('index.php?q=delete&resep_id=<?= $props['resep']['id']?>')" style="color: black;">
                            <i class="bi bi-trash3"></i>
                        </button>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>

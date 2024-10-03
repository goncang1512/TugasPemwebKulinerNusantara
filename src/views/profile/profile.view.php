<main class="main-profile">
    <?php 
        function isRecipeSaved(array $saves, int $user_id, int $resep_id): bool {
            foreach ($saves as $entry) {
                if ($entry["user_id"] === $user_id && $entry["resep_id"] === $resep_id) {
                    return true;
                }
            }
            return false;
        }
    ?>

    <div class="top-profile">
        <div>
            <img class="avatar-profile" src="<?= BASE_URL?>assets/avatar/<?= $data["user"]["avatar"]?>" alt="">
        </div>
        <div class="data-user">
            <h1 class="name-user">Selamat datang, <?= $data["user"]["username"]?>!</h1>
            <h6>email: <?= $data["user"]["email"]?></h6>
            <a href="index.php?q=logout" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Content USER -->
     <div class="container-content">
        <div>
            <button id="button-resep" type="button" class="button-prof">Resep</button>
            <button id="button-simpan" type="button" class="button-prof">Simpan</button>
        </div>
        <div class="my-content-container">

            <!-- CONTAINER RESEP MAKANAN -->
            <div class="container-resep">
                <?php foreach($data["resep"] as $resep) : ?>
                    <div class="card">
                        <img src="<?= BASE_URL."assets/images/".$resep["gambar"]?>" class="card-img-top" alt="..." style="max-height: 18rem;">
                        <div class="card-body">
                            <div class="title-body">
                                <h5 class="card-title"><?= $resep["judul"]?></h5>
                                <?php if(isRecipeSaved($data["save"], $data["user"]["id"], $resep["id"])):?> 
                                    <a href="index.php?q=save&user_id=<?= $data["user"]["id"]?>&resep_id=<?= $resep["id"]?>" style="font-size: 25px; color: red;">
                                        <i class="bi bi-heart-fill"></i>
                                    </a>
                                <?php else : ?>
                                    <a href="index.php?q=save&user_id=<?= $data["user"]["id"]?>&resep_id=<?= $resep["id"]?>" style="font-size: 25px; color: black;">
                                        <i class="bi bi-heart"></i>
                                    </a>
                                <?php endif;?>
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
                                <div class="d-flex align-items-center gap-2">
                                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$resep["slug"]?>" class="button-go">Lihat Selengkapnya</a>
                                    <a class="fs-4" href="index.php?q=delete&resep_id=<?= $resep["id"]?>">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <!-- CONTAINER SIMPAN RESEP -->
            <div class="container-simpan">
                <?php foreach($data["resep"] as $resep) : ?>
                    <div class="card">
                        <img src="<?= BASE_URL."assets/images/".$resep["gambar"]?>" class="card-img-top" alt="..." style="max-height: 18rem;">
                        <div class="card-body">
                            <div class="title-body">
                                <h5 class="card-title"><?= $resep["judul"]?></h5>
                                <a href="index.php?q=save&user_id=<?= $data["user"]["id"]?>&resep_id=<?= $resep["id"]?>" style="font-size: 25px; color: red;">
                                    <i class="bi bi-heart-fill"></i>
                                </a>
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
                                <div class="d-flex align-items-center gap-2">
                                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$resep["slug"]?>" class="button-go">Lihat Selengkapnya</a>
                                    <a class="fs-4" href="index.php?q=delete&resep_id=<?= $resep["id"]?>">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
     </div>
</main>
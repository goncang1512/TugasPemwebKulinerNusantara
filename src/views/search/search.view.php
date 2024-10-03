<main>
    <div class="container-resep" style="padding: 10px;">
        <?php foreach($data["resep"] as $resep) : ?>
            <div class="card">
                <img src="<?= BASE_URL."assets/images/".$resep["gambar"]?>" class="card-img-top" alt="..." style="max-height: 18rem;">
                <div class="card-body">
                    <div class="title-body">
                        <h5 class="card-title"><?= $resep["judul"]?></h5>
                        <p style="font-size: 25px; color: red;"><i class="bi bi-heart-fill"></i></p>
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
                            <?php if(isset($data["user"]["id"]) && $data["user"]["id"] == $resep["user_id"]):?>
                                <a class="fs-4" href="index.php?q=delete&resep_id=<?= $resep["id"]?>">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
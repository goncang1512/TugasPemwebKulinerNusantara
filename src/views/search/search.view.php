<main>
    <div class="container-resep" style="padding: 10px;">
        <?php foreach($data["resep"] as $resep) : ?>
            <div class="card">
                <img src="<?= BASE_URL."assets/images/".$resep["gambar"]?>" class="card-img-top" alt="..." style="max-height: 18rem;">
                <div class="card-body">
                    <div class="title-body">
                        <h5 class="card-title"><?= $resep["judul"]?></h5>
                        <p style="font-size: 25px;"><i class="bi bi-heart"></i></p>
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
                        <a href="<?= BASE_URL.'pages/detail/index.php?resep_id='.$resep["id"]?>" class="button-go">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
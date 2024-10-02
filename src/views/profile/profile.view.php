<main class="main-profile">
    <div class="top-profile">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </div>
        <div class="data-user">
            <h1>Selamat datang, Goncang!</h1>
            <h6>email: amri@gmail.com</h6>
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
                                <a href="<?= BASE_URL.'pages/detail/index.php?resep_id='.$resep["id"]?>" class="button-go">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
     </div>
</main>
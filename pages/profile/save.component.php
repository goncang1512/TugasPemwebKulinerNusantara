<?php
    include_once("../../src/app/app.php");

    $session = getSession();

    use Controller\SaveCtrl;
    $save = new SaveCtrl();
    $saveData = $save->getBySaveUser($session["id"]);  
?>

<?php foreach($saveData as $resep) : ?>
    <div class="card card-content-<?= $resep["resep_id"]?>">
        <img src="<?= $resep["gambar"]?>" class="card-img-top" alt="..." style="max-height: 18rem;">
            <div class="card-body">
                <div class="title-body">
                    <h5 class="card-title"><?= $resep["judul"]?></h5>
                    <button class="button-save" onclick="save('index.php?q=save&user_id=<?= $session['id']?>&resep_id=<?= $resep['resep_id']?>', <?= $resep['resep_id']?>)">
                        <i id="heart-save-<?= $resep['resep_id']?>" class="bi bi-heart-fill text-danger"></i>
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
                <div class="d-flex align-items-center gap-2">
                    <a href="<?= BASE_URL.'pages/detail/index.php?resep='.$resep["slug"]?>" class="button-go">Lihat Selengkapnya</a>
                        <?php if($session["id"] == $resep["make_id"]):?>
                            <button class="button-save" onclick="handleRouter('index.php?q=delete&resep_id=<?= $resep['resep_id']?>')" style="color: black;">
                                <i class="bi bi-trash3"></i>
                            </button>
                        <?php endif;?>
                    </div>
                </div>
            </div>
    </div>
<?php endforeach; ?>

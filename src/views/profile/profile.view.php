<main class="main-profile">
    <div class="top-profile">
        <div>
            <img class="avatar-profile" src="<?= BASE_URL?>assets/avatar/<?= $data["user"]["avatar"]?>" alt="">
        </div>
        <div class="data-user">
            <h1 class="name-user">Selamat datang, <?= $data["user"]["username"]?>!</h1>
        </div>
    </div>

    <!-- Content USER -->
    <div class="container-content">
        <div style="display: flex; align-items: center; gap: 10px;">
            <button id="button-resep" type="button" class="button-prof">Resep</button>
            <button id="button-simpan" type="button" class="button-prof">Simpan</button>
        </div>
        <div class="my-content-container">

            <!-- CONTAINER RESEP MAKANAN -->
            <div id="my-resep" class="container-makanan">
                <?php 
                    foreach($data["resep"] as $resep) {
                        component("card", [
                        "resep" => $resep, 
                        "user" => $data["user"], 
                        "save" => $data["save"],
                        "status" => "card"
                        ]);
                    }
                ?>
            </div>

            <!-- CONTAINER SIMPAN RESEP -->
            <div id="my-save" class="container-none">
            </div>
        </div>
    </div>
</main>
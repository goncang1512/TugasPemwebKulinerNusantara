<main class="main-profile">
    <div class="top-profile">
        <div>
            <img class="avatar-profile" src="<?= BASE_URL?>assets/avatar/<?= $data["user"]["avatar"]?>" alt="">
        </div>
        <div class="data-user">
            <h1 class="name-user">Selamat datang, <?= $data["user"]["username"]?>!</h1>
            <h6>email: <?= $data["user"]["email"]?></h6>
            <button onclick="handleRouter('index.php?q=logout')" class="btn btn-danger">Logout</button>
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
            <div class="container-simpan">
            </div>
        </div>
    </div>
</main>
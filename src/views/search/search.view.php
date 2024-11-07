<main>
    <div class="container-makanan container-main">
        <?php if(empty($data["resep"])) :?>
            <div style="display: flex; color: red; width: 100%; justify-content:center; padding-top: 20px;">
                <p>Resep "<?= $_GET["keyword"]?>" tidak ada.</p>
            </div>
        <?php else :?>
        <?php
            foreach($data["resep"] as $resep) {
                component("card", [
                    "status" => $data["user"] ? "card" : "notlogin", 
                    "resep" => $resep, 
                    "user" => $data["user"], 
                    "save" => $data["save"]
                ]);
            }
        ?>
        <?php endif;?>
    </div>
</main>
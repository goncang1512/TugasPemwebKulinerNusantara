<main>
    <div class="container-resep" style="padding: 10px;">
        <?php
            foreach($data["resep"] as $resep) {
                component("card", [
                "resep" => $resep, 
                "user" => $data["user"], 
                "status" => "card", 
                "save" => $data["save"]
                ]);
            }
        ?>
    </div>
</main>
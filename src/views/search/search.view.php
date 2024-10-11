<main>
    <div class="container-resep" style="padding: 10px;">
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
    </div>
</main>
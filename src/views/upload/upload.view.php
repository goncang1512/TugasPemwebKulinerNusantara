<main class="main-konten">
    <p id="error-message" class="d-flex justify-content-center" style="color: red; font-style: italic;"><?= $data["errMsg"]?></p>
    <form id="<?= isset($_GET["resep_id"]) ? "update-form" : "upload-form" ?>" enctype="multipart/form-data" >
        <div class="image-resep">
            <div class="input-img">
                <label class="upload-food" for="upload-food">
                    <img class="w-100 image-preview" src="<?= isset($data["post"]["gambar"]) ? $data["post"]["gambar"] : "" ?>" alt="">
                    <div id="logo-gambar" class="logo-foto">
                        <span class="bi-photos"><i class="bi bi-image"></i></span>
                        <p>Input gambar makanan di sini.</p>
                    </div>
                </label>
                <input id="upload-food" name="gambar" type="file" accept=".jpg, .jpeg, .png" hidden>
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: row; align-items: center; gap: 10px;">
                    <label for="vidio">Vidio</label>
                    <input name="vidio" type="file" id="vidio" class="form-control" placeholder="Nama Makanan" aria-label="Nama Makanan" accept=".mp4" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" 
                     >
                </div>
            </div>
            <div class="table-input-judul"> 
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px;">
                    <label for="judul">Judul</label>
                    <input name="judul" type="text" id="judul" class="form-control" placeholder="Nama Makanan" aria-label="Nama Makanan" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" 
                    value="<?php echo isset($data['post']['judul']) ? $data['post']['judul'] : '' ?>" >
                </div>
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Deskripsi" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;min-height: 150px;"
                        ><?= isset($data['post']['deskripsi']) ? $data['post']['deskripsi'] : ""?></textarea>
                </div>
            </div>
        </div>

        <div class="d-flex gap-4 flex-column flex-md-row" style="padding-top: 20px;">
            <table class="data-resep" style="width: 100%; flex: 1;">
                <tr>
                    <td><label for="waktu_persiapan">Waktu persiapan</label></td>
                    <td>
                        <input name="waktu_persiapan" type="number" id="waktu_persiapan" class="form-control" placeholder="Waktu persiapan" aria-label="Waktu persiapan" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['waktu_persiapan']) ? $data['post']['waktu_persiapan'] : '' ?>"
                        >
                    </td>
                </tr>
                <tr>
                    <td><label for="waktu_memasak">Waktu Memasak</label></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <label for="jam">Jam:</label>
                            <input name="jam" type="number" id="jam" class="form-control" placeholder="Jam" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                            value="<?php echo isset($data['post']['jam']) ? $data['post']['jam'] : '00' ?>"
                            >
                            <label for="menit">Menit:</label>
                            <input name="menit" type="number" id="menit" class="form-control" placeholder="Menit" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                            value="<?php echo isset($data['post']['menit']) ? $data['post']['menit'] : '00' ?>"
                            >
                            <label for="detik">Detik:</label>
                            <input name="detik" type="number" id="detik" class="form-control" placeholder="Detik" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                            value="<?php echo isset($data['post']['detik']) ? $data['post']['detik'] : '00' ?>"
                            >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="total_waktu">Total Waktu</label></td>
                    <td>
                        <input name="total_waktu" type="number" inputmode="numeric" accept="numeric" id="total_waktu" class="form-control" placeholder="Total Waktu" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['total_waktu']) ? $data['post']['total_waktu'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="porsi">Porsi</label></td>
                    <td>
                        <input name="porsi" type="text" id="porsi" class="form-control" placeholder="Porsi" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" value="<?php echo isset($data['post']['porsi']) ? $data['post']['porsi'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="Kesulitan">Kesulitan</label></td>
                    <td>
                        <select id="Kesulitan" name="kesulitan" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo isset($data['post']['kesulitan']) ? $data['post']['kesulitan'] : '1' ?>">Tingkat Kesulitan</option>
                            <option value="Mudah">Mudah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="asal_makanan">Asal makanan</label></td>
                    <td>
                        <input name="asal_makanan" type="text" id="asal_makanan" class="form-control" placeholder="Asal makanan" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" value="<?php echo isset($data['post']['asal_makanan']) ? $data['post']['asal_makanan'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="kategori">Kategori makanan</label></td>
                    <td>
                        <input name="kategori" type="text" id="kategori" class="form-control" placeholder="Kategori makanan" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" value="<?php echo isset($data['post']['kategori']) ? $data['post']['kategori'] : '' ?>">
                    </td>
                </tr>
            </table>

            <div class="container-bahan flex-column gap-3" style="flex:1;">
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="bahan_bahan">Bahan bahan</label>
                    <textarea name="bahan_bahan" id="bahan_bahan" type="text" class="form-control" placeholder="Bahan bahan" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;min-height: 150px;"><?= isset($data['post']['bahan_bahan']) ? htmlspecialchars($data['post']['bahan_bahan']) : ""?></textarea>
                </div>
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="langkah-langkah">Langkah langkah</label>
                    <textarea name="langkah_langkah" id="langkah-langkah" type="text" class="form-control" placeholder="Langkah langkah" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;min-height: 150px;"><?= isset($data['post']['langkah_langkah']) ? htmlspecialchars($data['post']['langkah_langkah']) : ""?></textarea>
                </div>
                <input type="number" name="user_id" value="<?= $data["user"]["id"]?>" readonly hidden>
            </div>
        </div>

        <?php if(isset($_GET["resep_id"])):?>
            <input type="text" name="resep_id" value="<?= $_GET["resep_id"] ?>" readonly hidden>
        <?php endif;?>
        <div class="d-flex justify-content-center justify-content-md-end pt-4">
            <button type="submit" class="button-upload">
                <div class="loader">
                    <span class="loader-text">Loading...</span>
                </div>
                <span class="button-text">
                    Unggah
                </span>
            </button>
        </div>
    </form>
</main>
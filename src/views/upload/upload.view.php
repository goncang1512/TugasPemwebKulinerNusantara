<main class="main-konten">
    <p id="error-message" class="d-flex justify-content-center" style="color: red; font-style: italic;"><?= $data["errMsg"]?></p>
    <form id="upload-form" method="POST" action="" enctype="multipart/form-data" >
        <div class="image-resep">
            <div class="input-img">
                <label class="upload-food" for="upload-food">
                    <img class="w-100 image-preview" src="" alt="">
                    <div id="logo-gambar" class="logo-foto">
                        <span class="bi-photos"><i class="bi bi-image"></i></span>
                        <p>Input gambar makanan di sini.</p>
                    </div>
                </label>
                <input id="upload-food" name="gambar" type="file" accept=".jpg, .jpeg, .png" hidden>
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
            <table class="" style="width: 100%; flex: 1;">
                <tr>
                    <td>Waktu persiapan</td>
                    <td>
                        <input name="waktu_persiapan" type="number" id="judul" class="form-control" placeholder="Waktu persiapan" aria-label="Waktu persiapan" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['waktu_persiapan']) ? $data['post']['waktu_persiapan'] : '' ?>"
                        >
                    </td>
                </tr>
                <tr>
                    <td>Waktu Memasak</td>
                    <td>
                        <input name="waktu_memasak" type="number" id="judul" class="form-control" placeholder="Waktu Memasak" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['waktu_memasak']) ? $data['post']['waktu_memasak'] : '' ?>"
                        >
                    </td>
                </tr>
                <tr>
                    <td>Total Waktu</td>
                    <td>
                        <input name="total_waktu" type="number" inputmode="numeric" accept="numeric" id="judul" class="form-control" placeholder="Total Waktu" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['total_waktu']) ? $data['post']['total_waktu'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>Porsi</td>
                    <td>
                        <input name="porsi" type="text" id="judul" class="form-control" placeholder="Porsi" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" value="<?php echo isset($data['post']['porsi']) ? $data['post']['porsi'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kesulitan</td>
                    <td>
                        <select name="kesulitan" class="form-select" aria-label="Default select example">
                            <option selected value="<?php echo isset($data['post']['kesulitan']) ? $data['post']['kesulitan'] : '1' ?>">Tingkat Kesulitan</option>
                            <option value="Mudah">Mudah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Asal makanan</td>
                    <td>
                        <input name="asal_makanan" type="text" id="judul" class="form-control" placeholder="Asal makanan" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" value="<?php echo isset($data['post']['asal_makanan']) ? $data['post']['asal_makanan'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kategori makanan</td>
                    <td>
                        <input name="kategori" type="text" id="judul" class="form-control" placeholder="Kategori makanan" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;" value="<?php echo isset($data['post']['kategori']) ? $data['post']['kategori'] : '' ?>">
                    </td>
                </tr>
            </table>
            <div class="container-bahan flex-column gap-3" style="flex:1;">
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="deskripsi">Bahan bahan</label>
                    <textarea name="bahan_bahan" id="deskripsi" type="text" class="form-control" placeholder="Bahan bahan" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;min-height: 150px;"><?= isset($data['post']['bahan_bahan']) ? $data['post']['bahan_bahan'] : ""?></textarea>
                </div>
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="deskripsi">Langkah langkah</label>
                    <textarea name="langkah_langkah" id="deskripsi" type="text" class="form-control" placeholder="Langkah langkah" aria-label="Username" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;min-height: 150px;"><?= isset($data['post']['langkah_langkah']) ? $data['post']['langkah_langkah'] : ""?></textarea>
                </div>
                <input type="number" name="user_id" value="<?= $data["user"]["id"]?>" readonly hidden>
            </div>
        </div>

        <div class="d-flex justify-content-center pt-4">
            <button type="submit" name="upload" value="unggah" class="button-upload p-2">
                Unggah Resep
            </button>
        </div>
    </form>
</main>
<main class="md:p-[20px] p-[10px]">
    <p id="error-message" class="w-full pb-5 italic text-center text-red-500">
        <?= $data["errMsg"]?>
    </p>
    <form class="flex flex-col gap-5" id="upload-form" method="POST" action="" enctype="multipart/form-data" >
        <div class="flex flex-col gap-5 md:flex-row">
            <div class="input-img">
                <label class="cursor-pointer upload-food" for="upload-food">
                    <img class="w-full hidden rounded-lg max-h-[400px] object-cover border border-dashed image-preview" src="" alt="">
                    <div id="logo-gambar" class="logo-foto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                        </svg>
                        <p>Input gambar makanan di sini.</p>
                    </div>
                </label>
                <input id="upload-food" name="gambar" type="file" accept=".jpg, .jpeg, .png" required hidden>
            </div>
            <div class="flex flex-col flex-1 gap-2"> 
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px;">
                    <label for="judul">Nama</label>
                    <input name="judul" type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Nama Makanan"  required
                    value="<?php echo isset($data['post']['judul']) ? $data['post']['judul'] : '' ?>" >
                </div>
                <div class="input-group flex-nowrap">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary md:min-h-[290px]" placeholder="Deskripsi" required
                        ><?= isset($data['post']['deskripsi']) ? $data['post']['deskripsi'] : ""?></textarea>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-5 md:flex-row">
            <table class="flex-1">
                <tr>
                    <td>Waktu persiapan</td>
                    <td class="max-md:pb-2">
                        <input  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" name="waktu_persiapan" type="text" id="judul" class="form-control" placeholder="Waktu persiapan" aria-label="Waktu persiapan" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['waktu_persiapan']) ? $data['post']['waktu_persiapan'] : '' ?>" required />
                    </td>
                </tr>
                <tr>
                    <td>Waktu Memasak</td>
                    <td class="max-md:pb-2">
                        <input  name="waktu_memasak" type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" name="waktu_persiapan" type="text" id="judul" class="form-control" placeholder="Waktu persiapan" aria-label="Waktu persiapan" aria-describedby="addon-wrapping" style="width: 100%; border-radius: 5px;"
                        value="<?php echo isset($data['post']['waktu_memasak']) ? $data['post']['waktu_memasak'] : '' ?>"  required />
                    </td>
                </tr>
                <tr>
                    <td>Total Waktu</td>
                    <td class="max-md:pb-2">
                        <input placeholder="Total Waktu"  name="total_waktu" type="text" inputmode="numeric" accept="numeric" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" name="waktu_persiapan"
                        value="<?php echo isset($data['post']['total_waktu']) ? $data['post']['total_waktu'] : '' ?>"  required />
                    </td>
                </tr>
                <tr>
                    <td>Porsi</td>
                    <td class="max-md:pb-2">
                        <input name="porsi" type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Porsi" value="<?php echo isset($data['post']['porsi']) ? $data['post']['porsi'] : '' ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Kesulitan</td>
                    <td class="max-md:pb-2">
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary outline-none" name="kesulitan" required>
                            <option selected value="<?php echo isset($data['post']['kesulitan']) ? $data['post']['kesulitan'] : '1' ?>">Tingkat Kesulitan</option>
                            <option value="Mudah">Mudah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Asal makanan</td>
                    <td class="max-md:pb-2">
                        <input name="asal_makanan" type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"placeholder="Asal makanan" value="<?php echo isset($data['post']['asal_makanan']) ? $data['post']['asal_makanan'] : '' ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Kategori makanan</td>
                    <td class="max-md:pb-2">
                        <input name="kategori" type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Kategori makanan" value="<?php echo isset($data['post']['kategori']) ? $data['post']['kategori'] : '' ?>" required>
                    </td>
                </tr>
            </table>

            <div class="flex flex-col flex-1 gap-3">
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="deskripsi">Bahan bahan</label>
                    <textarea name="bahan_bahan" id="deskripsi" type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary min-h-[150px]" placeholder="Bahan bahan"required><?= isset($data['post']['bahan_bahan']) ? $data['post']['bahan_bahan'] : ""?></textarea>
                </div>
                <div class="input-group flex-nowrap" style="display: flex; flex-direction: column; gap: 10px; height: 100%;">
                    <label for="deskripsi">Langkah langkah</label>
                    <textarea name="langkah_langkah" id="deskripsi" type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary min-h-[150px]" placeholder="Langkah langkah"required><?= isset($data['post']['langkah_langkah']) ? $data['post']['langkah_langkah'] : ""?></textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <button type="submit" name="upload" value="unggah" class="p-2 font-semibold text-white border rounded-lg bg-primary hover:bg-green-500">
                Unggah Resep
            </button>
        </div>
    </form>
</main>
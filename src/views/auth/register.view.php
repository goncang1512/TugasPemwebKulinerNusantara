<main class="main-container">
    <div class="container">
        <img class="image" src="<?= BASE_URL."assets/images/logo-width.png"?>" alt="Logo Resep Nusantara">
        <p class="w-100 d-flex justify-content-center" style="color: red;"><?= $data["errMsg"]?></p>
        <form action="" method="POST" class="registrasi">
            <input name="username" type="text" placeholder="Username" 
            value="<?= isset($data["value"]["username"]) ? $data["value"]["username"] : '' ?>" required/>
            <input name="email" type="email" placeholder="Email"
            value="<?= isset($data["value"]["email"]) ? $data["value"]["email"] : '' ?>" required/>
            <div class ="mata">
                <input id="inputpassword" name="password" type="password" placeholder="Password"
                value="<?= isset($data["value"]["password"]) ? $data["value"]["password"] : '' ?>" required/>
                <img src="https://cdn-icons-png.flaticon.com/128/159/159604.png" alt="" id="mata">
                <!-- https://cdn-icons-png.flaticon.com/128/10812/10812267.png -->
            </div>
            <div class ="mata">
                <input id="inputpassword-re" name="re-password" type="password" placeholder="Konfirmasi password"
                value="<?= isset($data["value"]["re-password"]) ? $data["value"]["re-password"] : '' ?>" required/>
                <img id="mata-re" src="https://cdn-icons-png.flaticon.com/128/159/159604.png" alt="">
            </div>
            <button name="submit" value="register" type="submit">Daftar</button>
        </form> 
        <p class="pt-2">Sudah punya <a href="<?= BASE_URL."pages/login"?>">akun</a></p>
    </div>
</main>
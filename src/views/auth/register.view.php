<main>
    <div class="container">
        <img class="image" src="<?= BASE_URL."assets/image/logo_web_kuliner-removebg-preview.png"?>" alt="Logo Resep Nusantara">
        <p class="w-100 d-flex justify-content-center" style="color: red;"><?= $data["errMsg"]?></p>
        <form action="" method="POST" class="registrasi">
            <input name="username" type="text" placeholder="Username" 
            value="<?= isset($data["value"]["username"]) ? $data["value"]["username"] : '' ?>" required/>
            <input name="email" type="email" placeholder="Email"
            value="<?= isset($data["value"]["email"]) ? $data["value"]["email"] : '' ?>" required/>
            <input name="password" type="password" placeholder="Password"
            value="<?= isset($data["value"]["password"]) ? $data["value"]["password"] : '' ?>" required/>
            <input name="re-password" type="password" placeholder="Konfirmasi password"
            value="<?= isset($data["value"]["re-password"]) ? $data["value"]["re-password"] : '' ?>" required/>
            <button name="submit" value="register" type="submit">Daftar</button>
        </form> 
    </div>
</main>
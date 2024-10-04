<main>
    <!-- LOGIN PAGE -->
    <div class="container">
        <img class="image" src="<?= BASE_URL."assets/image/logo_web_kuliner-removebg-preview.png"?>" alt="Logo Resep Nusantara">
        <p class="d-flex w-100 justify-content-center" style="color: red;"><?= $data["errMsg"]?></p>
        <form action="" method="POST" class="registrasi">
            <input name="email" type="email" placeholder="Email">
            <input name="password" type="password" placeholder="Password">
            <div class="d-flex justify-content-between">
                <input id="remember-me" type="checkbox" name="remember" value="1">
                <label for="remember-me" style="color: white;">Ingat aku</label>
            </div>
            <button type="submit" name="submit" value="login">Masuk</button>
        </form> 
        <p class="pt-2">Belum punya <a href="<?= BASE_URL."pages/register"?>">akun</a></p>
    </div> 
</main>
<main class="main-container">
    <!-- LOGIN PAGE -->
    <div class="container">
        <img class="image" src="<?= BASE_URL."assets/images/logo-width.png"?>" alt="Logo Resep Nusantara">
        <p class="d-flex w-100 justify-content-center" style="color: red;"><?= $data["errMsg"]?></p>
        <form action="" method="POST" class="registrasi">
            <input name="email" type="email" placeholder="Email">
            <div class="mata">
                <input id="inputpassword" name="password" type="password" placeholder="Password">
                <img src="https://cdn-icons-png.flaticon.com/128/159/159604.png" alt="" id="mata">
            </div>
            <div class="d-flex justify-content-between">
                <input id="remember-me" type="checkbox" name="remember" value="1">
                <label for="remember-me" style="color: white;">Ingat saya</label>
            </div>
            <button type="submit" name="submit" value="login">Masuk</button>
        </form> 
        <p class="pt-2">Belum punya <a href="<?= BASE_URL."pages/register"?>">akun</a></p>
    </div> 
</main>
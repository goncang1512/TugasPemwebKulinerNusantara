<?php
$session = getSession();
?>

<nav class="<?php echo allowedComponent($pathname, $not_allowed_navbar) ? '' : ($pathname !== $_ENV['BASE_URL'] ? 'bg-body-tertiary shadow-sm' : ''); ?> navbar navbar-expand-lg">
    <div class="container-fluid">
        <a href="<?= BASE_URL ?>" class="navbar-brand">
            <img src="<?= BASE_URL . 'assets/images/logo-width.png' ?>" alt="" class="logo-navbar">
        </a>
        <button class="navbar-toggler bg-body-tertiary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-mobile p-2" id="navbarSupportedContent">
            <form action="<?= getenv('BASE_URL') . 'pages/search/index.php' ?>" method="GET" class="form-search" style="background-color: white">
                <button class="button-search" type="submit"><i class="bi bi-search"></i></button>
                <input class="input-search" name="keyword" type="search" placeholder="Telusuri" aria-label="Search"
                    value="<?php echo isset($data['keyword']) ? $data['keyword'] : ''; ?>">
            </form>
            <div class="div-link">
                <ul class="navbar-nav">
                    <li
                        class="nav-item <?= $pathname === $_ENV['BASE_URL'] || $pathname === $_ENV['BASE_URL'] . 'index.php' ? 'bg-nav-item-mobile in-link-mobile' : '' ?> nav-item-beranda">
                        <a class="nav-link fw-semibold fs-6" aria-current="page" href="<?= BASE_URL ?>">
                            Beranda
                        </a>
                    </li>
                    <?php if(isset($session)):?>
                    <li
                        class="nav-item <?= strpos($pathname, $_ENV['BASE_URL'] . 'pages/upload/') === 0 && empty($_GET['resep_id']) ? 'bg-nav-item in-link' : '' ?>">
                        <a class="nav-link fw-semibold fs-6" href="<?= BASE_URL . 'pages/upload' ?>">
                            Unggah Resep
                        </a>
                    </li>
                    <li
                        class="nav-item <?= strpos($pathname, $_ENV['BASE_URL'] . 'pages/profile/') === 0 ? 'bg-nav-item in-link' : '' ?>">
                        <a class="nav-link fw-semibold fs-6" href="<?= BASE_URL . 'pages/profile' ?>">
                            Profil
                        </a>
                    </li>
                    <li class="nav-item alig-items-center item-desktop" style="padding-top: 7px;">
                        <div class="btn-group">
                            <button type="button" style="background-color: transparent; border:none; padding: 0;"
                                class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="<?= $_ENV['BASE_URL'] ?>pages/profile"
                                        class="dropdown-item d-flex justify-content-between align-items-center gap-2"
                                        type="button">
                                        <?= $session['username'] ?>
                                        <img style="width: 30px; height: 30px; border-radius: 100%;"
                                            src="<?= $_ENV['BASE_URL'] . 'assets/avatar/' . $session['avatar'] ?>"
                                            alt="">
                                    </a>
                                </li>
                                <li>
                                    <button onclick="handleRouter('<?= BASE_URL.'pages/logout.php'?>')"
                                        class="dropdown-item d-flex justify-content-between" type="button">
                                        Logout <i style="padding-right: 6px;" class="bi bi-box-arrow-right"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item pt-3 w-100 justify-content-start drop-item">
                        <div class="w-100 bg-">
                            <button style="background-color: transparent; border:none; padding: 0;" class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Lihat lainnya
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= $_ENV['BASE_URL'] ?>pages/profile"
                                        class="dropdown-item d-flex justify-content-between align-items-center gap-2"
                                        type="button">
                                        <?= $session['username'] ?>
                                        <img style="width: 30px; height: 30px; border-radius: 100%;"
                                            src="<?= $_ENV['BASE_URL'] . 'assets/avatar/' . $session['avatar'] ?>"
                                            alt="">
                                    </a>
                                </li>
                                <li><button onclick="handleRouter('index.php?q=logout')"
                                        class="dropdown-item d-flex justify-content-between" type="button">
                                        Logout <i style="padding-right: 6px;" class="bi bi-box-arrow-right"></i>
                                    </button></li>
                            </ul>
                        </div>
                    </li>
                    <?php else : ?>
                    <li
                        class="nav-item <?= strpos($pathname, $_ENV['BASE_URL'] . 'pages/register/') === 0 ? 'bg-nav-item in-link' : '' ?>">
                        <a class="nav-link fw-semibold fs-6" href="<?= BASE_URL . 'pages/register' ?>">
                            Register
                        </a>
                    </li>
                    <li
                        class="nav-item <?= strpos($pathname, $_ENV['BASE_URL'] . 'pages/login/') === 0 ? 'bg-nav-item in-link' : '' ?>"">
                        <a class="nav-link fw-semibold fs-6" href="<?= BASE_URL . 'pages/login' ?>">
                            Login
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>
</nav>

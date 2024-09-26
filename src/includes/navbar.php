<nav class="navbar shadow-sm navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?= BASE_URL."assets/images/logo-width.png"?>" alt="" class="logo-navbar">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-search">
        <button class="button-search" type="submit"><i class="bi bi-search"></i></button>
        <input class="input-search" type="search" placeholder="Search" aria-label="Search">
      </form>
      <div class="div-link">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link fw-semibold fs-6 active" aria-current="page" href="<?= BASE_URL?>">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-semibold fs-6 active" href="<?= BASE_URL."pages/upload"?>">
                    Unggah Resep
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-semibold fs-6 active" href="<?= BASE_URL."pages/profile"?>">
                    Profil
                </a>
            </li>
        </ul>
        <a href="<?= BASE_URL."pages/profile"?>" class="icon-profile text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </a>
      </div>
    </div>
  </div>
</nav>

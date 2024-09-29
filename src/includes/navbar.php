<?php
  $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  function selectUrl($pathname, $url = "") {
    return strpos($pathname, BASE_URL. $url) === 0;
}
?>

<nav class="bg-white shadow-md border-gray-200 dark:bg-gray-900 fixed w-full md:px-10 px-2 z-[9999]">
  <div class="flex flex-wrap items-center justify-between p-4">

    <!-- LEFT NAVBAR -->
    <div class="flex items-center gap-4">
      <a href="<?= BASE_URL?>" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="<?= BASE_URL."assets/images/logo-width.png"?>" class="h-8" alt="Flowbite Logo" />
      </a>
      <div class="relative hidden md:block">
          <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search icon</span>
          </div>
          <input type="text" id="search-navbar" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Pencarian...">
      </div>
    </div>

    <div class="flex md:order-1">
      <!-- BUTTON HUMBERGER -->
      <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>

    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2" id="navbar-search">
        <div class="relative mt-3 md:hidden">
          <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input type="text" id="search-navbar" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Search...">
        </div>
        <div class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <a href="<?= BASE_URL?>" class="<?= $pathname === BASE_URL || $pathname === BASE_URL."index.php" ? "md:text-primary bg-primary text-white" : "text-gray-900" ?> block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-green-500 hover:underline" aria-current="page">Beranda</a>
            <a href="<?= BASE_URL."pages/upload/"?>" class="<?= selectUrl($pathname, "pages/upload/") ? "md:text-primary bg-primary text-white" : "text-gray-900" ?> block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-green-500 hover:underline">Unggah Resep</a>
            <a href="<?= BASE_URL."pages/profile"?>" class="<?= selectUrl($pathname, "pages/profile") ? "md:text-primary bg-primary text-white" : "text-gray-900" ?> block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-green-500 hover:underline">Profil</a>
        </div>
      </div>
  </div>
</nav>

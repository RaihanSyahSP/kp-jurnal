<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <title>Halaman <?= $data['judul']; ?></title>
  <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/tailwind/output.css"> -->
  <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/tailwind/input.css"> -->
  <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="h-screen">
  <div class="drawer">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <div class="w-full navbar bg-base-300">
        <div class="flex-none lg:hidden">
          <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </label>
        </div>
        <div class="flex-1 px-2 mx-2 font-bold text-xl">Jurnal UNIKOM</div>
        <div class="flex-none hidden lg:block">
          <ul class="menu menu-horizontal font-semibold">
            <!-- Navbar menu content here -->
            <li><a href="<?= BASEURL; ?>">Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/gscholar">Google Schoolar</a></li>
            <li><a href="<?= BASEURL; ?>/menu">Menu</a></li>
            <li><a href="<?= BASEURL; ?>/about">About</a></li>
          </ul>
        </div>
      </div>

      <!-- Content -->
    </div>
    <div class="drawer-side">
      <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 min-h-full bg-base-200">
        <!-- Sidebar content here -->
        <li><a href="<?= BASEURL; ?>/gscholar">Google Schoolar</a></li>
        <li><a href="<?= BASEURL; ?>/menu">Menu</a></li>
        <li><a href="<?= BASEURL; ?>/about">About</a></li>
      </ul>
    </div>
  </div>
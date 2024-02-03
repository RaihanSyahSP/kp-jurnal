<?php
if (!isset($_SESSION['username'])) {
  header('Location: /');
  exit();
}
?>



<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Halaman <?= $data['judul']; ?></title>

  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/img/logo_unikom_kuning.png">

  <!-- tailwindcss -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?= BASEURL; ?>/tailwind/output.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/tailwind/input.css">

  <!-- daisy ui -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- datatable -->
  <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DataTables Responsive CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />

  <!-- DataTables Responsive JS -->
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

  <style>
    .dt-buttons {
      display: flex;
      align-items: center;
      justify-content: start;
      padding-left: 20px;

      @media screen and (max-width: 640px) {
        flex-direction: column;
        justify-content: center;
        padding-top: 10px;
      }

    }

    .download-excel {
      padding-left: 0;

      @media screen and (min-width:640px) {
        padding-left: 90%;
      }
    }
  </style>

</head>

<body class="flex flex-col min-h-screen">
  <div class="drawer z-10">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <div class="p-3 w-full navbar bg-base-300 lg:p-2">
        <div class="flex-none lg:hidden">
          <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </label>
        </div>
        <div class="text-xl flex-1 px-2 mx-2 font-bold lg:text-xl">Jurnal Publikasi Ilmiah UNIKOM</div>
        <div class="flex-none hidden lg:block">
          <ul class="menu menu-horizontal font-semibold">
            <!-- Navbar menu content here -->
            <li><a href="<?= BASEURL; ?>/dashboard">Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/gscholar">Google Schoolar</a></li>
            <li><a href="<?= BASEURL; ?>/wos">Web of Science</a></li>
            <li><a href="<?= BASEURL; ?>/scopus">Scopus</a></li>
            <li><a href="<?= BASEURL; ?>/logout">Logout</a></li>
          </ul>
        </div>
      </div>

      <!-- Content -->
    </div>
    <div class="drawer-side">
      <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 min-h-full bg-base-200">
        <!-- Sidebar content here -->
        <li><a href="<?= BASEURL; ?>/dashboard">Dashboard</a></li>
        <li><a href="<?= BASEURL; ?>/gscholar">Google Schoolar</a></li>
        <li><a href="<?= BASEURL; ?>/wos">Web of Science</a></li>
        <li><a href="<?= BASEURL; ?>/scopus">Scopus</a></li>
        <li><a href="<?= BASEURL; ?>/logout">Logout</a></li>
      </ul>
    </div>
  </div>
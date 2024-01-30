<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
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
    </style>

</head>

<!-- views/login/index.php -->

<body class="flex flex-col min-h-screen">
    <div class="py-16 my-auto">
        <div class="flex bg-white rounded-lg shadow-lg py-10 overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 lg:h-1/2 bg-cover">
                <img src="<?php echo BASEURL; ?>/img/logo_unikom_kuning.png" class=" w-64 mx-auto">
            </div>
            <div class="w-full px-8 my-auto lg:w-1/2">
                <h2 class="text-2xl font-semibold text-gray-700 text-center">Sistem Publikasi UNIKOM</h2>

                <?php if (isset($data['error'])) : ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo $data['error']; ?></p>
                <?php endif; ?>

                <form action="<?php echo BASEURL; ?>/login" method="post">
                    <div class="mt-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input id="username" type="text" name="username" placeholder="username" class="input input-bordered w-full" />
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <a href="#" class="text-xs text-gray-500">Lupa password?</a>
                        </div>
                        <input id="password" type="password" name="password" placeholder="password" class="input input-bordered w-full" />
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>
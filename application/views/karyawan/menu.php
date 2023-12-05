<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>

    <link href="<?php echo base_url('asset/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?php echo base_url('asset/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/style-custom.css') ?>">
</head>

<body>
    <div class="container-fluid">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <h1 class="h4 navbar-brand">Teh.Kita</h1>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/landing') ?>" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/menu') ?>" class="nav-link">Ubah Data Menu</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/datajual') ?>" class="nav-link">Pendapatan Hari Ini</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('asset/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
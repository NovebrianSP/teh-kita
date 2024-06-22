<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRASI</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css') ?>">

    <style>
        .navbar-brand img {
            background-color: #fff;
            padding: 5px;
            border-radius: 50%;
        }

        .bg-custom {
            background-color: #79AC78;
        }

        body {
            background-image: url('<?php echo base_url('asset/images/bg_gray.jpg') ?>');
            background-size: cover;
        }

        .heading-custom {
            padding-top: 1rem;
        }
    </style>
</head>

<body class="container-fluid d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-custom row">
        <div class="container-fluid">
            <a class="navbar-brand disabled-link">
                <img src="<?php echo base_url('asset/images/teh_kita.png') ?>" alt="logo" width="50" height="50">
                Teh.Kita
            </a>
    </nav>

    <div class="main">
        <div class="container mt-4">
            <h2 class="text-center">Tambah Data Pelanggan</h2>

            <form action="<?php echo site_url('Tehkita/tambah_aksi2') ?>" method="post">
                <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin'); ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>


    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
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

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Tehkita/logout'); ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main">
        <div class="container mt-4">
            <h2>Data Karyawan</h2>
            <table class="table">
                <a href="<?php echo site_url('Tehkita/tambah_karyawan') ?>" class="btn btn-sm btn-outline-success">Tambah Karyawan</a>
                <thead>
                    <tr>
                        <th>ID Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Email</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_karyawan as $karyawan) : ?>
                        <tr>
                            <td><?php echo $karyawan['kode_karyawan']; ?></td>
                            <td><?php echo $karyawan['nama_karyawan']; ?></td>
                            <td><?php echo $karyawan['email']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Tehkita/edit_karyawan/' . $karyawan['kode_karyawan']) ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo site_url('Tehkita/hapus_karyawan/' . $karyawan['kode_karyawan']) ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Data Pelanggan</h2>
            <a href="<?php echo site_url('Tehkita/tambah_pelanggan') ?>" class="btn btn-sm btn-outline-success">Tambah Pelanggan</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pelanggan as $pelanggan) : ?>
                        <tr>
                            <td><?php echo $pelanggan['id_pelanggan']; ?></td>
                            <td><?php echo $pelanggan['nama_pelanggan']; ?></td>
                            <td><?php echo $pelanggan['email_pelanggan']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Tehkita/edit_pelanggan/' . $pelanggan['id_pelanggan']) ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo site_url('Tehkita/hapus_pelanggan/' . $pelanggan['id_pelanggan']) ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
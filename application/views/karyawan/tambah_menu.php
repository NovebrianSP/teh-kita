<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

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
    </style>
</head>

<body class="container-fluid d-flex flex-column min-vh-100">
    <?php
    $menu = $this->db->query("select * from menu")->result_array();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom row">
        <div class="container-fluid">
            <a class="navbar-brand disabled-link">
                <img src="<?php echo base_url('asset/images/teh_kita.png') ?>" alt="logo" width="50" height="50">
                Teh.Kita
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/landing') ?>" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/menu') ?>" class="nav-link">Ubah Data Menu</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/datajual') ?>" class="nav-link">Pendapatan</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Tehkita/logout'); ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-7">
            <div class="card border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <center>
                            <h3>TAMBAH MENU</h3>
                        </center>
                        <div class="row mb-4">
                            <form action="<?php echo site_url('Tehkita/aksi_tambah') ?>" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3 ">
                                    <span style="margin-left: 1cm;" class="input-group-text" id="inputGroup-sizing-default">Nama Menu</span>
                                    <input type="text" class="form-control" name="nama_menu">
                                </div>

                                <div class="input-group mb-3 ">
                                    <span style="margin-left: 1cm;" class="input-group-text" id="inputGroup-sizing-default">Harga Menu</span>
                                    <span class="input-group-text" id="inputGroup-sizing-default">Rp</span>
                                    <input type="text" class="form-control" name="harga_menu">
                                </div>

                                <div class="input-group mb-3 ">
                                    <span style="margin-left: 1cm;" class="input-group-text">Kategori Makanan</span>
                                    <select class="form-select" name="kategori">
                                        <option selected>Pilih Kategori</option>
                                        <option value="Food">Food</option>
                                        <option value="Beverages">Beverages</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <span style="margin-left: 1cm;" class="input-group-text">Foto Menu</span>
                                    <input type="file" name="foto" class="form-control">
                                </div>

                                <div class="d-grid gap-2" style="margin-left: 5cm; margin-right: 5cm;">
                                    <input type="submit" value="Submit" class="btn btn-outline-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
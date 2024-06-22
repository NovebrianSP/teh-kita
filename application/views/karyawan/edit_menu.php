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

        .img {
            width: 4cm;
            /* Tentukan ukuran yang diinginkan */
            height: 4cm;
            /* Tentukan ukuran yang diinginkan */
            object-fit: cover;
            /* Menyesuaikan gambar ke area yang ditentukan tanpa mengubah aspek rasio */
            object-position: center;
            /* Menyesuaikan posisi gambar */
        }

        .tabel {
            padding-bottom: 3cm;
            padding-left: 3cm;
            padding-right: 3cm;
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

    <div class="main container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0 my-5">
                    <div class="card-body p-0">
                        <center>
                            <h3>SUNTING MENU</h3>
                        </center>

                        <form method="post" action="<?php echo site_url('Tehkita/aksi_edit') ?>" class="form-control" enctype="multipart/form-data">
                            <input type="hidden" name="idMenu" value="<?php echo $menu['id_menu'] ?>">
                            <label for="menu" class="form-label">ID Menu</label>
                            <input type="text" disabled id="menu" class="form-control" value="<?php echo $menu['id_menu'] ?>">

                            <br>
                            <label for="namaMenu" class="form-label">Nama Menu</label>
                            <input class="form-control" type="text" name="namaMenu" id="namaMenu" value="<?php echo $menu['nama_menu'] ?>">

                            <br>
                            <label for="hargaMenu" class="form-label">Harga Menu</label>
                            <input type="text" name="hargaMenu" id="hargaMenu" class="form-control" value="<?php echo $menu['harga_menu'] ?>">

                            <br>
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option value="Beverages" <?php echo ($menu['kategori'] == 'Beverages') ? 'selected' : '' ?>>Beverages</option>
                                <option value="Food" <?php echo ($menu['kategori'] == 'Food') ? 'selected' : '' ?>>Food</option>
                            </select>

                            <br>
                            <label for="fotoMenu">Upload Foto Menu Baru</label>
                            <input type="file" name="fotoMenu" id="fotoMenu" class="form-control">

                            <br>
                            <center>
                                <input type="submit" value="UPLOAD" class="btn btn-outline-success">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
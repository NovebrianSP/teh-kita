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

    <div class="main">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <center>
                                <a class="btn btn-primary mt-4" href="<?php echo base_url('Tehkita/tambah_menu') ?>">Tambahkan Menu</a>
                            </center>
                        </div>

                        <div class="tabel row mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Menu</th>
                                        <th scope="col" class="text-center">Kategori</th>
                                        <th scope="col" class="text-center">Manage</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                foreach ($menu as $row) { ?>

                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $no ?></th>
                                            <td style="max-width: 10cm;">
                                                <div class="card shadow mb-3" style="max-width: 8cm;">
                                                    <div class="row g-0">
                                                        <div class="col-sm-6">
                                                            <img class="img img-fluid rounded" src="<?php echo base_url('./asset/upload/' . $row['foto_menu']) ?>">
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="card-body">
                                                                <div class="card-title text-start"><?php echo $row['nama_menu'] ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mt-5 text-center"><?php echo $row['kategori'] ?></p>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <form class="col-6 d-grid gap-2" action="<?php echo site_url('Tehkita/editMenu/'.$row['id_menu']) ?>">
                                                        <input class="btn btn-info btn-user btn-block mt-5" type="submit" value="Edit Menu">
                                                    </form>

                                                    <div class="col-6 d-grid gap-2">
                                                        <a href="<?php echo base_url('Tehkita/hapusMenu/'.$row['id_menu']) ?>" class="btn btn-warning btn-block mt-5">Hapus Menu</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php $no++;
                                }
                                ?>
                            </table>
                        </div>

                        <!-- <div class="row mt-4">
                            <?php
                            $counter = 0;
                            $no = 1;
                            foreach ($menu as $kolom) {
                                if ($counter % 2 == 0) {
                            ?>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <center>
                                                <h4><?php echo $no . '. ' . $kolom['nama_menu'] ?></h4>
                                                <h5>Harga Menu : Rp.<?php echo $kolom['harga_menu'] ?></h5>
                                                <img src="<?php echo base_url('./asset/upload/' . $kolom['foto_menu']) ?>" class="img rounded img-fluid">
                                                <p class="indent">Kategori Menu : <?php echo $kolom['kategori'] ?></p>

                                                <div class="row">
                                                    <form class="col-6 d-grid gap-2" action="<?php echo site_url('Tehkita/' . $kolom['nama_menu']) ?>">
                                                        <input class="btn btn-info btn-user btn-block" type="submit" value="Edit Menu">
                                                    </form>

                                                    <div class="col-6 d-grid gap-2">
                                                        <a href="<?php echo base_url('Tehkita/hapusMenu/' . $kolom['id_menu']) ?>" class="btn btn-warning btn-block">Hapus Menu</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                <?php } else {
                                ?>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <center>
                                                <h4><?php echo $no . '. ' . $kolom['nama_menu'] ?></h4>
                                                <h5>Harga Menu : Rp.<?php echo $kolom['harga_menu'] ?></h5>
                                                <img src="<?php echo base_url('./asset/upload/' . $kolom['foto_menu']) ?>" class="img img-fluid rounded">
                                                <p class="indent">Kategori Menu : <?php echo $kolom['kategori'] ?></p>

                                                <div class="row">
                                                    <form class="col-6 d-grid gap-2" action="<?php echo site_url('Tehkita/' . $kolom['nama_menu']) ?>">
                                                        <input class="btn btn-info btn-user btn-block" type="submit" value="Edit Menu">
                                                    </form>

                                                    <div class="col-6 d-grid gap-2">
                                                        <a href="<?php echo site_url('Tehkita/hapusMenu/' . $kolom['id_menu']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-warning btn-block">Hapus Menu</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                            <?php }
                                $counter++;
                                $no++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

                        <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
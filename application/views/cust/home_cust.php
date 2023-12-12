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

<body>
    <?php
    $menu = $this->db->query("select * from menu")->result_array();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand disabled-link">
                <img src="<?php echo base_url('asset/images/teh_kita.png') ?>" alt="logo" width="50" height="50">
                Teh.Kita
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="<?php echo site_url('') ?>" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('') ?>" class="nav-link">Ubah Data Menu</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('') ?>" class="nav-link">Pendapatan Hari Ini</a>
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
        <div class="container-fluid">
            <h1 class="text-center">Katalog Menu Kami</h1>

            <div class="row">
                <?php
                $counter = 0;
                $no = 1;
                foreach ($menu as $row) {
                    if ($counter % 2 == 0) { ?>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <center>
                                    <h4><?php echo $no . '. ' . $row['nama_menu'] ?></h4>
                                    <img src="<?php base_url('asset/upload/'.$row['foto_menu']) ?>" alt="" class="thumbnail">
                                    <h5>Harga per porsi : <?php echo $row['harga_menu'] ?></h5>
                                    <p class="indent">Kategori : <?php echo $row['kategori'] ?></p>

                                    <div class="row">
                                        <form class="col-6" action="<?php echo site_url('Tehkita/' . $row['id_pesanan']) ?>">
                                            <input class="btn btn-success btn-user btn-block" type="submit" value="Terima Pesanan">
                                        </form>

                                        <form class="col-6" action="<?php echo site_url('Tehkita/tolak_pesanan' . $row['id_pesanan']) ?>">
                                            <input class="btn btn-danger btn-user btn-block" type="submit" value="Tolak Pesanan">
                                        </form>
                                    </div>
                                </center>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <center>
                                    <h4><?php echo $no . '. ' . $row['nama_menu'] ?></h4>
                                    <h5>Jumlah Pesanan : <?php echo $row['jumlah'] ?></h5>
                                    <p class="indent">Tanggal Pesanan : <?php echo $row['waktu'] . " atas nama " . $row['nama_pelanggan'] ?></p>

                                    <div class="row">
                                        <form class="col-6" action="<?php echo site_url('Tehkita/' . $row['id_pesanan']) ?>">
                                            <input class="btn btn-success btn-user btn-block" type="submit" value="Terima Pesanan">
                                        </form>

                                        <form class="col-6" action="<?php echo site_url('Tehkita/tolak_pesanan/' . $row['id_pesanan']) ?>">
                                            <input class="btn btn-danger btn-user btn-block" type="submit" value="Tolak Pesanan">
                                        </form>
                                    </div>
                                </center>
                            </div>
                        </div>
                <?php }
                    $counter++;
                    $no++;
                } ?>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
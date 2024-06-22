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
                        <a href="<?php echo site_url('Tehkita/customer') ?>" class="nav-link">Pesan Menu</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('Tehkita/history_customer') ?>" class="nav-link">History Pemesanan Kamu</a>
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
            <h2>History Pemesanan Kamu</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu Pesanan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Pesanan</th>
                        <th scope="col">Total Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mendapatkan ID pelanggan dari session
                    $id_pelanggan = $this->session->userdata('id_pelanggan');

                    // Ambil data history pemesanan dari database menggunakan model yang sesuai
                    $history_pemesanan = $this->db->query("SELECT hp.id_menu, hp.jumlah, hp.tgl_pesanan, hp.harga_total, m.nama_menu 
                                                            FROM history_pemesanan hp 
                                                            INNER JOIN menu m ON hp.id_menu = m.id_menu 
                                                            WHERE hp.id_pelanggan = '$id_pelanggan'")->result_array();
                    $no = 1;
                    foreach ($history_pemesanan as $pesanan) { ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo $pesanan['nama_menu']; ?></td>
                            <td><?php echo $pesanan['jumlah']; ?></td>
                            <td><?php echo $pesanan['tgl_pesanan']; ?></td>
                            <td><?php echo $pesanan['harga_total'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
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
            <h1 class="text-center">Katalog Menu Kami</h1>

            <?php
            $menu_beverages = array_filter($menu, function ($row) {
                return $row['kategori'] === 'Beverages';
            });

            $menu_food = array_filter($menu, function ($row) {
                return $row['kategori'] === 'Food';
            });
            ?>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h3 class="text-center">Beverages</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Pemesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($menu_beverages as $key => $beverage) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $no + 1; ?></th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('asset/upload/' . $beverage['foto_menu']); ?>" alt="<?php echo $beverage['nama_menu']; ?>" width="50" height="50" class="me-2">
                                                <?php echo $beverage['nama_menu']; ?>
                                            </div>
                                        </td>
                                        <td><?php echo $beverage['kategori']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm pesan-menu" data-id="<?php echo $beverage['id_menu']; ?>" data-nama="<?php echo $beverage['nama_menu']; ?>">Pesan Disini</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="text-center">Food</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Pemesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($menu_food as $key => $food) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $no + 1; ?></th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('asset/upload/' . $food['foto_menu']); ?>" alt="<?php echo $food['nama_menu']; ?>" width="50" height="50" class="me-2">
                                                <?php echo $food['nama_menu']; ?>
                                            </div>
                                        </td>
                                        <td><?php echo $food['kategori']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm pesan-menu" data-id="<?php echo $food['id_menu']; ?>" data-nama="<?php echo $food['nama_menu']; ?>">Pesan Disini</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
    <script>
        // Fungsi untuk menampilkan pop-up konfirmasi jumlah pesanan dengan nama menu
        document.addEventListener("DOMContentLoaded", function() {
            const pesanMenuButtons = document.querySelectorAll('.pesan-menu');

            pesanMenuButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const idMenu = this.getAttribute('data-id');
                    const namaMenu = this.getAttribute('data-nama');
                    const jumlahPesanan = prompt(`Masukkan jumlah pesanan untuk ${namaMenu}:`, '1');

                    if (jumlahPesanan != null && jumlahPesanan > 0) {
                        window.location.href = "<?php echo site_url('Tehkita/pesan_menu/'); ?>" + idMenu + '/' + jumlahPesanan;
                    }
                });
            });
        });
    </script>
</body>

</html>
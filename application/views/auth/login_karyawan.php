<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?php echo base_url('asset/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/login-custom.css') ?>">

    <style>
        .img {
            width: 475px;
            padding-left: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .button-custom-2 {
            background: #79AC78;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            /* Adding transition for smooth hover effect */
        }

        .button-custom-2:hover {
            background-color: #618e60;
            /* Change the background color on hover */
            color: white;
        }
    </style>
</head>

<body class="bg-gradient-custom-1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <img class="img" src="<?php echo base_url('asset/images/Team.jpg') ?>">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <br><br><br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>

                                    <form action="<?php echo site_url('Tehkita/aksi_login1') ?>" class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Masukkan alamat email anda">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Login" class="btn btn-user btn-success btn-block">
                                        </div>
                                    </form>

                                    <div class="text-center">
                                        <p>Bukan Karyawan ?<br>
                                            <a href="<?php echo base_url('Tehkita/index') ?>" class="small">Silahkan Login Sebagai Customer Kami</a>
                                        </p>
                                        <a href="<?php echo base_url('Tehkita/admin') ?>" class="small">Khusus Admin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('asset/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
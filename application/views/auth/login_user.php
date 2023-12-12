<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css') ?>">
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #79AC78;

            /* Chrome 10-25, Safari 5.1-6 */
            /* background: -webkit-linear-gradient(to right,
                    #f0ff42,
                    #82cd47,
                    #54b435,
                    #379237); */

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* background: linear-gradient(to right, #f0ff42, #82cd47, #54b435, #379237); */
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        body {
            @media (min-width: 991.98px) {
                main {
                    padding-left: 240px;
                }
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: 0.3rem;
                border-bottom-right-radius: 0.3rem;
            }
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        .media {
            width: 100px;
            padding-bottom: 50px;
        }

        .bg-gradient-custom-1 {
            background-color: #79AC78;
            background-image: linear-gradient(180deg, #79AC78 20%, #B0D9B1 75%);
            background-size: cover;
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

<body class="d-flex flex-column min-vh-100 bg-gradient-custom-1">

    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="<?php echo base_url('asset/images/teh_kita.png') ?>" class="media" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Teh.Kita</h4>
                                    </div>

                                    <form action="<?php echo site_url('Tehkita/aksi_login2') ?>" method="POST">
                                        <p class="text-center">Kamu Member ? <br> Silahkan Login Dulu Ya Kak</p>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" class="form-control" placeholder="Email Kamu">
                                        </div>

                                        <div class="d-grid gap-2">
                                            <input type="submit" value="SUBMIT" class="btn button-custom-2 mb-3">
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <p>Kamu Karyawan Kami ? <br>
                                            <a href="<?php echo base_url('Tehkita/karyawan') ?>">Silahkan Login Disini</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-dark px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 text-center text-white">TENTANG TEH.KITA</h4>
                                    <p class="small mb-0 text-white">
                                        Website dari usaha Teh.Kita dimana kakak-kakak sekalian dapat memesan menu-menu
                                        food & beverages dari kami. Kami menggunakan fitur membership untuk mencatat pesanan yang telah
                                        kalian pesan saat berkunjung kemari, namun kami tidak memungut sepeserpun untuk biaya membership.
                                        Kami juga menyediakan akses untuk guest juga.
                                    </p>
                                    <br>
                                    <p class="text-center small text-white">
                                        Selamat Menikmati Layanan Dari Kami ! :)
                                    </p>
                                    <div class="text-center text-white">
                                        <p>Kamu juga bisa login sebagai guest tanpa mendaftar <br>
                                            <a class="btn btn-outline-dark d-grid gap-2" href="<?php echo site_url('Tehkita/guest') ?>">Cukup klik disini saja !</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo base_url('asset/js/bootstrap.js') ?>"></script>
</body>

</html>
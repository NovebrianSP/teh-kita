<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang !!</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <link rel="stylesheet" href="asset/css/login-custom.css">
</head>

<body class="bg-gradient-custom-1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <img src="asset/images/teh_kita.png" class="img-thumbnail" style="width: 30rem;" alt="Logo Teh.Kita">
                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4">Selamat Datang</h1>

                                        <form action="<?php echo site_url('Tehkita/') ?>" class="user" method="post">
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Silahkan Masukkan Email Yang Telah Terdaftar"
                                                class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
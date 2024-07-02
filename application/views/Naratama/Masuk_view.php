<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="bootslander/img/rsu.ico" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="bootslander/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="bootslander/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            <div class="col-lg-12">

                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="bootslander/img/rsu.png" width="120" height="100" class="" alt="">
                                        <h1 class="h4 text-gray-900 mb-4">Login Disini !</h1>
                                    </div>
                                    <form class="text-center text-danger" method="POST"
                                        action="<?php echo site_url('masuk/autentikasi'); ?>">
                                        <div class="form-group">
                                            <label for="exampleInputName" class="sr-only">Name</label>
                                            <div class="position-relative has-icon-right">
                                                <input type="text" name="username" id="exampleInputName"
                                                    autocomplete="off" class="form-control input-shadow"
                                                    placeholder="Masukkan Username">
                                                <div class="form-control-position">
                                                    <i class="icon-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password" class="sr-only">Password</label>
                                            <div class="position-relative has-icon-right">
                                                <input type="password" name="pass" id="Password"
                                                    class="form-control input-shadow" placeholder="Masukkan Password">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login </button>
                                        <div class="text-center">
                                            <?php echo $this->session->flashdata('msg'); ?>

                                            <?php if ($this->session->flashdata('success_message')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo $this->session->flashdata('success_message'); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url(); ?>Dregister">Buat Akun</a>

                                    </div>
                                    <div class="text-center">

                                        <a class="small" href="<?= base_url(); ?>Utama">Beranda</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="bootslander/vendor/jquery/jquery.min.js"></script>
    <script src="bootslander/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="bootslander/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="bootslander/js/sb-admin-2.min.js"></script>

</body>

</html>
<div class="flashdata_username_ada" data-flashdata="<?= $this->session->flashdata('username_telah_ada'); ?>"></div>
<?php if ($this->session->flashdata('username_telah_ada')): ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Favicons -->
    <link href="bootslander/img/rsu.ico" rel="icon">
    <link href="bootslander/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="bootslander/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="bootslander/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">


                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                    </div>

                                    <form action="<?php echo base_url() ?>Dregister/register" method="post"
                                        class="user">

                                        <div class="form-group">
                                            <p>Nomor KTP / Paspor</p>
                                            <input type="text" pattern="\d*" minlength="16" maxlength="16"
                                                value="<?= $this->session->flashdata('ktp') ?>" class="form-control"
                                                autocomplete="off" name="ktp" required>

                                        </div>
                                        <div class="form-group">
                                            <p>Nama Lengkap</p>
                                            <input type="text" class="form-control" autocomplete="off" name="user_name"
                                                value="<?= $this->session->flashdata('user_name') ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Email</p>
                                            <input type="email" class="form-control" autocomplete="off" name="email"
                                                value="<?= $this->session->flashdata('email_pelanggan') ?>" required>

                                        </div>
                                        <div class="form-group">
                                            <p>Nomor Hp</p>
                                            <input type="text" pattern="\d*" minlength="8" maxlength="14"
                                                class="form-control" autocomplete="off" name="hp"
                                                value="<?= $this->session->flashdata('hp') ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Username</p>
                                            <input type="text" minlength="6" class="form-control" autocomplete="off" name="username"
                                                value="<?= $this->session->flashdata('username') ?>" required>

                                        </div>
                                        <div class="form-group">
                                            <p>Password</p>
                                            <input type="password" minlength="6" class="form-control "
                                                name="user_password" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control " name="level" required
                                                value="pengunjung">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control " name="user_status" required
                                                value="1">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Simpan
                                        </button>
                                        <hr>

                                    </form>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url(); ?>utama">Beranda</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<script src="<?= base_url('bootslander/js/vendor.min.js'); ?>"></script>
<script src="<?= base_url('bootslander/js/select2.min.js'); ?>"></script>
<!-- JS Front -->
<script src="<?= base_url('bootslander/js/theme.min.js'); ?>"></script>
<!-- JS Plugins Init. -->
<script src="<?= base_url(); ?>bootslander/js/sweetalert.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('bootslander/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('bootslander/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('bootslander/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('bootslander/js/sb-admin-2.min.js') ?>"></script>

<script>
    const flashData = $('.flashdata_username_ada').data('flashdata');

    if (flashData) {
        swal({
            title: 'Whoopz!',
            text: flashData,
            icon: 'error'
        });
    }
</script>
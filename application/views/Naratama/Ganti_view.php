<div class="flashdata_terserah_berhasil" data-flashdata="<?= $this->session->flashdata('isi_terserah_berhasil'); ?>">
</div>
<?php if ($this->session->flashdata('isi_terserah_berhasil')): ?>
<?php endif; ?>
<div class="flashdata_terserah_gagal" data-flashdata="<?= $this->session->flashdata('isi_terserah_gagal'); ?>"></div>
<?php if ($this->session->flashdata('isi_terserah_gagal')): ?>
<?php endif; ?>

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
                                        <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
                                    </div>


                                    <form method="post" action="Ganti/aksi">
                                        <!-- Form Group -->
                                        <div class="input-group input-group-merge">
                                            <input type="password" required class="form-control form-control-user"
                                                minlength="6" name="passbaru" id="password" placeholder="Password Baru">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye-slash" id="togglePassword"></i>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-small text-danger">
                                            <?php echo form_error('passbaru'); ?>
                                        </div>

                                        <div class="input-group input-group-merge">
                                            <input type="password" required class="form-control form-control-user"
                                                minlength="6" name="ulangpass" id="password1"
                                                placeholder="Ulangi Password Baru">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye-slash" id="togglePassword1"></i>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-small text-danger">
                                            <?php echo form_error('ulangpass'); ?>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-user btn-block">Change Password
                                        </button>
                                        <br>
                                    </form>
                                    <div class="text-center">
                                        <!-- <a class="btn btn-dark btn-user btn-block" href="<?= base_url(); ?>admin"><b>Back</b></a> -->
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

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa fa-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });

    const togglePassword1 = document.querySelector("#togglePassword1");
    const password1 = document.querySelector("#password1");

    togglePassword1.addEventListener("click", function () {
        // toggle the type attribute
        const type = password1.getAttribute("type") === "password" ? "text" : "password";
        password1.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa fa-eye");
    });

    // prevent form submit
    const form1 = document.querySelector("form");
    form1.addEventListener('submit', function (e) {
        e.preventDefault();
    });
</script>
<div class="flash-data-sukses" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
<?php if ($this->session->flashdata('sukses')): ?>
<?php endif; ?>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
<?php if ($this->session->flashdata('gagal')): ?>
<?php endif; ?>
<div class="flashdata_terserah_gagal" data-flashdata="<?= $this->session->flashdata('isi_terserah_gagal'); ?>"></div>
<?php if ($this->session->flashdata('isi_terserah_gagal')): ?>
<?php endif; ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800"><b>
                <?php echo $title ?>
            </b> </h5>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <marquee scrolldelay="100"> Informasi Hak Akses Sistem </marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">

                <a href="javascript:;" data-toggle="modal" data-target="#AddPenggunModal"
                    class="btn btn-primary mb-2 ml-auto "> <i class="fa fa-plus"></i>Tambah Data</a>
                <a href="<?= base_url(); ?>DaftarPengguna" class="btn btn-success mb-2 ml-2 "> <i
                        class="fa fa-refresh"></i>refresh</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No KTP</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>username</th>
                            <th>Otoritas </th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $u) {
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $u->ktp ?>
                                </td>
                                <td>
                                    <?= $u->user_name ?>
                                </td>
                                <td>
                                    <?= $u->email_pelanggan ?>
                                </td>
                                <td>
                                    <?= $u->hp ?>
                                </td>
                                <td>
                                    <?= $u->username ?>
                                </td>
                                <td>
                                    <?= $u->level ?>
                                </td>

                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#EditPenggunaModal<?= $u->id; ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a class="sweetalert" href="<?= base_url('DaftarPengguna/hapus') . '/' . $u->id ?>">
                                        <span class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></span></a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal-->
<div class="modal fade" id="AddPenggunModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('DaftarPengguna/register') ?>" method="post" class="user">
                    <div class="form-group">
                        <p>Nomor KTP / Paspor</p>
                        <input type="text" pattern="\d*" minlength="16" maxlength="16"
                            value="<?= $this->session->flashdata('ktp') ?>" class="form-control" autocomplete="off"
                            name="ktp" required>

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
                        <input type="text" pattern="\d*" minlength="8" maxlength="14" class="form-control"
                            autocomplete="off" name="hp" value="<?= $this->session->flashdata('hp') ?>" required>
                    </div>
                    <div class="form-group">
                        <p>Username</p>
                        <input type="text" minlength="6" class="form-control" autocomplete="off" name="username"
                            value="<?= $this->session->flashdata('username') ?>" required>
                    </div>
                    <div class="form-group">
                        <p>Password</p>
                        <input type="password" minlength="6" class="form-control " name="user_password" required>
                    </div>
                    <div class="form-group">
                        <p>Hak Akses</p>
                        <select class="form-control" name="level" required>
                            <option selected="option" disabled="selected" value="">--pilih akses--
                            </option>
                            <option value="administrator" <?= ($this->session->flashdata('level') == 'administrator') ? 'selected' : '' ?>>Administrator</option>
                            <option value="kepala rm" <?= ($this->session->flashdata('level') == 'kepala rm') ? 'selected' : '' ?>>Kepala RM</option>
                            <option value="petugas" <?= ($this->session->flashdata('level') == 'petugas') ? 'selected' : '' ?>>Petugas</option>
                            <option value="pengunjung" <?= ($this->session->flashdata('level') == 'pengunjung') ? 'selected' : '' ?>>Pengunjung</option>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <input type="hidden" class="form-control " name="user_status" required value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> Simpan</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal-->
<?php foreach ($pengguna as $edit) { ?>
    <div class="modal fade" id="EditPenggunaModal<?= $edit->id ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('DaftarPengguna/update') ?>" method="post" class="user">
                        <div class="form-group" hidden>
                            <p>ID Dokter</p>
                            <input class="form-control" hidden readonly autocomplete="off" name="id"
                                value="<?= $edit->id ?>">
                        </div>
                        <div class="form-group">
                            <p>Nomor KTP / Paspor</p>
                            <input type="text" pattern="\d*" minlength="16" maxlength="16" value="<?= $edit->ktp ?>"
                                class="form-control" autocomplete="off" name="ktp" required>
                        </div>
                        <div class="form-group">
                            <p>Nama Lengkap</p>
                            <input type="text" class="form-control" autocomplete="off" name="user_name"
                                value="<?= $edit->user_name ?>" required>
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="email" class="form-control" autocomplete="off" name="email"
                                value="<?= $edit->email_pelanggan ?>" required>

                        </div>
                        <div class="form-group">
                            <p>Nomor Hp</p>
                            <input type="text" pattern="\d*" minlength="8" maxlength="14" class="form-control"
                                autocomplete="off" name="hp" value="<?= $edit->hp ?>" required>
                        </div>
                        <div class="form-group">
                            <p>Username</p>
                            <input type="text" minlength="6" class="form-control" autocomplete="off" name="username"
                                value="<?= $edit->username ?>" required>
                        </div>
                        <div class="form-group">
                            <p>Hak Akses</p>
                            <select class="form-control" name="level" required>
                                <option selected="option" disabled="selected" value="">--pilih akses--
                                </option>
                                <option value="administrator" <?= ($edit->level == 'administrator') ? 'selected' : '' ?>>
                                    Administrator</option>
                                <option value="kepala rm" <?= ($edit->level == 'kepala rm') ? 'selected' : '' ?>>Kepala RM
                                </option>
                                <option value="petugas" <?= ($edit->level == 'petugas') ? 'selected' : '' ?>>Petugas</option>
                                <option value="pengunjung" <?= ($edit->level == 'pengunjung') ? 'selected' : '' ?>>Pengunjung
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
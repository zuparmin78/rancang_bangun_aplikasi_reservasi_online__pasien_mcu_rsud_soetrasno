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
                <?= $title ?>
            </b> </h5>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <marquee scrolldelay="100"> Informasi Data Dokter</marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">

                <a href="javascript:;" data-toggle="modal" data-target="#AddDokterModal"
                    class="btn btn-primary mb-2 ml-auto "> <i class="fa fa-plus"></i>Tambah
                    Data</a>
                <a href="DaftarDokter" class="btn btn-success mb-2 ml-2 "> <i class="fa fa-refresh"></i>Refresh</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor NIP</th>
                            <th>Nama Dokter</th>
                            <th>Staf Medis Fungsional (SMF)</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dokter as $u) {
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $u->kodedokter ?>
                                </td>
                                <!-- <td class="table-column-pl-0">
                                    <a class="d-flex align-items-center">
                                        <div class="avatar avatar-circle">
                                            <img class="avatar-img" src=" $init->base_url('assets/img/foto_user/' . $s->foto) " alt="Image Description">
                                        </div>
                                        <div class="ml-3">
                                            <span class="d-block h5 text-hover-primary mb-0"> $s->nmpetugas; 
                                            </span>
                                        </div>
                                    </a>
                                </td> -->
                                <td class="d-flex align-items-center">
                                    <!-- <a class="d-flex align-items-center"> -->
                                    <div class="avatar avatar-circle">
                                        <img class="avatar-img" src="bootslander/img/doctors/<?= $u->foto_dokter ?>"
                                            alt="Image Description">
                                    </div>
                                    <div class="ml-3">
                                        <?= $u->namadokter ?>
                                    </div>
                                    <!-- </a> -->
                                </td>
                                <td>
                                    <?= $u->spesialis ?>
                                </td>

                                <td class="text-center">
                                    <?php if ($u->dokter_active === '1') { ?>
                                        <a class="dokter_off"
                                            href="<?= base_url('DaftarDokter/nonactive_dokter') . '/' . $u->id_dokter ?>">
                                            <span class="btn btn-secondary btn-sm "><i class="fa fa-times"></i></span></a>
                                    <?php } else { ?>
                                        <a class="dokter_on"
                                            href="<?= base_url('DaftarDokter/active_dokter') . '/' . $u->id_dokter ?>">
                                            <span class="btn btn-primary btn-sm "><i class="fa fa-check"></i></span></a>
                                    <?php } ?>
                                    <a data-toggle="modal" data-target="#EditDokterModal<?= $u->id_dokter; ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a class="sweetalert"
                                        href="<?= base_url('DaftarDokter/hapus') . '/' . $u->id_dokter ?>">
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
<div class="modal fade" id="AddDokterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('DaftarDokter/register') ?>" enctype="multipart/form-data" method="post"
                    class="user">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Foto<i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                data-placement="top"></i></label>

                        <div class="col-sm-9">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="avatarImg" class="avatar-img" src="bootslander/img/doctors/default.jpg"
                                        alt="Image Description">

                                    <input type="file" name="foto" class="js-file-attach avatar-uploader-input"
                                        id="avatarUploader" data-hs-file-attach-options="{
                                      &quot;textTarget&quot;: &quot;#avatarImg&quot;,
                                      &quot;mode&quot;: &quot;image&quot;,
                                      &quot;targetAttr&quot;: &quot;src&quot;
                                   }">


                                    <span class="avatar-uploader-trigger">
                                        <i class="fa fa-pencil avatar-uploader-icon shadow"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <div class="form-group">
                        <p>NIP Dokter</p>
                        <input type="text" minlength="18" maxlength="18" pattern="\d*" class="form-control"
                            name="kodedokter" autocomplete="off" required placeholder="2132****">
                    </div>

                    <div class="form-group">
                        <p>Nama Lengkap Dokter</p>
                        <input type="text" class="form-control" name="namadokter" autocomplete="off" required
                            placeholder="Jonh***">
                    </div>

                    <div class="form-group">
                        <p>Spesialisasi</p>
                        <input type="text" class="form-control " name="spesialis" autocomplete="off" required
                            placeholder="Sepesialis **** ">
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
<?php foreach ($dokter as $edit) { ?>
    <div class="modal fade" id="EditDokterModal<?= $edit->id_dokter ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Dokter</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('DaftarDokter/update') ?>" enctype="multipart/form-data" method="post"
                        class="user">
                        <div class="form-group" hidden>
                            <p>ID Dokter</p>
                            <input class="form-control" hidden readonly autocomplete="off" name="id"
                                value="<?= $edit->id_dokter ?>">
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label input-label">Foto<i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"></i></label>

                            <div class="col-sm-9">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5"
                                        for="<?= $edit->kodedokter ?>">
                                        <img id="<?= $edit->id_dokter ?>" class="avatar-img"
                                            src="bootslander/img/doctors/<?= $edit->foto_dokter ?>" alt="Image Description">

                                        <input type="file" name="foto"
                                            class="js-file-attach-<?= $edit->id_dokter ?> avatar-uploader-input"
                                            id="<?= $edit->kodedokter ?>" data-hs-file-attach-options="{
                                      &quot;textTarget&quot;: &quot;#<?= $edit->id_dokter ?>&quot;,
                                      &quot;mode&quot;: &quot;image&quot;,
                                      &quot;targetAttr&quot;: &quot;src&quot;
                                   }">
                                        <span class="avatar-uploader-trigger">
                                            <i class="fa fa-pencil avatar-uploader-icon shadow"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>NIP Dokter</p>
                            <input type="text" minlength="18" maxlength="18" pattern="\d*" autocomplete="off"
                                class="form-control" name="kodedokter" required value="<?= $edit->kodedokter ?>">
                        </div>
                        <div class="form-group">
                            <p>Nama Lengkap Dokter</p>
                            <input type="text" autocomplete="off" class="form-control" name="namadokter" required
                                value="<?= $edit->namadokter ?>">
                        </div>
                        <div class="form-group">
                            <p>Spesialisasi</p>
                            <input type="text" autocomplete="off" class="form-control " name="spesialis" required
                                value="<?= $edit->spesialis ?>">
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
    <script>
        $('.js-file-attach-<?= $edit->id_dokter ?>').each(function () {
            var customFile = new HSFileAttach($(this)).init();
        });
    </script>
<?php } ?>

<script>
    $('.js-file-attach').each(function () {
        var customFile = new HSFileAttach($(this)).init();
    });
</script>
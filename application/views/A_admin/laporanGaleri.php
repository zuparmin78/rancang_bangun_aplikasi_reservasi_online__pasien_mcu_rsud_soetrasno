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
            <marquee scrolldelay="100"> Informasi Data Galeri</marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">

                <a href="javascript:;" data-toggle="modal" data-target="#AddGaleriModal"
                    class="btn btn-primary mb-2 ml-auto "> <i class="fa fa-plus"></i>Tambah
                    Data</a>
                <a href="DaftarGaleri" class="btn btn-success mb-2 ml-2 "> <i class="fa fa-refresh"></i>Refresh</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Galeri</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($galeri as $u) {
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td class="d-flex align-items-center">
                                    <!-- <a class="d-flex align-items-center"> -->
                                    <div class="avatar avatar-circle">
                                        <img class="avatar-img" src="bootslander/img/gallery/<?= $u->nama_galeri ?>"
                                            alt="Image Description">
                                    </div>
                                    <div class="ml-3">
                                        <?= $u->nama_galeri ?>
                                    </div>
                                    <!-- </a> -->
                                </td>

                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#EditGaleriModal<?= $u->id_galeri; ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a class="sweetalert"
                                        href="<?= base_url('DaftarGaleri/hapus') . '/' . $u->id_galeri ?>">
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
<div class="modal fade" id="AddGaleriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('DaftarGaleri/register') ?>" method="post" enctype="multipart/form-data"
                    class="user">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Foto<i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                data-placement="top"></i></label>

                        <div class="col-sm-9">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="avatarImg" class="avatar-img" src="bootslander/img/pengguna/default.jpg"
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
<?php foreach ($galeri as $edit) { ?>
    <div class="modal fade" id="EditGaleriModal<?= $edit->id_galeri ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Galeri</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('DaftarGaleri/update') ?>" enctype="multipart/form-data" method="post"
                        class="user">
                        <div class="form-group" hidden>
                            <input class="form-control" hidden readonly autocomplete="off" name="id"
                                value="<?= $edit->id_galeri ?>">
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label input-label">Foto<i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"></i></label>

                            <div class="col-sm-9">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5"
                                        for="<?= $edit->nama_galeri ?>">
                                        <img id="<?= $edit->id_galeri ?>" class="avatar-img"
                                            src="bootslander/img/gallery/<?= $edit->nama_galeri ?>" alt="Image Description">

                                        <input type="file" name="foto"
                                            class="js-file-attach-<?= $edit->id_galeri ?> avatar-uploader-input"
                                            id="<?= $edit->nama_galeri ?>" data-hs-file-attach-options="{
                                      &quot;textTarget&quot;: &quot;#<?= $edit->id_galeri ?>&quot;,
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
        $('.js-file-attach-<?= $edit->id_galeri ?>').each(function () {
            var customFile = new HSFileAttach($(this)).init();
        });
    </script>
<?php } ?>

<script>
    $('.js-file-attach').each(function () {
        var customFile = new HSFileAttach($(this)).init();
    });
</script>
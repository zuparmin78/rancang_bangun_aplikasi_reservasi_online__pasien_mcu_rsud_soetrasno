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
            <marquee scrolldelay="100"> Informasi Data Paket MCU </marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <a href="javascript:;" data-toggle="modal" data-target="#AddPaketModal"
                    class="btn btn-primary mb-2 ml-auto "> <i class="fa fa-plus"></i>Tambah Data</a>
                <a href="DaftarPaket" class="btn btn-success mb-2 ml-2 "> <i class="fa fa-refresh"></i>refresh</a>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Paket</th>
                            <th>Nama Paket MCU</th>
                            <th>Harga Paket</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $no = 1;
                            foreach ($paket as $u) {
                                ?>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $u->kdpaket ?>
                                </td>
                                <td>
                                    <?= $u->namapaket ?>
                                </td>
                                <td>
                                    <?= 'Rp.' . number_format($u->hargaL, 0, ',', '.'); ?>
                                </td>
                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#EditPaketModal<?= $u->id_paket; ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a class="sweetalert" href="<?= base_url('DaftarPaket/hapus') . '/' . $u->id_paket ?>">
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
<div class="modal fade" id="AddPaketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('DaftarPaket/register') ?>" method="post" class="user">
                    <div class="form-group">
                        <p>Kode Paket</p>
                        <input type="text" class="form-control" name="kodepaket" autocomplete="off" required
                            placeholder="MCU0***">
                    </div>
                    <div class="form-group">
                        <p>Nama Paket MCU</p>
                        <input type="text" class="form-control" name="namapaket" autocomplete="off" required
                            placeholder="Mcu***">
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
<?php foreach ($paket as $edit) { ?>
    <div class="modal fade" id="EditPaketModal<?= $edit->id_paket ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Paket</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('DaftarPaket/update') ?>" method="post" class="user">
                        <div class="form-group" hidden>
                            <input class="form-control" hidden readonly autocomplete="off" name="id"
                                value="<?= $edit->id_paket ?>">
                        </div>
                        <div class="form-group">
                            <p>Kode Paket</p>
                            <input readonly type="text" class="form-control" name="kodepaket" autocomplete="off" required
                                value="<?= $edit->kdpaket ?>">
                        </div>
                        <div class="form-group">
                            <p>Nama Paket MCU</p>
                            <input type="text" class="form-control" name="namapaket" autocomplete="off" required
                                value="<?= $edit->namapaket ?>">
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
<?php } ?>
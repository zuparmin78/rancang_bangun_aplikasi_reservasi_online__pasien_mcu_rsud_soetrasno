<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800"><b>Pilih Paket Medical Check-Up</b></h5>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php foreach ($paket as $p): ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
                <a href="javascript:;" data-toggle="modal" data-target="#ShowLayananModal<?= $p->kodepaket; ?>">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <h3>
                                            <?= $p->namapaket ?>
                                        </h3>
                                    </div>
                                    <div class="text-m font-weight-bold text-info text-uppercase mb-1">
                                        <p>Tarif
                                            <?= 'Rp.' . number_format($p->hargaL, 0, ',', '.'); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-auto">
                                     <!-- <i class="fas fa-book fa-4x text-gray-300"></i> -->
                                     <i class="fas fa-book fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card shadow mb-4">
    </div>
</div>

<!-- Edit Modal-->
<?php foreach ($paket as $show) { ?>
    <div class="modal fade" id="ShowLayananModal<?= $show->kodepaket ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Pemeriksaan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?= base_url('PilihPasienMcu') ?>" method="post" class="user">
                        <div class="form-group" hidden>
                            <p>Kodepaket</p>
                            <input class="form-control" hidden readonly autocomplete="off" name="kodepaket"
                                value="<?= $show->kodepaket ?>">
                        </div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead align-items-center>
                                <tr>
                                    <th>No.</th>
                                    <th>Layanan</th>
                                    <th>Harga Layanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($layanan as $u) {
                                    if ($u->kodepaket === $show->kodepaket) { ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $u->layanan ?>
                                            </td>
                                            <td>
                                                <?= 'Rp.' . number_format($u->harga, 0, ',', '.'); ?>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                <tr>
                                    <td colspan="2">Total Harga Layanan</td>
                                    <td>
                                        <?= 'Rp.' . number_format($show->hargaL, 0, ',', '.'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Daftar Sekarang</button>
                            <!-- <a href="<?= base_url('PilihPasienMcu') ?>"><span class="btn btn-primary">Daftar Sekarang</span></a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
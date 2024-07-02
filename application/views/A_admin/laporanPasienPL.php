<?php
$fmt = new IntlDateFormatter(
    'ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL
);
$fmt->setPattern('dd LLLL yyyy');
?>
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
            <marquee scrolldelay="100"> Informasi Data Pasien</marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">

                <a href="javascript:;" data-toggle="modal" data-target="#AddPasienModal"
                    class="btn btn-primary mb-2 ml-auto "> <i class="fa fa-plus"></i>Tambah
                    Data</a>
                <a href="DaftarPasien" class="btn btn-success mb-2 ml-2 "> <i class="fa fa-refresh"></i>Refresh</a>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Pasien</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th>Agama</th>
                            <th>Status Pernikahan</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Pendidikan Terakhir</th>
                            <!-- <th>Dibuat Oleh</th> -->
                            <th>Tanggal Dibuat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasien as $u) {

                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $u->nik_pasien ?>
                                </td>
                                <td>
                                    <?= $u->nama_pasien ?>
                                </td>
                                <td>
                                    <?= $u->tmpt_lahir . ", " . $fmt->format(new DateTime($u->tglahir_pasien)); ?>
                                </td>
                                <td>
                                    <?= $u->jk_pasien ?>
                                </td>
                                <td>
                                    <?= $u->goldar ?>
                                </td>
                                <td>
                                    <?= $u->agama_pasien ?>
                                </td>
                                <td>
                                    <?= $u->kawin_pasien ?>
                                </td>
                                <td>
                                    <?= $u->pekerjaan_pasien ?>
                                </td>
                                <td>
                                    <?= $u->alamat_pasien ?>
                                </td>
                                <td>
                                    <?= $u->telp_pasien ?>
                                </td>
                                <td>
                                    <?= $u->pnddk_terakhir ?>
                                </td>
                                <!-- <td>
                                    <?= $u->user_name ?>
                                </td> -->
                                <td>
                                    <?= $fmt->format(new DateTime($u->tgl_dibuat)); ?>
                                </td>

                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#EditPasienModal<?= $u->id; ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <!-- <a class="sweetalert" href="<?= base_url('DaftarPasien/hapus') . '/' . $u->id ?>">
                                        <span class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></span></a> -->
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
<div class="modal fade" id="AddPasienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('DaftarPasien/register') ?>" method="post" class="user">
                    <div class="form-group">
                        <p>NIK</p>
                        <input pattern="\d*" minlength="16" maxlength="16" type="text" class="form-control" name="nik"
                            autocomplete="off" required placeholder="3132****">
                    </div>

                    <div class="form-group">
                        <p>Nama Lengkap Pasien</p>
                        <input type="text" class="form-control" name="nama" autocomplete="off" required
                            placeholder="Jonh****">
                    </div>

                    <div class="form-group">
                        <p>Tempat Lahir</p>
                        <input type="text" class="form-control " name="tempat_lahir" autocomplete="off" required
                            placeholder="Rembang****">
                    </div>
                    <div class="form-group">
                        <p>Tanggal Lahir</p>
                        <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control " name="tanggal_lahir"
                            autocomplete="off" required placeholder="">
                    </div>
                    <div class="form-group">
                        <p>Jenis Kelamin</p>
                        <select class="form-control" name="jenis_kelamin" required>
                            <option selected="option" disabled="selected" selected="option" disabled="selected"
                                value="">--pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Golongan Darah</p>
                        <select class="form-control" name="golongan_darah" required>
                            <option selected="option" disabled="selected" value="">--pilih Golongan Darah--
                            </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Agama</p>
                        <select class="form-control" name="agama" required>
                            <option selected="option" disabled="selected" value="">--pilih Agama--</option>
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Kepercayaan">Kepercayaan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Status Pernikahan</p>
                        <select class="form-control" name="perkawinan" required>
                            <option selected="option" disabled="selected" value="">--pilih Status
                                Pernikahan--</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Duda">Duda</option>
                            <option value="Janda">Janda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Pekerjaan</p>
                        <input type="text" class="form-control " name="pekerjaan" autocomplete="off" required
                            placeholder="pekerjaan">
                    </div>
                    <div class="form-group">
                        <p>Alamat</p>
                        <input type="text" class="form-control " name="alamat" autocomplete="off" required
                            placeholder="jl** RT** RW** Desa**">
                    </div>
                    <div class="form-group">
                        <p>Nomor Telepon</p>
                        <input pattern="\d*" minlength="10" maxlength="13" type="text" class="form-control "
                            name="nomor_telepon" autocomplete="off" required placeholder="081337*****">
                    </div>
                    <div class="form-group">
                        <p>Pendidikan Terakhir</p>
                        <select class="form-control" name="pendidikan_terakhir" required>
                            <option selected="option" disabled="selected" value="">--pilih Pendidikan--
                            </option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" hidden class="form-control " name="pembuat" autocomplete="off" required
                            value="<?php echo $this->session->userdata('id'); ?>">
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" hidden class="form-control " name="tanggal_dibuat" autocomplete="off"
                            required value="<?php echo date("Y-m-d H:i:s"); ?>">
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
<?php foreach ($pasien as $edit) { ?>
    <div class="modal fade" id="EditPasienModal<?= $edit->id ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pasien</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('DaftarPasien/update') ?>" method="post" class="user">
                    <div class="form-group" hidden>
                            <p>ID Pasien
                            <input class="form-control" hidden readonly autocomplete="off" name="id"
                                value="<?= $edit->id ?>">
                        </div>
                        <div class="form-group">
                            <p>NIK</p>
                            <input pattern="\d*" minlength="16" maxlength="16" type="text" class="form-control" name="nik"
                                autocomplete="off" required value="<?= $edit->nik_pasien ?>">
                        </div>

                        <div class="form-group">
                            <p>Nama Lengkap Pasien</p>
                            <input type="text" class="form-control" name="nama" autocomplete="off" required
                                value="<?= $edit->nama_pasien ?>">
                        </div>

                        <div class="form-group">
                            <p>Tempat Lahir</p>
                            <input type="text" class="form-control " name="tempat_lahir" autocomplete="off" required
                                value="<?= $edit->tmpt_lahir ?>">
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>
                            <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control " name="tanggal_lahir"
                                autocomplete="off" required
                                value="<?= $edit->tglahir_pasien ?>">
                        </div>
                        <div class="form-group">
                            <p>Jenis Kelamin</p>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option selected="option" disabled="selected" value="">--pilih Jenis Kelamin--
                                </option>
                                <option value="Laki-Laki" <?= ($edit->jk_pasien == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki
                                </option>
                                <option value="Perempuan" <?= ($edit->jk_pasien == 'Perempuan') ? 'selected' : '' ?>>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Golongan Darah</p>
                            <select class="form-control" name="golongan_darah" required>
                                <option selected="option" disabled="selected" value="">--pilih Golongan Darah--
                                </option>
                                <option value="A" <?= ($edit->goldar == 'A') ? 'selected' : '' ?>>A</option>
                                <option value="B" <?= ($edit->goldar == 'B') ? 'selected' : '' ?>>B</option>
                                <option value="AB" <?= ($edit->goldar == 'AB') ? 'selected' : '' ?>>AB</option>
                                <option value="O" <?= ($edit->goldar == 'O') ? 'selected' : '' ?>>O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Agama</p>
                            <select class="form-control" name="agama" required>
                                <option selected="option" disabled="selected" value="">--pilih Agama--</option>
                                <option value="Islam" <?= ($edit->agama_pasien == 'Islam') ? 'selected' : '' ?>>
                                    Islam</option>
                                <option value="Katolik" <?= ($edit->agama_pasien == 'Katolik') ? 'selected' : '' ?>>Katolik
                                </option>
                                <option value="Kristen" <?= ($edit->agama_pasien == 'Kristen') ? 'selected' : '' ?>>Kristen
                                </option>
                                <option value="Hindu" <?= ($edit->agama_pasien == 'Hindu') ? 'selected' : '' ?>>
                                    Hindu</option>
                                <option value="Budha" <?= ($edit->agama_pasien == 'Budha') ? 'selected' : '' ?>>
                                    Budha</option>
                                <option value="Konghucu" <?= ($edit->agama_pasien == 'Konghucu') ? 'selected' : '' ?>>Konghucu
                                </option>
                                <option value="Kepercayaan" <?= ($edit->agama_pasien == 'Kepercayaan') ? 'selected' : '' ?>>
                                    Kepercayaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Status Pernikahan</p>
                            <select class="form-control" name="perkawinan" required>
                                <option selected="option" disabled="selected" value="">--pilih Status
                                    Pernikahan--</option>
                                <option value="Belum Menikah" <?= ($edit->kawin_pasien == 'Belum Menikah') ? 'selected' : '' ?>>Belum Menikah</option>
                                <option value="Menikah" <?= ($edit->kawin_pasien == 'Menikah') ? 'selected' : '' ?>>Menikah
                                </option>
                                <option value="Duda" <?= ($edit->kawin_pasien == 'Duda') ? 'selected' : '' ?>>Duda
                                </option>
                                <option value="Janda" <?= ($edit->kawin_pasien == 'Janda') ? 'selected' : '' ?>>
                                    Janda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Pekerjaan</p>
                            <input type="text" class="form-control " name="pekerjaan" autocomplete="off" required
                                value="<?= $edit->pekerjaan_pasien ?>">
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control " name="alamat" autocomplete="off" required
                                value="<?= $edit->alamat_pasien ?>">
                        </div>
                        <div class="form-group">
                            <p>Nomor Telepon</p>
                            <input pattern="\d*" minlength="16" maxlength="16" type="text" class="form-control "
                                name="nomor_telepon" autocomplete="off" required value="<?= $edit->telp_pasien ?>">
                        </div>
                        <div class="form-group">
                            <p>Pendidikan Terakhir</p>
                            <select class="form-control" name="pendidikan_terakhir" required>
                                <option selected="option" disabled="selected" value="">--pilih Pendidikan--
                                </option>
                                <option value="SD" <?= ($edit->pnddk_terakhir == 'SD') ? 'selected' : '' ?>>SD
                                </option>
                                <option value="SMP" <?= ($edit->pnddk_terakhir == 'SMP') ? 'selected' : '' ?>>SMP
                                </option>
                                <option value="SMA" <?= ($edit->pnddk_terakhir == 'SMA') ? 'selected' : '' ?>>SMA
                                </option>
                                <option value="D1" <?= ($edit->pnddk_terakhir == 'D1') ? 'selected' : '' ?>>D1
                                </option>
                                <option value="D2" <?= ($edit->pnddk_terakhir == 'D2') ? 'selected' : '' ?>>D2
                                </option>
                                <option value="D3" <?= ($edit->pnddk_terakhir == 'D3') ? 'selected' : '' ?>>D3
                                </option>
                                <option value="D4" <?= ($edit->pnddk_terakhir == 'D4') ? 'selected' : '' ?>>D4
                                </option>
                                <option value="S1" <?= ($edit->pnddk_terakhir == 'S1') ? 'selected' : '' ?>>S1
                                </option>
                                <option value="S2" <?= ($edit->pnddk_terakhir == 'S2') ? 'selected' : '' ?>>S2
                                </option>
                                <option value="S3" <?= ($edit->pnddk_terakhir == 'S3') ? 'selected' : '' ?>>S3
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
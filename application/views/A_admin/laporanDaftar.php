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
    <div class="card shadow mb-8">
        <div class="card-header py-4">
            <div class="card-header bg-success text-white">
                <marquee scrolldelay="100"> Informasi Pendaftar MCU </marquee>
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-roup-mb-2 ml-3">
                        <input type='date' class="form-control" name="tanggal" required></input>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 ml-auto "><i
                            class="fa fa-eye"></i>Tampilkan</button>
                    <a href="<?= base_url(); ?>SDaftarReservasi" class="btn btn-success mb-2 ml-2 "> <i
                            class="fa fa-refresh"></i>refresh</a>
                </form>
            </div>
            <?php
            if ((isset($_GET['tanggal']) && $_GET['tanggal'] != '')) {
                $tanggal = $_GET['tanggal'];
                $bakti = $tanggal;
            } else {
                $tanggal = date('d M Y');
                $bakti = $tanggal;
            }
            ?>
            <div class="alert alert-info">
                Pendaftaran Onine Tanggal :<span class="font-weight-bold">
                    <?php echo $tanggal ?>
                </span>
            </div>
            <div class="table-responsive">
                <div align='right'></div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nomor Registrasi</th>
                            <th>Tanggal MCU</th>
                            <th> Nomor KTP/ Paspor</th>
                            <th>Nama Lengkap</th>
                            <th>Langgal lahir</th>
                            <th>Jenis Kelamin </th>
                            <th>Alamat </th>
                            <th>Nomor Hp</th>
                            <th>Paket MCU yang di pilih</th>
                            <th>Cara Pembayaran</th>
                            <th>login</th>
                            <th>option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rekap as $u) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $u->reservasi ?>
                                </td>
                                <td>
                                    <?php echo $u->reg ?>
                                </td>
                                <td>
                                    <?php echo $u->tgl_mcu ?>
                                </td>
                                <td>
                                    <?php echo $u->ktp ?>
                                </td>
                                <td>
                                    <?php echo $u->user_name ?>
                                </td>
                                <td>
                                    <?php echo $u->tgl_lahir ?>
                                </td>
                                <td>
                                    <?php echo $u->kelamin ?>
                                </td>
                                <td>
                                    <?php echo $u->alamat ?>
                                </td>
                                <td>
                                    <?php echo $u->hp ?>
                                </td>
                                <td>
                                    <?php echo $u->namapaket ?>
                                </td>
                                <td>
                                    <?php echo $u->bayar ?>
                                </td>
                                <td>
                                    <?php echo $u->pendaftar ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    // Pastikan $rekap didefinisikan sebelum digunakan
                                    if (isset($u->aprove) && isset($u->aprove)) {
                                        if ($u->aprove == 1) { ?>
                                            <b><a href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i>approve</a></b>
                                        <?php } else { ?>
                                            <b><a href="<?= base_url('DaftarReservasi/edit') . '/' . $u->id ?>"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>proses</a></b>
                                        <?php }
                                    } else {
                                        // Handle jika $rekap atau $rekap['aprove'] tidak terdefinisi
                                        // Misalnya, tampilkan pesan atau lakukan tindakan lain
                                        echo "Data tidak lengkap atau tidak ditemukan";
                                    }
                                    ?>
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
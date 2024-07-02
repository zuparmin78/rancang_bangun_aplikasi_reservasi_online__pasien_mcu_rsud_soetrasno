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

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800"><b>
                <?= $title ?>
            </b> </h5>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <marquee scrolldelay="100"> Informasi Reservasi Pasien MCU</marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb- ml-2">
                    <b>
                        <p>Tanggal Minimal : </p>
                    </b>
                    <input type="date" value="<?php echo date("Y-m-d") ?>" required class="form-control mb-2 ml-2"
                        name="min_tanggal">
                </div>
                <div class="form-group mb- ml-2">
                    <b>
                        <p>Tanggal Maksimal : </p>
                    </b>
                    <input type="date" value="<?php echo date("Y-m-d") ?>" required class="form-control mb-2 ml-2"
                        name="max_tanggal">
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto "><i class="fa fa-eye"></i> Tampilkan</button>
                <a href="DaftarReservasi" class="btn btn-success mb-2 ml-3 "> <i class="fa fa-refresh"></i>
                    Refresh</a>
            </form>
        </div>
        <?php
        if ((isset($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
            $mindate = $fmt->format(new DateTime($_GET['min_tanggal']));
            $maxdate = $fmt->format(new DateTime($_GET['max_tanggal']));

        } else {
            if (!$this->session->flashdata('tglmin') || $this->session->flashdata('tglmin') == null || !$this->session->flashdata('tglmax') || $this->session->flashdata('tglmax') == null) {
                $mindate = 'Tidak Ada';
                $maxdate = 'Tidak Ada';
            } else {
                $tglmins = $this->session->flashdata('tglmin');
                $tglmaxs = $this->session->flashdata('tglmax');
                $mindate = $fmt->format(new DateTime($tglmins));
                $maxdate = $fmt->format(new DateTime($tglmaxs));
            }
        }
        ?>
        <div class="alert alert-info">
            Menampilkan Data Reservasi :<span class="font-weight-bold">
                <?= $mindate . ' Sampai ' . $maxdate ?>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Registrasi</th>
                            <th>Nama Pasien</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Status Pembayaran</th>
                            <th>Nomor Antri</th>
                            <th>Status Pasien</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($reservasi as $u) {
                            foreach ($datamidtrans as $data) {
                                if ($u->order_id === $data['order_id']) {

                                    if (
                                        $data['transaction_status'] == 'capture' ||
                                        $data['transaction_status'] == 'settlement'
                                    ) {
                                        $status_pembayaran = '<span class="badge badge-success">Pembayaran Berhasil</span>';
                                    } else if (
                                        $data['transaction_status'] == 'deny' ||
                                        $data['transaction_status'] == 'failure'
                                    ) {
                                        $status_pembayaran = '<span class="badge badge-danger">Pembayaran Gagal</span>';
                                    } else if ($data['transaction_status'] == 'cancel') {
                                        $status_pembayaran = '<span class="badge badge-danger">Pembayaran Dibatalkan</span>';
                                    } else if ($data['transaction_status'] == 'expire') {
                                        $status_pembayaran = '<span class="badge badge-danger">Pembayaran Kedaluwarsa</span>';
                                    } else if ($data['transaction_status'] == 'pending') {
                                        $status_pembayaran = '<span class="badge badge-secondary">Menunggu Pembayaran</span>';
                                    } else if ($data['transaction_status'] == 'refund') {
                                        $status_pembayaran = '<span class="badge badge-primary">Menunggu Dikembalikan</span>';
                                    } else if ($data['transaction_status'] == 'partial_refund') {
                                        $status_pembayaran = '<span class="badge badge-info">Menunggu Dikembalikan sebagian</span>';
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $u->no_reg ?>
                                </td>
                                <td>
                                    <?= $u->nama_pasien ?>
                                </td>
                                <td>
                                    <?= $u->tmpt_lahir . ", " . $fmt->format(new DateTime($u->tglahir_pasien)); ?>
                                </td>
                                <td>
                                    <?= $u->namapaket ?>
                                </td>
                                <td>
                                    <?= $fmt->format(new DateTime($u->tgl_kedatangan)) ?>
                                </td>
                                <td>
                                    <?= $status_pembayaran; ?>
                                </td>
                                <td>
                                    <?= $u->no_antri ?>
                                </td>
                                <td>
                                    <?php if ($u->status_pasien == 0) {
                                        echo '<span class="badge badge-warning">Belum Terkonfirmasi Datang</span>';
                                    } else if ($u->status_pasien == 1) {
                                        echo '<span class="badge badge-success">Terkonfirmasi Datang</span>';
                                    } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($u->tgl_kedatangan === date('Y-m-d')) { ?>
                                        <a href="DaftarReservasi/konfirmasi?var1=<?= $u->id_reservasi; ?>&var2=<?= $u->tgl_kedatangan; ?>&var3=<?= date('Y-m-d'); ?>"
                                            class="btn btn-primary"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="DaftarReservasi/konfirmasi?var1=<?= $u->id_reservasi; ?>&var2=<?= $u->tgl_kedatangan; ?>&var3=<?= date('Y-m-d'); ?>"
                                            class="btn btn-primary konfirmpasien"><i class="fa fa-check"></i></a>
                                    <?php } ?>
                                    <a data-toggle="modal" data-target="#ShowDetail<?= $u->id_reservasi; ?>"
                                        class="btn btn-info"><i class="fa fa-eye"></i></a>
                                </td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php foreach ($reservasi as $show) { ?>
    <div class="modal fade" id="ShowDetail<?= $show->id_reservasi ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php
        foreach ($datamidtrans as $data) {
            if ($show->order_id === $data['order_id']) {

                $tgl_kedatangan = $fmt->format(new DateTime($data['metadata']['tgl_kedatangan']));
                $payment_type = $data['payment_type'];
                $waktu_transaksi = $fmt->format(new DateTime($data['transaction_time']));

                if (array_key_exists('settlement_time', $data)) {
                    $waktu_pembayaran = $fmt->format(new DateTime($data['settlement_time']));
                } else {
                    $waktu_pembayaran = "Belum dilakukan pembayaran";
                }

                if (
                    $data['transaction_status'] == 'capture' ||
                    $data['transaction_status'] == 'settlement'
                ) {
                    $status_pembayaran = '<span class="badge badge-success">Pembayaran Berhasil</span>';
                } else if (
                    $data['transaction_status'] == 'deny' ||
                    $data['transaction_status'] == 'failure'
                ) {
                    $status_pembayaran = '<span class="badge badge-danger">Pembayaran Gagal</span>';
                } else if ($data['transaction_status'] == 'cancel') {
                    $status_pembayaran = '<span class="badge badge-danger">Pembayaran Dibatalkan</span>';
                } else if ($data['transaction_status'] == 'expire') {
                    $status_pembayaran = '<span class="badge badge-danger">Pembayaran Kedaluwarsa</span>';
                } else if ($data['transaction_status'] == 'pending') {
                    $status_pembayaran = '<span class="badge badge-secondary">Menunggu Pembayaran</span>';
                } else if ($data['transaction_status'] == 'refund') {
                    $status_pembayaran = '<span class="badge badge-primary">Menunggu Dikembalikan</span>';
                } else if ($data['transaction_status'] == 'partial_refund') {
                    $status_pembayaran = '<span class="badge badge-info">Menunggu Dikembalikan sebagian</span>';
                }
            }
        }
        ?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Reservasi Pasien</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>NIK</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->nik_pasien; ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nama Pasien</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->nama_pasien; ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Tempat, Tanggal Lahir</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->tmpt_lahir . ", " . $fmt->format(new DateTime($show->tglahir_pasien)); ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->jk_pasien ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nomor Telepon</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->telp_pasien ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nomor Registrasi</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->no_reg ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nomor Antri</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->no_antri ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Tanggal Kedatangan</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $tgl_kedatangan ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nama Paket</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->namapaket; ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>ID Order</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $show->order_id ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Jenis Pembayaran</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $payment_type ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Waktu Transaksi</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $waktu_transaksi ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Status Pembayaran</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $status_pembayaran; ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Waktu Pembayaran</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $waktu_pembayaran ?>
                            </label>
                        </div>
                    </div>
                    <!-- <?php echo "<pre>";
                    echo print_r($data);
                    echo "</pre>"; ?> -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $('.konfirmpasien').click(function (e) {

        e.preventDefault();
        const href = $(this).attr('href');
        var tanggal = "<?php echo $fmt->format(new DateTime(date('Y-m-d'))); ?>";

        swal({
            title: "Apakah Anda Ingin Konfirmasi Pasien?",
            text: "Pasien akan dikonfirmasi kedatangan pada tanggal " + tanggal,
            icon: "warning",
            buttons: {
                confirm: 'Konfirmasi',
                cancel: 'Batal'
            },
            dangerMode: false,

        }).then((konfirm) => {
            if (konfirm) {
                document.location.href = href
            }
        });

    });
</script>
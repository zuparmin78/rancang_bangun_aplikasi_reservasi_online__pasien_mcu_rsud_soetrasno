<?php
$fmt = new IntlDateFormatter(
    'ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL
);
$fmt->setPattern('dd LLLL yyyy');
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800"><b>
                <?= $title ?>
            </b> </h5>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <marquee scrolldelay="100"> Informasi Pembayaran Pasien MCU</marquee>
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
                <a href="DaftarPembayaran" class="btn btn-success mb-2 ml-3 "> <i class="fa fa-refresh"></i>
                    Refresh</a>
            </form>
        </div>
        <?php
        if ((isset ($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset ($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
            $mindate = $fmt->format(new DateTime($_GET['min_tanggal']));
            $maxdate = $fmt->format(new DateTime($_GET['max_tanggal']));

        } else {
            $mindate = 'Tidak Ada';
            $maxdate = 'Tidak Ada';
        }
        ?>
        <div class="alert alert-info">
            Menampilkan Data Pembayaran :<span class="font-weight-bold">
                <?= $mindate . ' Sampai ' . $maxdate ?>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Order</th>
                            <th>Nama Paket</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Jenis Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Waktu Transaksi</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bayar as $u) {
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
                                    <?= $u->order_id ?>
                                </td>
                                <td>
                                    <?= $u->namapaket ?>
                                </td>
                                <td>
                                    <?= 'Rp.' . number_format($u->gross_amount, 0, ',', '.'); ?>
                                </td>
                                <td>
                                    <?= $u->payment_type ?>
                                </td>
                                <td>
                                    <?= $status_pembayaran ?>
                                </td>
                                <td>
                                    <?= $fmt->format(new DateTime($u->transaction_time)); ?>
                                </td>
                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#ShowDetail<?= $u->order_id; ?>"
                                        class="btn btn-info"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($bayar as $show) { ?>
    <div class="modal fade" id="ShowDetail<?= $show->order_id ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php
        foreach ($datamidtrans as $data) {
            if ($show->order_id === $data['order_id']) {

                $payment_type = $data['payment_type'];
                $waktu_transaksi = $fmt->format(new DateTime($data['transaction_time']));
                $id_transaksi = $data['transaction_id'];

                if (array_key_exists('va_numbers', $data)) {
                    $namabank = $data['va_numbers'][0]['bank'];
                    $kodepembayaran = $data['va_numbers'][0]['va_number'];
                } else if (array_key_exists('payment_code', $data)) {
                    $namabank = $data['store'];
                    $kodepembayaran = $data['payment_code'];
                } else if (!array_key_exists('payment_code', $data) || !array_key_exists('va_numbers', $data)) {
                    $namabank = 'Tidak Ada';
                    $kodepembayaran = 'https://api.sandbox.midtrans.com/v2/qris/' . $data['transaction_id'] . '/qr-code';
                } else {
                    $namabank = "Tidak Ada";
                    $kodepembayaran = "Tidak Ada";
                }

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
                    <h5 class="modal-title" id="exampleModalLabel">Info Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
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
                            <label>Nama Bank/Merchant</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $namabank ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Kode Pembayaran</label>
                        </div>
                        <div>
                            <label>:
                                <?= $kodepembayaran ?>
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
                            <label>ID Transaksi</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $id_transaksi ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Jumlah Pembayaran</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= 'Rp.' . number_format($show->gross_amount, 0, ',', '.'); ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Status Pembayaran</label>
                        </div>
                        <div class="col-sm-6">
                            <label>:
                                <?= $status_pembayaran ?>
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
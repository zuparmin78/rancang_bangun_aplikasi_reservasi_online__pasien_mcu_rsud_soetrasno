<?php
$fmt = new IntlDateFormatter(
    'ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL
);
$fmt->setPattern('dd LLLL yyyy');
?>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-TSUfbwnErdj_yXC4"></script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800"><b>
                <?= $title ?>
            </b> </h5>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <marquee scrolldelay="100"> Pendaftaran Pasien MCU Paket
                <?= $paket[0]->namapaket; ?>
            </marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <a href="javascript:;" data-toggle="modal" data-target="#AddModal"
                    class="btn btn-primary mb-2 ml-auto "><i class="fa fa-plus"></i> Daftarkan</a>
            </form>
            <div class="table-responsive">
                <table id="selectedPropsTable" class="table table-bordered selectedPropsTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th align="left" colspan="7">
                                Pasien yang telah dipilih
                            </th>
                        </tr>
                        <tr>
                            <th>Pilih</th>
                            <th>NIK</th>
                            <th>Nama Pasien</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered searchTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>NIK</th>
                            <th>Nama Pasien</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasien as $u) {
                            ?>
                            <tr>
                                <td>
                                    <input data-id="checkdata" name="res_pasien[]" type="checkbox"
                                        data-value="<?= $u->id ?>">
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
                                    <?= $u->alamat_pasien ?>
                                </td>
                                <td>
                                    <?= $u->telp_pasien ?>
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

<form id="payment-form" method="post" action="PilihPasienMcu/finish" hidden>
    <input type="hidden" name="result_type" id="result-type" value="">
    <input type="hidden" name="result_data" id="result-data" value="">
</form>

<!-- Add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tanggal Reservasi Pasien</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" hidden>
                    <input class="form-control" hidden readonly autocomplete="off" id="kodepaket_p" name="kodepaket_p"
                        value="<?= $paket[0]->kdpaket; ?>">
                </div>
                <div class="form-group" hidden>
                    <input class="form-control" hidden readonly autocomplete="off" id="jumlah_harga" name="jumlah_harga"
                        value="<?= $paket[0]->hargaL; ?>">
                </div>
                <div class="form-group">
                    <input type="date" value="<?= date('Y-m-d', strtotime('now +2 day')); ?>"
                        min="<?= date('Y-m-d', strtotime('now +2 day')); ?>"
                        max="<?= date('Y-m-d', strtotime('now +30 day')); ?>" class="form-control" id="tanggal_periksa"
                        name="tanggal_periksa" autocomplete="off" required placeholder="">
                </div>
                <div class="form-group" hidden>
                    <input type="text" hidden class="form-control" id="id_pembuat" name="id_pembuat" autocomplete="off"
                        required value="<?php echo $this->session->userdata('id'); ?>">
                </div>
                <div class="form-group" hidden>
                    <input type="text" hidden class="form-control" id="nama_l" name="nama_l" autocomplete="off" required
                        value="<?php $pengguna_prof[0]->user_name; ?>">
                </div>
                <div class="form-group" hidden>
                    <input type="text" hidden class="form-control" id="hp_pel" name="hp_pel" autocomplete="off" required
                        value="<?php $pengguna_prof[0]->hp; ?>">
                </div>
                <div class="form-group" hidden>
                    <input type="text" hidden class="form-control" id="email_pel" name="email_pel" autocomplete="off"
                        required value="<?php echo $pengguna_prof[0]->email_pelanggan; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button id="pay-button" class="btn btn-primary">Bayar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>

    $("#dataTable input:checkbox").click(function () {
        if ($(this).is(":checked")) {
            $(this).closest("tr").appendTo("#selectedPropsTable");
        } else {
            $(this).closest("tr").appendTo("#dataTable");
        }
    });
</script>

<script type="text/javascript">

    $('#pay-button').click(function (event) {
        event.preventDefault();
        var tanggal_periksa = $('#tanggal_periksa').val();

        const minDate = new Date();
        minDate.setDate(minDate.getDate() + 2);
        const [minDateFormatted] = minDate.toISOString().split('T');

        const maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + 30);
        const [maxDateFormatted] = maxDate.toISOString().split('T');
        if (tanggal_periksa < minDateFormatted) {
            swal({
                title: 'Gagal',
                text: 'Pilih Tanggal 2 Hari dari Hari ini',
                icon: 'error'
            });
        } else if (tanggal_periksa > maxDateFormatted) {
            swal({
                title: 'Gagal',
                text: 'Pilih Tanggal 30 Hari dari Hari ini',
                icon: 'error'
            });
        } else {

            var result = {};
            $("input[type='checkbox']").each(function (index, el) {
                if (el.checked) {
                    var id = $(el).data("id");
                    var val = $(el).data("value");
                    if (!result[id]) result[id] = [];
                    result[id].push(val);
                }
            });

            var checkdata = $('#checkdata').val();
            var kodepaket_p = $('#kodepaket_p').val();
            var id_pembuat = $('#id_pembuat').val();
            var nama_l = $('#nama_l').val();
            var hp_pel = $('#hp_pel').val();
            var email_pel = $('#email_pel').val();
            var jumlah_harga = $('#jumlah_harga').val();
            var id_pasien = result.checkdata;

            if (id_pasien == null || id_pasien == '') {
                swal({
                    title: 'Gagal',
                    text: 'Silahkan Pilih Pasien',
                    icon: 'error'
                });
            } else if (tanggal_periksa == null || tanggal_periksa == '') {
                swal({
                    title: 'Gagal',
                    text: 'Silahkan Isi Tanggal Periksa',
                    icon: 'error'
                });
            } else {
                var jumlah_pasien = result.checkdata.length;
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>/pilihpasienmcu/register',
                    data: {
                        kodepaket_p: kodepaket_p,
                        tanggal_periksa: tanggal_periksa,
                        id_pembuat: id_pembuat,
                        nama_l: nama_l,
                        hp_pel: hp_pel,
                        email_pel: email_pel,
                        jumlah_harga: jumlah_harga,
                        jumlah_pasien: jumlah_pasien,
                        id_pasien: id_pasien
                    },
                    cache: false,

                    success: function (data) {
                        //location = data;

                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                            //resultType.innerHTML = type;
                            //resultData.innerHTML = JSON.stringify(data);
                        }

                        snap.pay(data, {

                            onSuccess: function (result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function (result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function (result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
            }
        }
    });

</script>
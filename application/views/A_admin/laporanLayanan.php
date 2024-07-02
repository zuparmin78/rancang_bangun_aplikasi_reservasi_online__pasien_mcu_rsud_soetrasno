<div class="flash-data-sukses" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
<?php if ($this->session->flashdata('sukses')): ?>
<?php endif; ?>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
<?php if ($this->session->flashdata('gagal')): ?>
<?php endif; ?>
<div class="flashdata_terserah_gagal" data-flashdata="<?= $this->session->flashdata('isi_terserah_gagal'); ?>"></div>
<?php if ($this->session->flashdata('isi_terserah_gagal')): ?>
<?php endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['id'])) {
    ob_clean();

    $obj = array_key_exists($_POST['id'], $mcu) ? $mcu[$_POST['id']] : false;

    header('Content-Type: application/json');
    exit ($obj ? json_encode($obj) : $obj);
}
?>

<script>

    const ajax = function (url, params, callback) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (this.status == 200 && this.readyState == 4) callback.call(this, this.response)
        };
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(params);
    };

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('select[id="pilihpaket"]').addEventListener('change', function (e) {
            ajax(location.href, 'id=' + this.value, function (r) {
                if (!r) {
                    swal('Bad foo!');
                    return;
                }
                let json = JSON.parse(r);
                Object.keys(json).map(k => {
                    let field = document.querySelector('input[name="' + k + '"]');
                    if (field) field.value = json[k]
                })

            });
        });
    });
</script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex -items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800 "><b>
                <?php echo $title ?>
            </b> </h5>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <marquee scrolldelay="100"> Informasi Pemeriksaan Paket MCU </marquee>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb- ml-2 ">
                    <b>
                        <p>Nama Paket :</p>
                    </b>
                    <select class="form-control mb-2 ml-2" name='namapaket' required>
                        <option selected="option" disabled="selected" value="">--pilih Paket MCU--</option>
                        <?php foreach ($mcu as $h): ?>
                            <option value="<?= $h->namapaket ?>">
                                <?= $h->namapaket ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto "><i class="fa fa-eye"></i>Tampilkan</button>
                <a href="javascript:;" data-toggle="modal" data-target="#AddLayananModal"
                    class="btn btn-success mb-2 ml-3 "> <i class="fa fa-plus"></i>Tambah Data</a>
            </form>
        </div>
        <?php
        if ((isset ($_GET['namapaket']) && $_GET['namapaket'] != '')) {
            $namapaket = $_GET['namapaket'];
            $tampilkan = $namapaket;

        } else {
            if (!$this->session->flashdata('flash_namapaket') || $this->session->flashdata('flash_namapaket') == null) {
                $namapaket = 'tidak ada Paket MCU di pilih';
                $tampilkan = $namapaket;
            } else {
                $tampilkan = $this->session->flashdata('flash_namapaket');
            }
        }
        ?>
        <div class="alert alert-info">
            Menampilkan Data Pemeriksaan Paket :<span class="font-weight-bold">
                <?= $tampilkan ?>
            </span>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Layanan </th>
                            <th> Harga Pemeriksaan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $no = 1;
                            foreach ($rekap as $u):
                                ?>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $u->layanan ?>
                                </td>
                                <td>
                                    <?= 'Rp.' . number_format(floatval($u->harga), 0, ',', '.'); ?>
                                </td>
                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#EditLayananModal<?= $u->id_periksa; ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a class="sweetalert"
                                        href="DaftarLayanan/hapus?var1=<?= $u->id_periksa; ?>&var2=<?= $u->namapaket; ?>">
                                        <span class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($layanan as $p): ?>
                            <tr>
                                <td colspan="2">Total Harga Layanan</td>
                                <td colspan="2">
                                    <?= 'Rp.' . number_format(floatval($p->hargaL), 0, ',', '.'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal-->
<div class="modal fade" id="AddLayananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="<?= base_url('DaftarLayanan/register') ?>" method="post" class="user">
                    <div class="form-group">
                        <p>Nama Paket</p>
                        <select id="pilihpaket" class="form-control">
                            <option selected="option" disabled="selected" value="">--pilih Nama Paket MCU--</option>
                            <?php foreach ($mcu as $u) {
                                $j = $u->no_urut - 1 ?>
                                <option value="<?= $j ?>">
                                    <?= $u->namapaket ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class=" form-group">
                        <p>Kode Paket</p>
                        <input id="kdpaket" type="text" value="" class="form-control" name="kodepaket" required
                            readonly>
                    </div>
                    <div class="form-group" hidden>
                        <p>Kode Paket</p>
                        <input id="namapaket" hidden type="text" value="" class="form-control" name="namapaket" required
                            readonly>
                    </div>
                    <div class="form-group">
                        <p>Pemeriksaan</p>
                        <input type="text" autocomplete="off" class="form-control" name="layanan" required
                            placeholder="Layanan***">
                    </div>
                    <div class="form-group">
                        <p>Harga Layanan</p>
                        <input type="text" autocomplete="off" class="form-control " name="harga" required
                            placeholder="000***">
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
<?php foreach ($rekap as $edit) { ?>
    <div class="modal fade" id="EditLayananModal<?= $edit->id_periksa ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pemeriksaan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('DaftarLayanan/update') ?>" method="post" class="user">
                        <div class="form-group" hidden>
                            <input class="form-control" hidden readonly autocomplete="off" name="id"
                                value="<?= $edit->id_periksa ?>">
                        </div>
                        <div class="form-group" hidden>
                            <input hidden type="text" value="<?= $edit->namapaket ?>" class="form-control" name="namapaket"
                                readonly>
                        </div>
                        <div class="form-group">
                            <p>Pemeriksaan</p>
                            <input type="text" class="form-control" name="layanan" required autocomplete="off"
                                value="<?= $edit->layanan ?>">
                        </div>
                        <div class="form-group">
                            <p>Harga Layanan</p>
                            <input type="text" class="form-control" name="harga" required autocomplete="off"
                                value="<?= $edit->harga ?>">
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
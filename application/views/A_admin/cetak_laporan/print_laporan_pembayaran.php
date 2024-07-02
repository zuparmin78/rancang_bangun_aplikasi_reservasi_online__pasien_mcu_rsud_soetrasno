<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800"><b>
                <?= $title ?>
            </b> </h5>
    </div>
    <div class="d-sm-flex align-items-center justify-content-center">
        <div class="card shadow mb-4">
            <div class="card-header bg-success text-white">
                <h5 scrolldelay="100">Cetak Laporan Pembayaran MCU</h5>
            </div>
            <div class="card-body">
                <form action="laporan/cetak_laporan_pembayaran" method="post">
                    <div class="form-group">
                        <p>Tanggal Minimal</p>
                        <input type="date" value="<?php echo date("Y-m-d") ?>" class="form-control" id="min_tanggal" name="min_tanggal" autocomplete="off"
                            required>
                    </div>
                    <div class="form-group">
                        <p>Tanggal Maksimal</p>
                        <input type="date" value="<?php echo date("Y-m-d") ?>" class="form-control" id="max_tanggal" name="max_tanggal" autocomplete="off"
                            required>
                    </div>
                    <button type="submit" onclick="submitForm()" id="cetak" class="btn btn-primary btn-user btn-block">
                        Cetak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        var min_tanggal = $('#min_tanggal').val();
        var max_tanggal = $('#max_tanggal').val();

        if (!max_tanggal || !min_tanggal) {
            swal({
                title: 'Gagal',
                text: 'Pilih Rentan Tanggal!',
                icon: 'error'
            });
        } else if (max_tanggal < min_tanggal) {
            swal({
                title: 'Gagal',
                text: 'Pilih Rentan Tanggal dengan Benar!',
                icon: 'error'
            });
        } else {
            var formData = new FormData();
            formData.append('min_tanggal', min_tanggal);
            formData.append('max_tanggal', max_tanggal);

            var xhr = new XMLHttpRequest();

            // Atur callback untuk menangani respon dari server
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        // Tangani respon dari server
                        console.log(xhr.responseText);
                    } else {
                        // Tangani kesalahan
                        console.error('Request error:', xhr.status);
                    }
                }
            };

            // Atur metode dan URL endpoint controller CodeIgniter
            xhr.open("POST", "<?php echo base_url('laporan/cetak_laporan_pembayaran'); ?>", true);

            // Kirim data ke controller
            xhr.send(formData);
        }
    }
</script>
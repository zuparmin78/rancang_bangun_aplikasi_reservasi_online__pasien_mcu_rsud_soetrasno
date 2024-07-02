<div class="col-lg-6 mb-4">
</div>
</div>

</body>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <p class="font-size-sm mb-0">&copy; Copyrights
                <?= date('Y') ?> <strong><span>G41221664</span></strong> All Rights Reserved
            </p>
        </div>
    </div>
</footer>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script>
    const isisukses = $('.flash-data-sukses').data('flashdata');

    if (isisukses) {
        swal({
            title: 'Sukses',
            text: 'Data Berhasil ' + isisukses,
            icon: 'success'
        });
    }
</script>

<script>
    const isigagal = $('.flash-data-gagal').data('flashdata');

    if (isigagal) {
        swal({
            title: 'Gagal',
            text: 'Data Gagal ' + isigagal,
            icon: 'error'
        });
    }
</script>

<script>
    const cekisi = $('.flashdata_informasi').data('flashdata');

    if (cekisi) {
        swal({
            title: 'Maaf!',
            text: cekisi,
            icon: 'info'
        });
    }
</script>

<script>
    const cekisi = $('.flashdata_terserah_berhasil').data('flashdata');

    if (cekisi) {
        swal({
            title: 'Gotcha!',
            text: cekisi,
            icon: 'success'
        });
    }
</script>

<script>
    const cekisian = $('.flashdata_terserah_gagal').data('flashdata');

    if (cekisian) {
        swal({
            title: 'Whoopz!',
            text: cekisian,
            icon: 'error'
        });
    }
</script>

<script>
    $('.sweetalertNya').click(function (e) {

        e.preventDefault();
        const href = $(this).attr('href');

        swal({
            title: "Apa Anda Yakin Akan Logout?",
            text: "Sesi anda akan berakhir dan anda harus login ulang!",
            icon: "warning",
            buttons: {
                confirm: 'Logout',
                cancel: 'Batal'
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Gotcha!",
                    text: "Berhasil Logout",
                    icon: "success",
                }).then((redirect) => {
                    document.location.href = href
                });
            }
        });


    });

    $('.sweetalert').click(function (e) {

        e.preventDefault();
        const href = $(this).attr('href');

        swal({
            title: "Apa Anda Yakin?",
            text: "Saat terhapus , Data yang dihapus tidak bisa kembali lagi!",
            icon: "warning",
            buttons: {
                confirm: 'Hapus',
                cancel: 'Batal'
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                document.location.href = href

            }
        });

    });
</script>

</html>
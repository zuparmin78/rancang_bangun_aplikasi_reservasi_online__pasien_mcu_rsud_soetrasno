<body id="page-top">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Memiliki Hak Akses</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foto</th>
                                <th>NIK</th>
                                <th>Nama Pengguna</th>
                                <th>Otoritas User</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pengguna as $u): ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <?php foreach ($foto as $p): ?>
                                        <td class="d-flex align-items-center">
                                            <!-- <a class="d-flex align-items-center"> -->
                                            <div class="avatar avatar-circle">
                                                <?php if ($p->id_pelanggan === $u->id) { ?>
                                                    <img class="avatar-img" src="bootslander/img/pengguna/<?= $p->foto_prof ?>"
                                                        alt="Image Description">
                                                    <!-- <img class="avatar-img" src="bootslander/img/pengguna/default.jpg"
                                                        alt="Image Description"> -->
                                                <?php } ?>
                                            </div>
                                        <?php endforeach; ?>
                                    <td>
                                        <?= $u->ktp ?>
                                    </td>
                                    <td>
                                        <?= $u->user_name ?>
                                    </td>
                                    <td>
                                        <?= $u->level ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
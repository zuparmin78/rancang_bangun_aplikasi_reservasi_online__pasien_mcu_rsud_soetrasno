<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i><img src="bootslander/img/rsu.png" width="40" height="40" alt="logo" /> </i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php echo $this->session->userdata('access'); ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <?php
                if ($this->session->userdata('level') === 'pengunjung') {
                    ?> <a class="nav-link" href="Pengunjung">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Kembali</span></a>
                    <?php
                } else if ($this->session->userdata('level') === 'kepala rm') {
                    ?><a class="nav-link" href="Kepala_rm">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    <?php
                } else if ($this->session->userdata('level') === 'administrator') {
                    ?><a class="nav-link" href="administrator">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                    <?php
                } else if ($this->session->userdata('level') === 'petugas') {
                    ?><a class="nav-link" href="petugas">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Dashboard</span></a>
                    <?php
                }
                ?>
            </li>

            <?php if ($this->session->userdata('level') === "administrator"): ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Master Data
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Data MCU</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="DaftarDokter">Data Dokter</a>
                            <a class="collapse-item" href="DaftarPasien">Data Pasien</a>
                            <a class="collapse-item" href="DaftarPaket">Data Paket MCU</a>
                            <a class="collapse-item" href="DaftarLayanan">Data Layanan Paket MCU</a>
                            <a class="collapse-item" href="DaftarGaleri">Data Galeri</a>

                        </div>
                    </div>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Data Pengguna</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="DaftarPengguna">Daftar Pengguna</a>
                            <a class="collapse-item" href="Info_admin">Informasi Admin</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('level') === "petugas" || $this->session->userdata('level') === "administrator"): ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Pelayanan
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapso"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Pendaftaran</span>
                    </a>
                    <div id="collapso" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pendaftaran:</h6>
                            <a class="collapse-item" href="DaftarReservasi">Pasien Reservasi MCU</a>
                            <a class="collapse-item" href="DaftarPasienTerkonfirmasi">Pasien Terkonfirmasi</a>
                            <h6 class="collapse-header">Transaksi:</h6>
                            <a class="collapse-item" href="DaftarPembayaran">Pembayaran Reservasi</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('level') === "kepala rm" || $this->session->userdata('level') === "administrator"): ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    REPORT
                </div>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Laporan MCU</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Report:</h6>
                            <a class="collapse-item" href="laporan_reservasi">Laporan Pendaftaran MCU</a>
                            <a class="collapse-item" href="laporan_terkonfirmasi ">Laporan Pasien <br> Datang MCU</a>
                            <a class="collapse-item" href="laporan_tidakdatang ">Laporan Pasien <br> Tidak Datang MCU</a>
                            <a class="collapse-item" href="laporan_pembayaran">Laporan Pembayaran MCU</a>

                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('level') === "pengunjung"): ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Pelayanan
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="PilihPaketMcu">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Daftar MCU</span></a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapso"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Pendaftaran</span>
                    </a>
                    <div id="collapso" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pasien:</h6>
                            <a class="collapse-item" href="DaftarPasien">Data Pasien</a>
                            <h6 class="collapse-header">Transaksi:</h6>
                            <a class="collapse-item" href="DaftarPembayaran">Pembayaran</a>
                            <a class="collapse-item" href="DaftarReservasi">Reservasi Pendaftaran</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <H3><b>MCU RSUD dr. R. Soetrasno</b></H3>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $this->session->userdata('name'); ?>
                                </span>
                                <?php
                                $ps = json_decode(json_encode($profile), true);
                                if (!$ps) { ?>
                                    <img class="img-profile rounded-circle" src="bootslander/img/pengguna/default.jpg">
                                <?php } else {
                                    foreach ($profile as $p): ?>
                                        <img class="img-profile rounded-circle"
                                            src="bootslander/img/pengguna/<?= $p->foto_prof ?>">
                                    <?php endforeach;
                                } ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="Setting_Akun">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Ganti">
                                    <i class="fas fa-exchange fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item sweetalertNya" href="<?= base_url('Masuk/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
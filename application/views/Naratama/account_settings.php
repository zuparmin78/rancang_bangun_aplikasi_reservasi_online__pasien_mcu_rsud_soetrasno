<div class="flash-data-sukses" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
<?php if ($this->session->flashdata('sukses')): ?>
<?php endif; ?>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
<?php if ($this->session->flashdata('gagal')): ?>
<?php endif; ?>
<div class="flashdata_informasi" data-flashdata="<?= $this->session->flashdata('profil_ga_lengkap'); ?>"></div>
<?php if ($this->session->flashdata('profil_ga_lengkap')): ?>
<?php endif; ?>

<!-- End Navbar Vertical -->
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex -items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800 "><b>
                Update Profile
            </b> </h5>
    </div>
    <form method="POST" action="Setting_Akun/update" enctype="multipart/form-data">
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Profile Cover -->
                <div class="profile-cover">
                    <div class="profile-cover-img-wrapper">
                        <img id="profileCoverImg" class="profile-cover-img"
                            src="bootslander/img/pengguna/default_header.jpg" alt="Image Description">
                    </div>
                </div>
                <!-- End Profile Cover -->

                <!-- Avatar -->
                <?php
                $ps = json_decode(json_encode($profile), true);
                if (!$ps) { ?>
                    <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                        for="avatarUploader">
                        <img id="avatarImg" class="avatar-img" src="bootslander/img/pengguna/default.jpg"
                            alt="Image Description">
                        <input type="file" name="foto" class="js-file-attach avatar-uploader-input" id="avatarUploader"
                            data-hs-file-attach-options="{
                                      &quot;textTarget&quot;: &quot;#avatarImg&quot;,
                                      &quot;mode&quot;: &quot;image&quot;,
                                      &quot;targetAttr&quot;: &quot;src&quot;
                                   }">

                        <span class="avatar-uploader-trigger">
                            <i class="fa fa-pencil avatar-uploader-icon shadow"></i>
                        </span>
                    </label>
                <?php } else {
                    foreach ($profile as $p): ?>
                        <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                            for="avatarUploader">
                            <img id="avatarImg" class="avatar-img" src="bootslander/img/pengguna/<?= $p->foto_prof ?>"
                                alt="Image Description">
                            <input type="file" name="foto" class="js-file-attach avatar-uploader-input" id="avatarUploader"
                                data-hs-file-attach-options="{
                                      &quot;textTarget&quot;: &quot;#avatarImg&quot;,
                                      &quot;mode&quot;: &quot;image&quot;,
                                      &quot;targetAttr&quot;: &quot;src&quot;
                                   }">

                            <span class="avatar-uploader-trigger">
                                <i class="fa fa-pencil avatar-uploader-icon shadow"></i>
                            </span>
                        </label>
                    <?php endforeach;
                } ?>
                <!-- End Avatar -->

            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Diri</h2>
                </div>
                <!-- Body -->
                <div class="card-body">
                    <?php foreach ($tamu as $t): ?>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="no_ktp" class="col-sm-3 col-form-label input-label">No KTP</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="no_ktp"
                                    placeholder="" value="<?= $t->ktp ?>">
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="nama_lengkap" class="col-sm-3 col-form-label input-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="namalengkap"
                                    placeholder="" value="<?= $t->user_name ?>">
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <div class="row form-group">
                            <label for="email" class="col-sm-3 col-form-label input-label">Email</label>

                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="email"
                                    placeholder="" value="<?= $t->email_pelanggan ?>">
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="telepon" class="col-sm-3 col-form-label input-label">Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" pattern="\d*" minlength="8" maxlength="14" required class="form-control"
                                    name="notelp" placeholder="" autocomplete="off" value="<?= $t->hp ?>">
                            </div>
                        </div>
                        <!-- End Form Group -->
                    <?php endforeach ?>
                    <?php
                    $array = json_decode(json_encode($profile), true);
                    if (!$array) { ?>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label input-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="tempat_lahir"
                                    placeholder="" value="">
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label input-label">Tanggal Lahir</label>
                            <div class="col-sm-2">
                                <input type="date" required autocomplete="off" class="form-control" name="tanggal_lahir"
                                    placeholder="13/01/2002" value="">
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label input-label">Jenis Kelamin</label>

                            <div class="col-sm-9">
                                <div class="input-group input-group-sm-down-break">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="Laki-Laki" class="custom-control-input"
                                                name="jenis_kelamin" id="userAccountTypeRadio1">
                                            <label class="custom-control-label"
                                                for="userAccountTypeRadio1">Laki-Laki</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="Perempuan" class="custom-control-input"
                                                name="jenis_kelamin" id="userAccountTypeRadio2">
                                            <label class="custom-control-label"
                                                for="userAccountTypeRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="golongan_darah" class="col-sm-3 col-form-label input-label">Golongan darah</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="golongan_darah" required>
                                    <option selected="option" disabled="selected" value="">--pilih Golongan Darah--
                                    </option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="agama" class="col-sm-3 col-form-label input-label">Agama</label>
                            <div class="col-sm-3">
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
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="status_kawin" class="col-sm-3 col-form-label input-label">Status Perkawinan</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="status_kawin" required>
                                    <option selected="option" disabled="selected" value="">--pilih Status
                                        Pernikahan--</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="pekerjaan" class="col-sm-3 col-form-label input-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="pekerjaan"
                                    placeholder="" value="">
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="alamat" class="col-sm-3 col-form-label input-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="alamat"
                                    placeholder="" value="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="pendidikan_terakhir" class="col-sm-3 col-form-label input-label">Pendidikan Terakhir</label>
                            <div class="col-sm-3">
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
                        </div>
                    </div>
                    <!-- End Body -->
                <?php } else {
                        foreach ($profile as $p): ?>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label input-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="tempat_lahir"
                                    placeholder="" value="<?= $p->tmpt_lahir_prof ?>">
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label input-label">Tanggal Lahir</label>
                            <div class="col-sm-2">
                                <input type="date" required autocomplete="off" class="form-control" name="tanggal_lahir"
                                    placeholder="13/01/2002" value="<?= $p->tgl_lahir_prof ?>">
                            </div>
                        </div>
                        <!-- End Form Group -->
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label input-label">Jenis Kelamin</label>

                            <div class="col-sm-9">
                                <div class="input-group input-group-sm-down-break">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" <?= ($p->jk_prof === "Laki-Laki") ? 'checked' : '' ?>
                                                value="Laki-Laki" class="custom-control-input" name="jenis_kelamin"
                                                id="userAccountTypeRadio1">
                                            <label class="custom-control-label" for="userAccountTypeRadio1">Laki-Laki</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" <?= ($p->jk_prof === "Perempuan") ? 'checked' : '' ?>
                                                value="Perempuan" class="custom-control-input" name="jenis_kelamin"
                                                id="userAccountTypeRadio2">
                                            <label class="custom-control-label" for="userAccountTypeRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="golongan_darah" class="col-sm-3 col-form-label input-label">Golongan darah</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="golongan_darah" required>
                                    <option selected="option" disabled="selected" value="">--pilih Golongan Darah--
                                    </option>
                                    <option value="A" <?= ($p->goldar_prof == 'A') ? 'selected' : '' ?>>A</option>
                                    <option value="B" <?= ($p->goldar_prof == 'B') ? 'selected' : '' ?>>B</option>
                                    <option value="AB" <?= ($p->goldar_prof == 'AB') ? 'selected' : '' ?>>AB</option>
                                    <option value="O" <?= ($p->goldar_prof == 'O') ? 'selected' : '' ?>>O</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="agama" class="col-sm-3 col-form-label input-label">Agama</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="agama" required>
                                    <option selected="option" disabled="selected" value="">--pilih Agama--</option>
                                    <option value="Islam" <?= ($p->agama_prof == 'Islam') ? 'selected' : '' ?>>
                                        Islam</option>
                                    <option value="Katolik" <?= ($p->agama_prof == 'Katolik') ? 'selected' : '' ?>>Katolik
                                    </option>
                                    <option value="Kristen" <?= ($p->agama_prof == 'Kristen') ? 'selected' : '' ?>>Kristen
                                    </option>
                                    <option value="Hindu" <?= ($p->agama_prof == 'Hindu') ? 'selected' : '' ?>>
                                        Hindu</option>
                                    <option value="Budha" <?= ($p->agama_prof == 'Budha') ? 'selected' : '' ?>>
                                        Budha</option>
                                    <option value="Konghucu" <?= ($p->agama_prof == 'Konghucu') ? 'selected' : '' ?>>
                                        Konghucu
                                    </option>
                                    <option value="Kepercayaan" <?= ($p->agama_prof == 'Kepercayaan') ? 'selected' : '' ?>>
                                        Kepercayaan</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="status_kawin" class="col-sm-3 col-form-label input-label">Status Perkawinan</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="status_kawin" required>
                                    <option selected="option" disabled="selected" value="">--pilih Status
                                        Pernikahan--</option>
                                    <option value="Belum Menikah" <?= ($p->kawin_prof == 'Belum Menikah') ? 'selected' : '' ?>>
                                        Belum Menikah</option>
                                    <option value="Menikah" <?= ($p->kawin_prof == 'Menikah') ? 'selected' : '' ?>>Menikah
                                    </option>
                                    <option value="Duda" <?= ($p->kawin_prof == 'Duda') ? 'selected' : '' ?>>Duda
                                    </option>
                                    <option value="Janda" <?= ($p->kawin_prof == 'Janda') ? 'selected' : '' ?>>
                                        Janda</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="pekerjaan" class="col-sm-3 col-form-label input-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="pekerjaan"
                                    placeholder="" value="<?= $p->pekerjaan_prof ?>">
                            </div>
                        </div>
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="alamat" class="col-sm-3 col-form-label input-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" required autocomplete="off" class="form-control" name="alamat"
                                    placeholder="" value="<?= $p->alamat_prof ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="pendidikan_terakhir" class="col-sm-3 col-form-label input-label">Pendidikan Terakhir</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="pendidikan_terakhir" required>
                                    <option selected="option" disabled="selected" value="">--pilih Pendidikan--
                                    </option>
                                    <option value="SD" <?= ($p->pnddk_terakhir_prof == 'SD') ? 'selected' : '' ?>>SD
                                    </option>
                                    <option value="SMP" <?= ($p->pnddk_terakhir_prof == 'SMP') ? 'selected' : '' ?>>SMP
                                    </option>
                                    <option value="SMA" <?= ($p->pnddk_terakhir_prof == 'SMA') ? 'selected' : '' ?>>SMA
                                    </option>
                                    <option value="D1" <?= ($p->pnddk_terakhir_prof == 'D1') ? 'selected' : '' ?>>D1
                                    </option>
                                    <option value="D2" <?= ($p->pnddk_terakhir_prof == 'D2') ? 'selected' : '' ?>>D2
                                    </option>
                                    <option value="D3" <?= ($p->pnddk_terakhir_prof == 'D3') ? 'selected' : '' ?>>D3
                                    </option>
                                    <option value="D4" <?= ($p->pnddk_terakhir_prof == 'D4') ? 'selected' : '' ?>>D4
                                    </option>
                                    <option value="S1" <?= ($p->pnddk_terakhir_prof == 'S1') ? 'selected' : '' ?>>S1
                                    </option>
                                    <option value="S2" <?= ($p->pnddk_terakhir_prof == 'S2') ? 'selected' : '' ?>>S2
                                    </option>
                                    <option value="S3" <?= ($p->pnddk_terakhir_prof == 'S3') ? 'selected' : '' ?>>S3
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End Body -->
                <?php endforeach; ?>

            <?php } ?>
            <!-- Footer -->
            <div class="card-footer d-flex justify-content-end align-items-center">
                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fa fa-pencil"></i> Update Profile
                </button>
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
</div>
</form>
</div>

<!-- <pre>
    <?php echo print_r($profile); ?>
</pre> -->
<script>
    $('.js-file-attach').each(function () {
        var customFile = new HSFileAttach($(this)).init();
    });
</script>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <?php if ($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success_message'); ?>
    </div>
<?php endif; ?>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">
          <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Reservasi Pendaftaran MCU Online </h1>
                            </div>  
                                      
                            <form action="<?php echo base_url()?>PdaftarUmum/register" method="post" class="user">
                           
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>Nomor KTP / Paspor</p>
                                            <input type="number" class="form-control" name="ktp"required >
                                    </div>
                                    <div class="col-sm-6">                                       
                                            <p>Nama Lengkap</p>
                                            <input type="text" class="form-control" name="user_name" required >
                                            <input type="hidden" class="form-control" name="pendaftar" required 
                                            value=<?php echo $this->session->userdata('name'); ?>>                                            
                                    </div>
                                        </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>Tanggal Lahir</p>
                                            <input type="date" class="form-control" name="tgl_lahir"required
                                                placeholder="Isikan tanggal lahir anda">                                      
                                    </div>
                                    <div class="col-sm-6"> 
                                            <p>Jenis Kelamin</p>
                                                <select class="form-control" name="kelamin" required >
                                                    <option value="">--pilih Jenis Kelamin--</option>
                                                    <option value="laki-laki">Laki - laki</option> 
                                                    <option value="perempuan">perempuan</option>                                                                                                 
                                                </select>        
                                    </div>
                                    </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>Agama</p>
                                                <select class="form-control" name="agama" required >
                                                    <option value="">--pilih Agama--</option>
                                                    <option value="islam">Islam</option> 
                                                    <option value="Khatolik">Katolik</option> 
                                                    <option value="Kristen ">Kristen</option> 
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option> 
                                                    <option value="konghucu">Konghucu</option>
                                                    <option value="kepercayaan">Kepercayaan</option>                                                                                                                                                         
                                                </select>                                                    
                                        </div>
                                        <div class="col-sm-6">
                                        <p>Status Perkawinan</p>
                                                <select class="form-control" name="kawin" required >
                                                    <option value="">--pilih status--</option>
                                                    <option value="kawin">Kawin</option> 
                                                    <option value="belum kawin">Belum Kawin</option> 
                                                    <option value="janda ">janda</option> 
                                                    <option value="duda">Duda</option>
                                                </select>                                              
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>Pekerjaan</p>
                                                <select class="form-control" name="pekerjaan" required >
                                                    <option value="">--pilih pekerjaan--</option>
                                                    <option value="belum kerja">belum kerja</option> 
                                                    <option value="PNS">PNS</option> 
                                                    <option value="TNI / Polri">TNI / Polri</option> 
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Wiraswasta">Wirawasta</option>
                                                    <option value="Pensiunan">Pensiunan</option>
                                                    <option value="Ibu Rumah Tangga">Ibu Rumag Tangga</option>
                                                    <option value="Lain-lain">lain-lain</option>

                                                </select>                                      
                                        </div>
                                
                                        <div class="col-sm-6">
                                            <p>Perusahaan Pengirim</p>
                                            <input type="text" class="form-control " name="perusahaan"required
                                                value="-">                                         
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>Alamat Lengkap</p>
                                            <input type="text" class="form-control " name="alamat"required
                                                placeholder="isikan alamat lengkap">                                         
                                        </div>

                                        <div class="col-sm-6">
                                            <p>Nomor Handphone</p>
                                            <input type="text" class="form-control " name="hp"required
                                                placeholder="isikan nomor yang aktif ">                                         
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Nomor Registrasi</p>
                                    <input type="text" class="form-control " name="reg" required
                                    readonly="" value="<?= $reg; ?>">                                         
                                </div><br>
                                </div><br>
                                <div class="table-responsive">                                
                                                        <table class="table table-bordered table-striped">                                   
                                                            <thead>
                                                                <tr>
                                                                
                                                                <th>Tanggal  Reservasi</th>
                                                                <th>Rencana Tanggal MCU</th>                                                              	                       
			                                                    <th>Paket MCU</th>
			                                                    <th>Cara Pembayaran</th>    		                                                        
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>                                                               
                                                               
                                                            <td class="text-center" width="15%">
                                                            <input type="text" class="form-control" id="tanggalReservasi" name="reservasi" value="<?php echo date('d/m/y'); ?>" readonly>
                                                                 <td class="text-center" width="15%"><input type="date" class="form-control" name="tgl_mcu" required> </td>
                                                                 <td class="text-center" width="35%"> 
                                                                    <select class="form-control" name='namapaket'required > 
                                                                        <option value="">--pilih paket--</option>
                                                                        <?php foreach($paket as $u) :?>               
		                                                                <option value ="<?php echo $u->namapaket ?>"><?php echo $u->namapaket ?></option>                                     
		                                                                <?php endforeach ?> 
                                                                     </select>
                                                                </td>
                                                                 <td class="text-center" width="30"> <select class="form-control" name="bayar" required >
                                                                    <option value="">--pilih--</option>
                                                                    <option value="bayar sendiri">Bayar Sendiri</option>
                                                                    <option value="perusahaan">Perusahaan</option>
                                                                    <option value="asuransi">Asuransi</option>                                                                                                            
                                                                 </select></td>
                                                            </tr>                                     
                                                            </tbody>                                 
                                                        </table>
                   
                               
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                Simpan
                                </button>
                                <hr>
                                
                            </form>
                            
                             <div class="text-center">
                                <a class="small" href="<?= base_url();?>admin">kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

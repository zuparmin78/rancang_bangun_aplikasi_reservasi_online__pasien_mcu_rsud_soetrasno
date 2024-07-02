<div class="container-fluid">
                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h5 class="h5 mb-0 text-gray-800"><b> <?php echo $title ?></b> </h5>                           
    </div>
    <div class="card mb-3">
            <div class="card-header bg-success text-white">                
                <marquee scrolldelay="100"> Informasi  Pendaftar MCU </marquee>  
            </div>
            <div class="card-body">
                <form class = "form-inline"> 
                        <div class="form-roup-mb-2 ml-3">                                               
                            <input type='date' class="form-control" name="tanggal"required ></input>                                                   
                        </div>                                           
                        <button type="submit" class="btn btn-primary mb-2 ml-auto "><i class="fa fa-eye"></i>Tampilkan</button>
                        <a href="<?= base_url();?>DaftarReservasi" class="btn btn-success mb-2 ml-2 "> <i class="fa fa-refresh"></i>refresh</a>                                            
                </form> 
            </div>
            <?php                            
                if( (isset($_GET['tanggal'])  && $_GET['tanggal']!='')){
                    $tanggal = $_GET['tanggal'];                                      
                    $bakti = $tanggal;
                }else{                                      
                        $tanggal = date('d M Y');                                     
                        $bakti   = $tanggal;
                }
            ?>
            <div class="alert alert-info">
                Pendaftaran Onine Tanggal :<span class="font-weight-bold"><?php echo $tanggal?> </span>                                    
            </div>
            <div class="card-body">
                <div class="table-responsive">                                
                    <table class="table table-bordered"  width="100%" cellspacing="0">                                   
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nomor Registrasi</th>
                            <th> Nomor NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Langgal lahir</th>			                       
                            <th>Jenis Kelamin </th>
                            <th>Alamat </th>
                            <th>Nomor Hp</th> 
                            <th>Paket MCU yang di pilih</th>
                            <th>Cara Pembayaran</th>    		                              
                            <!--<th>Option</th> --> 		
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach($rekap as $u){ 
                    ?>
                    <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $u->reservasi?></td>
                            <td><?php echo $u->reg ?></td>
                            <td><?php echo $u->nik ?></td>
                            <td><?php echo $u->nama ?></td>			                            
                            <td><?php echo $u->tgl_lahir ?></td>
                            <td><?php echo $u->kelamin ?></td>
                            <td><?php echo $u->alamat?></td>                                    
                            <td><?php echo $u->hp ?></td> 
                            <td><?php echo $u->namapaket ?></td>
                            <td><?php echo $u->bayar ?></td>				                       
                        <!--                       
                            <td class="text-center">                
                                <a href="<?= base_url('DaftarReservasi/edit').'/'.$u->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                <a onclick="return confirmDialog()" class="btn btn-danger btn-sm" href="<?= base_url('DaftarReservasi/hapus').'/'.$u->id ?>">
                        <i class="fa fa-trash"></i></a> 
                            </td>-->
                    </tr>
                    <?php                                     
                    }?>                              
                    </tbody>
                </table>
                </div>
    </div>   
</div>
<!-- komen hapus -->
<script>
            function confirmDialog() {
            return confirm('Apakah anda yakin akan menghapus data yang dipilih ini?')
            }  
</script>                                
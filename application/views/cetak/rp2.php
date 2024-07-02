<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHE||cetak</title>
    <link rel="icon" href="assets/images/rsu.ico" type="image/x-icon">
    <header >      
    <table >
         <tr>
            <td rowspan="2"><img src="<?php echo base_url() ?>bahan/dist/img/soetrasno.png" ></td>
                
        </tr>
       
    </table>
    <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span><H5><b>Laporan Pendaftaran MCU </b></H5></span>
            </div>
    
    </header>
    <br>
  </head>

<body>  
    
<?php
    if((isset($_GET['namapaket'])&& $_GET['namapaket']!='') && 
        (isset($_GET['first_date'])  && $_GET['first_date']!='') && 
        (isset($_GET['second_date'])  && $_GET['second_date']!='')){
            $namapaket = $_GET['namapaket'];
            $first_tanggal = $_GET['first_date'];
            $second_tanggal = $_GET['second_date']; 
            $tampilkan = $namapaket;                       
                        
    }else{
            $namapaket  = 'tidak ada namapaket di pilih';
            $first_tanggal  = 'tidak ada Tanggal di pilih';  
            $second_tanggal  = 'tidak ada Tanggal di pilih';
            $tampilkan = $namapaket;
    }
?>
                              
<table class="" id="" width="" cellspacing="0">
        <thead>
                                              
            <tr>
                <td>Nama Paket </td>
                <td>:</td>
                <td><?php echo $namapaket?></td>
            </tr>  
        </thead>                                           
                        
<table border = "1" cellpadding="10">                                
     <thead>
        <tr>
            <th>Tanggal Reservasi</th>
            <th>Nomor Registrasi</th>
            <th>Tanggal MCU</th>
            <th> Nomor KTP/ Paspor</th>
            <th>Nama Lengkap</th>
            <th>Langgal lahir</th>			                       
            <th>Jenis Kelamin </th>
            <th>Alamat </th>
            <th>Nomor Hp</th>                                      
            <th>Cara Pembayaran</th>  
		</tr>
     </thead>
     <tbody><br>
        <?php
       

	foreach($cetak as $u){ ?>
		<tr>			                          
        <td><?php echo $u->reservasi?></td>
                                        <td><?php echo $u->tgl_mcu?></td>
                                        <td><?php echo $u->reg ?></td>                                       
                                        <td><?php echo $u->ktp ?></td>
                                        <td><?php echo $u->user_name ?></td>			                            
                                        <td><?php echo $u->tgl_lahir ?></td>
                                        <td><?php echo $u->kelamin ?></td>
                                        <td><?php echo $u->alamat?></td>                                    
                                        <td><?php echo $u->hp ?></td>                                       
                                        <td><?php echo $u->bayar ?></td>	
		</tr>
        <?php
        
        
     }?> 			                                                 
    </tbody>
    <tbody>
       
       
    </tbody>                     
</table> <br> 
<table width="100%">
                <tr>
                    <td></td>
                    <td width="200px">
                    <p> Yogyakarta,<?php echo date("d M Y")?> <br> Ka.Instalasi Rekam Medis<p>
                        <br>
                        <br>
                        <p>__________________________</p>
                    </td>                    
                </tr>
            </table>               
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright &copy; G41221664 2024</span>
            </div>
        </div>
    </footer>
         
    <script type="text/javascript">        
        window.print();
    </script>
</body>
</html>
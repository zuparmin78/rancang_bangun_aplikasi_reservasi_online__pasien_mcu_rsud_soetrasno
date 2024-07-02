<?php 

class M_laporan extends CI_Model {

    function tampil_data(){
		return $this->db->get('daftar');
	}

    function Bataldaftar($where=''){
        return $this->db->query('SELECT * FROM daftar WHERE aprove = "0"');
    } 

    function Tdaftar1($where=''){
            return $this->db->query('SELECT * FROM daftar WHERE aprove = "1"');
    } 


    function filter_data($namapaket, $first_tanggal, $second_tanggal){
            $query = $this->db->query("SELECT * FROM `daftar` WHERE `tgl_mcu` BETWEEN '$first_tanggal' AND '$second_tanggal' AND `namapaket`
            LIKE '$namapaket' ");
            return $query->result();
    }

    function filter_tanggal($first_tanggal, $second_tanggal){
        $query = $this->db->query("SELECT * FROM `daftar` WHERE `tgl_mcu` BETWEEN '$first_tanggal' AND '$second_tanggal'");
        return $query->result();
}


    function Tsandi($where=''){
            return $this->db->query("select * from pelanggan  $where;");
     }

    function Takun($where=''){
            return $this->db->query('SELECT * FROM pelanggan WHERE level= "pengunjung"');
     } 
  
    function Tpaket1($where=''){
        return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "mcu dasar I"');
    } 
    
    function Tpaket2($where=''){
        return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "mcu dasar II"');
    }
    
    function Tpaket3($where=''){
        return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "mcu dasar III"');
    } 

    function Tpaket4($where=''){
        return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "mcu dasar IV"');
    } 

    function Tpaketparu($where=''){
    return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "Pemeriksaan Paru"');
    }

    function Tpaketjantung($where=''){
    return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "Pemeriksaan jantung"');
    } 

    function Tpaketjiwa($where=''){
    return $this->db->query('SELECT * FROM paket_mcu WHERE namapaket= "Pemeriksaan jiwa"');
    } 

}

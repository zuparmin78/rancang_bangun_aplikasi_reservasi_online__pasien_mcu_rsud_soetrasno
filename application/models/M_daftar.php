<?php 

class M_daftar extends CI_Model {


    function tampil_data(){
		return $this->db->get('daftar');
	}

    public function cek_data_exist($ktp, $tgl_mcu) {
        // Pemeriksaan apakah data dengan ID yang sama sudah ada
        $this->db->where('ktp', $ktp);
        $this->db->where('tgl_mcu', $tgl_mcu);
        $query = $this->db->get('daftar');
        return $query->num_rows() > 0;
    }

    public function cek_data_exist_umum($ktp, $tgl_mcu) {
        // Pemeriksaan apakah data dengan ID yang sama sudah ada
        $this->db->where('ktp', $ktp);
        $this->db->where('tgl_mcu', $tgl_mcu);
        $query = $this->db->get('daftar');
        return $query->num_rows() > 0;
    }

    function input_data($data,$table){
        $this->db->insert($table,$data);
        }

    function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
     
    function edit_data($where,$table){		
            return $this->db->get_where($table,$where);
        }
       
     
    function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        } 
    
        function generateKode()
        {
            // Mendapatkan tanggal saat ini
            $tanggalSekarang = date("Y-m-d");
        
            // Mendapatkan tanggal terakhir dari database atau dari session
            $tanggalTerakhir = $this->session->userdata('tanggal_terakhir'); // Ganti dengan sumber tanggal terakhir yang sesuai
        
            // Periksa apakah tanggal saat ini berbeda dengan tanggal terakhir
            if ($tanggalSekarang != $tanggalTerakhir) {
                // Jika berbeda, atur nomor registrasi kembali ke 1
                $reg = 1;
            } else {
                // Jika sama, lanjutkan nomor registrasi sebelumnya
                $this->db->select('RIGHT(reg,6) as reg', false);
                $this->db->order_by("reg", "DESC");
                $this->db->limit(1);
                $query = $this->db->get('daftar');
        
                // CEK JIKA DATA ADA
                if ($query->num_rows() <> 0) {
                    $data = $query->row(); // ambil satu baris data
                    $reg = intval($data->reg) + 1; // tambah 1
                } else {
                    $reg = 1; // isi dengan 1
                }
            }
        
            $lastKode = str_pad($reg, 6, "0", STR_PAD_LEFT);
            $tahun = date("Ymd"); // Mendapatkan tahun sekarang dalam format angka           
            $reg = "REG";
        
            $newKode = $reg . $tahun . $lastKode;
        
            // Simpan tanggal terakhir ke database atau session
            $this->session->set_userdata('tanggal_terakhir', $tanggalSekarang); // Ganti dengan penyimpanan tanggal terakhir yang sesuai
        
            return $newKode; // return kode baru
        }

        function filter_data($namapaket, $first_tanggal, $second_tanggal){
            $query = $this->db->query("SELECT * FROM `daftar` WHERE `tgl_mcu` BETWEEN '$first_tanggal' AND '$second_tanggal' AND `namapaket`
            LIKE '$namapaket' ");
            return $query->result();
    }


         
        
}

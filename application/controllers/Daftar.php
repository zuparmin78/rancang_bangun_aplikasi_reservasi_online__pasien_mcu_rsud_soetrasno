<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct()   {
		parent::__construct();
		$this->load->helper("url");
        $this->load->library('form_validation');
		$this->load->model('M_daftar');
        $this->load->model('M_paket');

        if($this->session->userdata('logged') !=TRUE){
            $url=base_url('masuk');
            redirect($url);
		};
        
		}   

	public function index()	{
        $this->load->model("M_daftar", "Mgenerate");
        $data['paket'] = $this->M_paket->tampil_data()->result();
        $data['reg']  = $this->Mgenerate->generateKode();

        if((isset($_GET['nik'])  && $_GET['nik']!='')){                                       
              $nik    = $_GET['nik'];             
              $pilih  =$nik;
      }else{  
        $nik  = 'tidak ada data'; 
        $pilih  =$nik;                         
             
     }

     $data['tampil'] = $this->db->query("SELECT profileTamu.*
     FROM profiletamu      
     WHERE profiletamu.nik='$pilih' 
     ORDER BY profiletamu.nik ASC")->result();
		$this->load->view('tamu/D_daftar',$data);
	}

   
     public function register(){
        $nik           =$this->input->post('nik');
        $user_name     =$this->input->post('user_name');
        $tgl_lahir     =$this->input->post('tgl_lahir');
        $kelamin       =$this->input->post('kelamin');
        $agama         =$this->input->post('agama');
        $kawin         =$this->input->post('kawin');
        $pekerjaan     =$this->input->post('pekerjaan');
        $alamat        =$this->input->post('alamat');
        $hp            =$this->input->post('hp');
        $reg           =$this->input->post('reg');
        $reservasi     =$this->input->post('reservasi' );
        $tgl_mcu       =$this->input->post('tgl_mcu');
        $namapaket     =$this->input->post('namapaket');
        $bayar         =$this->input->post('bayar');
       
		        
        $data = array (
            'nik'           => $nik,
            'user_name'     => $user_name,
            'tgl_lahir'     => $tgl_lahir,
            'kelamin'       => $kelamin,
            'agama'         => $agama,
            'kawin'         => $kawin,
            'pekerjaan'     => $pekerjaan,
            'alamat'        => $alamat,
            'hp'            => $hp,
            'reg'            => $reg,
            'reservasi'      => $reservasi,
            'tgl_mcu'        => $tgl_mcu,
            'namapaket'      => $namapaket,
            'bayar'          => $bayar,
              
                 
        );

        $this->M_daftar->input_data($data,'daftar');
       // $this->session->set_flashdata('success_message', 'Pendaftaran anda berhasil. Nomor Antrian anda: ' . $lastFourDigits);
        redirect('pengunjung');      
    }
}
?>
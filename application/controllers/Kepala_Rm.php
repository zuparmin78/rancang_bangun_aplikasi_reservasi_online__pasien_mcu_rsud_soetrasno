<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Kepala_Rm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_petugas');
		$this->load->model('M_profile');
		$this->load->database();
		$this->load->helper('url');

		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('masuk');
			redirect($url);
		}
		;
	}

	public function index()
	{
		$sad = $this->M_petugas->Tsandi();
		$sandi = $sad->num_rows();

		$pak = $this->M_petugas->Tpaket();
		$paket = $pak->num_rows();

		$kun = $this->M_petugas->Takun();
		$akun = $kun->num_rows();

		$dok = $this->M_petugas->Tdokter();
		$dokter = $dok->num_rows();

		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$data = array
		(

			'Jsandi' => $sandi,
			'Jpaket' => $paket,
			'Jakun' => $akun,
			'Jdokter' => $dokter,

		);
		$this->load->view('templates/navbar.php');
		$this->load->view('templates/sidebar.php', $prof);
		$this->load->view('A_kepala/V_kepala', $data);
		$this->load->view('templates/footer.php');
	}



}

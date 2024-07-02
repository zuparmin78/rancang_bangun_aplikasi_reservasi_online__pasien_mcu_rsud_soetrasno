<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Info_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_register');
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
		$data['title'] = "Data Pengguna";
		$data['pengguna'] = $this->M_register->tampil_data()->result();

		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();
		
		$data['foto'] = $this->M_profile->tampildata()->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('A_admin/LaporanAdmin', $data);
		$this->load->view('templates/footer');
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PilihPaketMcu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_periksa');
		$this->load->model('M_dokter');
		$this->load->model('M_profile');
		$this->load->database();
		$this->load->helper('url');

		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('masuk');
			redirect($url);
		} else if ($this->session->userdata('level') != 'pengunjung') {
			$url = base_url('utama');
			redirect($url);
		}

	}

	public function index()
	{
		$data['paket'] = $this->db->query("SELECT *
		FROM paket_mcu AS p
		LEFT JOIN (SELECT kodepaket, layanan, sum(harga) hargaL
		FROM periksa GROUP BY kodepaket) AS l ON l.kodepaket = p.kodepaket
		ORDER BY p.no_urut ASC")->result();

		$data['layanan'] = $this->M_periksa->lihat_data()->result();

		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$this->load->view('templates/navbar.php');
		$this->load->view('templates/sidebar.php', $prof);
		$this->load->view('A_pengunjung/pilihpaketmcu', $data);
		$this->load->view('templates/footer.php');
	}
}

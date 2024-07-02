<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_periksa');
		$this->load->model('M_dokter');
		$this->load->database();
		$this->load->helper('url');

		if ($this->session->userdata('level') === 'pengunjung') {
			$url = base_url('pengunjung');
			redirect($url);
		} else if ($this->session->userdata('level') === 'kepala rm') {
			$url = base_url('kepala_rm');
			redirect($url);
		} else if ($this->session->userdata('level') === 'administrator') {
			$url = base_url('administrator');
			redirect($url);
		} else if ($this->session->userdata('level') === 'petugas') {
			$url = base_url('petugas');
			redirect($url);
		}
	}
	public function index()
	{
		$data['paket'] = $this->db->query("SELECT *
		FROM paket_mcu AS p
		LEFT JOIN (SELECT kodepaket, layanan, sum(harga) hargaL, harga HR
		FROM periksa GROUP BY kodepaket) AS l ON l.kodepaket = p.kodepaket
		ORDER BY p.kodepaket ASC")->result();

		$data['layanan'] = $this->M_periksa->lihat_data()->result();
		$data['dokter'] = $this->M_dokter->tampil_keutama()->result();
		$data['galeri'] = $this->db->get('galeri_rs')->result();

		$this->load->view('naratama/utama_view', $data);
	}
}

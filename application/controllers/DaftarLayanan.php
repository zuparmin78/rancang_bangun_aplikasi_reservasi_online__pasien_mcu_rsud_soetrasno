<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class DaftarLayanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_paket');
		$this->load->model('M_periksa');
		$this->load->model('M_profile');
		$this->load->database();
		$this->load->helper('url');

		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('masuk');
			redirect($url);
		}
		;
	}

	public function cari_kode($id)
	{
		$data = $this->db->query("SELECT * FROM paket_mcu WHERE namapaket = '$id'")->result();
		return $data;
	}

	public function index()
	{
		$data['title'] = "Data Pemeriksaan MCU";
		$data['mcu'] = $this->M_paket->tampil_data()->result();
		$data['inputlayanan'] = $this->M_paket->tampil_data()->result_array();

		if ((isset ($_GET['namapaket']) && $_GET['namapaket'] != '')) {
			$namapaket = $_GET['namapaket'];
			$tampilkan = $namapaket;

		} else {
			if (!$this->session->flashdata('flash_namapaket') || $this->session->flashdata('flash_namapaket') == null) {
				$namapaket = 'tidak ada Paket MCU di pilih';
				$tampilkan = $namapaket;
			} else {
				$tampilkan = $this->session->flashdata('flash_namapaket');
			}
		}

		$data['rekap'] = $this->db->query("SELECT periksa.*,
		paket_mcu.kodepaket,
		paket_mcu.namapaket
		FROM periksa
		INNER JOIN paket_mcu ON periksa.kodepaket = paket_mcu.kodepaket
		WHERE periksa.namapaket = '$tampilkan'
		ORDER BY periksa.namapaket ASC")->result();

		$data['layanan'] = $this->db->query("SELECT sum(harga) hargaL
		FROM periksa AS p
		WHERE p.namapaket = '$tampilkan'")->result();

		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('A_admin/laporanLayanan', $data);
		$this->load->view('templates/footer');

	}

	public function register()
	{
		$kodepaket = $this->input->post('kodepaket');
		$namapaket = $this->input->post('namapaket');
		$layanan = $this->input->post('layanan');
		$harga = $this->input->post('harga');

		$data = array(
			'kodepaket' => $kodepaket,
			'namapaket' => $namapaket,
			'layanan' => $layanan,
			'harga' => $harga,
		);

		$res = $this->M_periksa->input_data($data, 'periksa');
		if ($res == false) {
			$this->session->set_flashdata('flash_namapaket', $namapaket);
			$this->session->set_flashdata('sukses', "Ditambahkan");
			redirect('DaftarLayanan');
		} else {
			$this->session->set_flashdata('flash_namapaket', $namapaket);
			$this->session->set_flashdata('gagal', "Ditambahkan");
			redirect('DaftarLayanan');
		}

	}

	public function update()
	{
		$id = $this->input->post('id');
		$layanan = $this->input->post('layanan');
		$harga = $this->input->post('harga');
		$namapaket = $this->input->post('namapaket');

		$data = array(
			'layanan' => $layanan,
			'harga' => $harga,
		);

		$where = array('id_periksa' => $id);
		$res = $this->M_periksa->update_data($where, $data, 'periksa');
		if ($res == false) {
			$this->session->set_flashdata('flash_namapaket', $namapaket);
			$this->session->set_flashdata('sukses', "Diupdate");
			redirect('DaftarLayanan');
		} else {
			$this->session->set_flashdata('flash_namapaket', $namapaket);
			$this->session->set_flashdata('gagal', "Diupdate");
			redirect('DaftarLayanan');
		}
	}


	function hapus()
	{
		$id = $this->input->get('var1');
		$namapaket = $this->input->get('var2');

		$where = array('id_periksa' => $id);
		$res = $this->M_periksa->hapus_data($where, 'periksa');
		if ($res == false) {
			$this->session->set_flashdata('flash_namapaket', $namapaket);
			$this->session->set_flashdata('sukses', "Dihapus");
			redirect('DaftarLayanan');
		} else {
			$this->session->set_flashdata('flash_namapaket', $namapaket);
			$this->session->set_flashdata('gagal', "Dihapus");
			redirect('DaftarLayanan');
		}
	}


}

<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class DaftarPaket extends CI_Controller
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

	public function index()
	{
		$data['title'] = "Data Paket MCU";
		$data['paket'] = $this->db->query("SELECT *
		FROM paket_mcu AS p
		LEFT JOIN (SELECT kodepaket, layanan, sum(harga) hargaL
		FROM periksa GROUP BY kodepaket) AS l ON l.kodepaket = p.kodepaket
		ORDER BY p.kodepaket ASC")->result();
		
		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('A_admin/laporanPaket', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$kodepaket = preg_replace('/\s+/', '', $this->input->post('kodepaket'));
		$namapaket = $this->input->post('namapaket');

		$count_row = $this->db->get('paket_mcu')->num_rows();

		$data = array(
			'kdpaket' => $kodepaket,
			'no_urut' => $count_row + 1,
			'kodepaket' => $kodepaket,
			'namapaket' => $namapaket,
		);

		$res = $this->M_paket->input_data($data, 'paket_mcu');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Ditambahkan");
			redirect('DaftarPaket');
		} else {
			$this->session->set_flashdata('gagal', "Ditambahkan");
			redirect('DaftarPaket');
		}

	}

	public function update()
	{
		$id = $this->input->post('id');
		$kodepaket = $this->input->post('kodepaket');
		$namapaket = $this->input->post('namapaket');

		$data = array(
			'kdpaket' => $kodepaket,
			'kodepaket' => $kodepaket,
			'namapaket' => $namapaket,
		);
		$datalayanan = array(
			'namapaket' => $namapaket
		);
		$wherelayanan = array('kodepaket' => $kodepaket);
		$where = array('id_paket' => $id);

		$this->M_periksa->update_data($wherelayanan, $datalayanan, 'periksa');
		$res = $this->M_paket->update_data($where, $data, 'paket_mcu');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Diubah");
			redirect('DaftarPaket');
		} else {
			$this->session->set_flashdata('gagal', "Diubah");
			redirect('DaftarPaket');
		}
	}



	function hapus($id)
	{
		$where = array('id_paket' => $id);
		$res = $this->M_paket->hapus_data($where, 'paket_mcu');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Dihapus");
			redirect('DaftarPaket');
		} else {
			$this->session->set_flashdata('gagal', "Dihapus");
			redirect('DaftarPaket');
		}
	}


}

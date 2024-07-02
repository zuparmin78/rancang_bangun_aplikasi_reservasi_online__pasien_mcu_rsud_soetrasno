<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarPembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
		$this->load->model('M_profile');
		$params = array('server_key' => 'SB-Mid-server-o02Rba93d7rJnLYGRj6luARR', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
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
		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		if ($this->session->userdata('level') === 'pengunjung') {

			if ((isset($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
				$mindate = $_GET['min_tanggal'] . ' 00:00:01';
				$maxdate = $_GET['max_tanggal'] . ' 23:59:59';

			} else {
				$mindate = 'Tidak Ada';
				$maxdate = 'Tidak Ada';
			}

			$find = $this->M_pembayaran->search_order_id($this->session->userdata('id'), $mindate, $maxdate)->result();
			$hasil = [];
			foreach ($find as $f) {
				$hasil[] = json_decode(json_encode($this->midtrans->status($f->order_id)), true);
			}
			$dataP['title'] = "Data Pembayaran MCU";
			$dataP['datamidtrans'] = $hasil;
			$dataP['bayar'] = $this->db->select('*')
				->from('pembayaran p')
				->join('paket_mcu m', 'm.kodepaket=p.kodepaket', 'left')
				->where('id_pelanggan', $this->session->userdata('id'))
				->where('transaction_time >=', $mindate)
				->where('transaction_time <=', $maxdate)
				->order_by('p.transaction_time', 'desc')
				->get()->result();

			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_pengunjung/laporanPembayaran', $dataP);
			$this->load->view('templates/footer');
		} else {
			if ((isset($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
				$mindate = $_GET['min_tanggal'];
				$maxdate = $_GET['max_tanggal'];

			} else {
				$mindate = 'Tidak Ada';
				$maxdate = 'Tidak Ada';
			}
			$find1 = $this->M_pembayaran->search_order_idALL($mindate, $maxdate)->result();
			$hasilALL = [];
			foreach ($find1 as $f) {
				$hasilALL[] = json_decode(json_encode($this->midtrans->status($f->order_id)), true);
			}

			$data['title'] = "Data Pembayaran MCU";
			$data['datamidtrans'] = $hasilALL;
			$data['bayar'] = $this->M_pembayaran->tampil_data($mindate, $maxdate)->result();

			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_admin/laporanPembayaran', $data);
			$this->load->view('templates/footer');
		}
	}
}
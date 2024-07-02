<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class DaftarPasienTerkonfirmasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_reservasi');
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
			$find = $this->M_reservasi->search_order_id($this->session->userdata('id'))->result();
			$hasil = [];
			foreach ($find as $f) {
				$hasil[] = json_decode(json_encode($this->midtrans->status($f->id_order)), true);
			}

			$dataP['title'] = "Data Reservasi MCU";
			$dataP['datamidtrans'] = $hasil;
			$dataP['reservasi'] = $this->db->select('*')
				->from('reservasi r')
				->join('paket_mcu m', 'm.kodepaket=r.kode_paket', 'left')
				->join('pembayaran p', 'p.order_id=r.id_order', 'left')
				->join('pasien_mcu pm', 'pm.id=r.id_pasien', 'left')
				->where('r.id_pelanggan', $this->session->userdata('id'))
				->get()->result();

			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_pengunjung/laporanPasienReservasi', $dataP);
			$this->load->view('templates/footer');
		} else {
			if ((isset ($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset ($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
				$mindate = $_GET['min_tanggal'];
				$maxdate = $_GET['max_tanggal'];

			} else {
				$mindate = 'Tidak Ada';
				$maxdate = 'Tidak Ada';
			}

			$find1 = $this->M_reservasi->search_order_idALL($mindate, $maxdate)->result();
			$hasilALL = [];
			foreach ($find1 as $f) {
				$hasilALL[] = json_decode(json_encode($this->midtrans->status($f->id_order)), true);
			}

			$data['title'] = "Data Pasien MCU Terkonfirmasi";
			$data['datamidtrans'] = $hasilALL;
			$data['reservasi'] = $this->M_reservasi->tampil_data_konfrimasi($mindate, $maxdate)->result();

			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_admin/laporanPasienTerkonfirmasi', $data);
			$this->load->view('templates/footer');
		}
	}
}
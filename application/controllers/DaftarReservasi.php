<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarReservasi extends CI_Controller
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
		// $dataS['title'] = "Data Reservasi MCU";
		// $dataS['reservasi'] = $this->M_reservasi->tampil_data_petugas()->result();

		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		if ($this->session->userdata('level') === 'pengunjung') {
			if ((isset($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
				$mindate = $_GET['min_tanggal'];
				$maxdate = $_GET['max_tanggal'];

			} else {
				$mindate = 'Tidak Ada';
				$maxdate = 'Tidak Ada';
			}
			$find = $this->M_reservasi->search_order_id($this->session->userdata('id'), $mindate, $maxdate)->result();
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
				->where('tgl_kedatangan >=', $mindate)
				->where('tgl_kedatangan <=', $maxdate)
				->order_by('r.tgl_kedatangan', 'desc')
				->get()->result();

			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_pengunjung/laporanPasienReservasi', $dataP);
			$this->load->view('templates/footer');
			// } else if ($this->session->userdata('level') === 'petugas') {
			// 	$this->load->view('templates/navbar');
			// 	$this->load->view('templates/sidebar');
			// 	$this->load->view('A_admin/laporanPasienReservasi', $dataS);
			// 	$this->load->view('templates/footer');
		} else if ($this->session->userdata('level') === 'petugas' || $this->session->userdata('level') === 'administrator') {

			if ((isset($_GET['min_tanggal']) && $_GET['min_tanggal'] != '') && (isset($_GET['max_tanggal']) && $_GET['max_tanggal'] != '')) {
				$mindate = $_GET['min_tanggal'];
				$maxdate = $_GET['max_tanggal'];

			} else {
				if (!$this->session->flashdata('tglmin') || $this->session->flashdata('tglmin') == null || !$this->session->flashdata('tglmax') || $this->session->flashdata('tglmax') == null) {
					$mindate = 'Tidak Ada';
					$maxdate = 'Tidak Ada';
				} else {
					$mindate = $this->session->flashdata('tglmin');
					$maxdate = $this->session->flashdata('tglmax');
				}
			}

			$find1 = $this->M_reservasi->search_order_idALL($mindate, $maxdate)->result();
			$hasilALL = [];
			foreach ($find1 as $f) {
				$hasilALL[] = json_decode(json_encode($this->midtrans->status($f->id_order)), true);
			}

			$data['title'] = "Data Reservasi MCU";
			$data['datamidtrans'] = $hasilALL;
			$data['reservasi'] = $this->M_reservasi->tampil_data($mindate, $maxdate)->result();

			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_admin/laporanPasienReservasi', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('utama');
		}
	}

	public function konfirmasi()
	{
		$id = $this->input->get('var1');
		$tglmin = $this->input->get('var2');
		$tglmax = $this->input->get('var3');
		$where = array('id_reservasi' => $id);
		$datenow = date('Y-m-d');

		$no_registrasi = $this->db->select('*')->from('reservasi')->where('tgl_kedatangan', $datenow)->get()->num_rows();
		$nomor = $no_registrasi + 1;
		$reg = str_pad($nomor, 4, "0", STR_PAD_LEFT);

		$data = array(
			'tgl_kedatangan' => $tglmax,
			'no_antri' => $reg,
			'status_pasien' => 1,
		);
		$res = $this->M_reservasi->update_data($where, $data, 'reservasi');
		if ($res == false) {
			$this->session->set_flashdata('tglmin', $tglmin);
			$this->session->set_flashdata('tglmax', $tglmin);
			$this->session->set_flashdata('sukses', "Dikonfirmasi");
			redirect('DaftarReservasi');
		} else {
			$this->session->set_flashdata('tglmin', $tglmin);
			$this->session->set_flashdata('tglmax', $tglmin);
			$this->session->set_flashdata('gagal', "Dikonfirmasi");
			redirect('DaftarReservasi');
		}
	}
}
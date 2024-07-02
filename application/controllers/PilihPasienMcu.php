<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class PilihPasienMcu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pasien');
		$this->load->model('M_pembayaran');
		$this->load->model('M_reservasi');
		$this->load->model('M_periksa');
		$this->load->model('M_profile');
		$this->load->database();
		$params = array('server_key' => 'SB-Mid-server-o02Rba93d7rJnLYGRj6luARR', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');

		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('masuk');
			redirect($url);
		}
		;
	}

	public function index()
	{
		$kodepaket = $this->input->post('kodepaket');
		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();
		$cek_profil = $this->M_profile->cek_profil($this->session->userdata('id'));

		if ($kodepaket === NULL || $this->session->userdata('level') != 'pengunjung') {
			$this->session->set_flashdata('paket_tidak_ada', "Silahkan Pilih Paket Terlebih Dahulu");
			redirect('Pengunjung');
		} else if ($cek_profil < 1) {
			$this->session->set_flashdata('profil_ga_lengkap', "Silahkan Lengkapi Profil Terlebih Dahulu");
			redirect('Setting_Akun');
		} else {
			$dataP['title'] = "Pendaftaran Pasien MCU";
			$dataP['pasien'] = $this->db->select('*')->from('pasien_mcu')->where('id_pembuat', $this->session->userdata('id'))->get()->result();
			$dataP['pengguna_prof'] = $this->db->select('*')->from('pelanggan')->where('id', $this->session->userdata('id'))->get()->result();
			$dataP['paket'] = $this->db->query("SELECT *
			FROM paket_mcu AS p
			LEFT JOIN (SELECT kodepaket, layanan, sum(harga) hargaL
			FROM periksa GROUP BY kodepaket) AS l ON l.kodepaket = p.kodepaket
			WHERE p.kdpaket = '$kodepaket'
			ORDER BY p.kdpaket ASC")->result();
			$res = $this->db->select('*')->from('pasien_mcu')->where('id_pembuat', $this->session->userdata('id'))->get()->num_rows();
			if ($res <= 0) {
				redirect('DaftarPasien');
			} else {
				$this->load->view('templates/navbar');
				$this->load->view('templates/sidebar', $prof);
				$this->load->view('A_pengunjung/pilihpasienmcu', $dataP);
				$this->load->view('templates/footer');
			}
		}
	}

	public function register()
	{
		$layanan = $this->M_periksa->lihat_data()->result();

		$kodepaket_p = $this->input->post('kodepaket_p');
		$tanggal_periksa = $this->input->post('tanggal_periksa');
		$id_pembuat = $this->input->post('id_pembuat');
		$nama_l = $this->input->post('nama_l');
		$hp_pel = $this->input->post('hp_pel');
		$email_pel = $this->input->post('email_pel');
		$jumlah_harga = $this->input->post('jumlah_harga');
		$jumlah_pasien = $this->input->post('jumlah_pasien');
		$id_pasien = $this->input->post('id_pasien');
		$amount = $jumlah_harga * $jumlah_pasien;

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $amount, // no decimal allowed for creditcard
		);

		// // Optional
		// $item1_details = array(
		// 	'id' => 'a1',
		// 	'price' => $jumlah_harga,
		// 	'quantity' => 1,
		// 	'name' => "Apple"
		// );

		// // Optional
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 20000,
		// 	'quantity' => 2,
		// 	'name' => "Orange"
		// );
		$item_details = array();
		foreach ($layanan as $u) {
			if ($u->kodepaket === $kodepaket_p) {
				// Optional
				$item_details[] = [
					'id' => $u->id_periksa,
					'price' => $u->harga,
					'quantity' => $jumlah_pasien,
					'name' => $u->layanan
				];
			}
		}

		// // Optional
		// $billing_address = array(
		// 	'first_name' => "Andri",
		// 	'last_name' => "Litani",
		// 	'address' => "Mangga 20",
		// 	'city' => "Jakarta",
		// 	'postal_code' => "16602",
		// 	'phone' => "081122334455",
		// 	'country_code' => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		// 	'first_name' => "Obet",
		// 	'last_name' => "Supriadi",
		// 	'address' => "Manggis 90",
		// 	'city' => "Jakarta",
		// 	'postal_code' => "16601",
		// 	'phone' => "08113366345",
		// 	'country_code' => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name' => $nama_l,
			'email' => $email_pel,
			'phone' => $hp_pel,
			// 'billing_address' => $billing_address,
			// 'shipping_address' => $shipping_address
		);
		$custom_fields = array(
			'id_pelanggan' => $id_pembuat,
			'id_pasien' => $id_pasien,
			'kode_paket' => $kodepaket_p,
			'tgl_kedatangan' => $tanggal_periksa
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'hour',
			'duration' => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details' => $item_details,
			'customer_details' => $customer_details,
			'credit_card' => $credit_card,
			'expiry' => $custom_expiry,
			'metadata' => $custom_fields
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		$bta = $result['order_id'];
		$result2 = json_decode(json_encode($this->midtrans->status($bta)), true);
		$pasien_in = $result2['metadata']['id_pasien'];
		$cari_tanggal_datang = $result2['metadata']['tgl_kedatangan'];
		$tgl = new datetime($result2['metadata']['tgl_kedatangan']);
		$tgl_datang = $tgl->format('Ymd');

		$dataPembayaran = array(
			'order_id' => $result['order_id'],
			'transaction_id' => $result['transaction_id'],
			'kodepaket' => $result2['metadata']['kode_paket'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'id_pelanggan' => $result2['metadata']['id_pelanggan'],
		);

		// $dataReservasi = array();
		foreach ($pasien_in as $u) {
			$no_registrasi = $this->db->select('*')->from('reservasi')->where('tgl_kedatangan', $cari_tanggal_datang)->get()->num_rows();
			$nomor = $no_registrasi + 1;
			$reg = str_pad($nomor, 4, "0", STR_PAD_LEFT);
			$no_regis = 'MCU' . $tgl_datang . $reg;
			$dataReservasi = array(
				'no_reg' => $no_regis,
				'id_pasien' => $u,
				'tgl_kedatangan' => $result2['metadata']['tgl_kedatangan'],
				'no_antri' => $reg,
				'kode_paket' => $result2['metadata']['kode_paket'],
				'id_order' => $result['order_id'],
				'id_pelanggan' => $result2['metadata']['id_pelanggan'],
				'status_pasien' => 0,
			);
			$this->M_reservasi->input_data($dataReservasi, 'reservasi');
		}
		// echo $no_regis;
		$bayar = $this->M_pembayaran->input_data($dataPembayaran, 'pembayaran');
		if ($bayar == false) {
			$this->session->set_flashdata('isi_terserah_sukses', "Pendaftaran Berhasil");
			redirect('DaftarPembayaran');
		} else {
			$this->session->set_flashdata('isi_terserah_gagal', "Pendaftaran Gagal");
			redirect('DaftarPembayaran');
		}

	}
}
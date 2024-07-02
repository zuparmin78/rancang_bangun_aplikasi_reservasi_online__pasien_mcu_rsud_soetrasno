<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Ganti extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		/*load database libray manually*/
		$this->load->database();
		$this->load->library('session');
		$this->load->model('M_profile');
		/*load Model*/
		$this->load->helper('url');
		$this->load->model('Mmasuk');

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

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('Naratama/Ganti_view');
		$this->load->view('templates/footer');
	}

	public function aksi()
	{
		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();
		//variabel dari masing2 inputan
		$passbaru = $this->input->post('passbaru');
		$ulangpass = $this->input->post('ulangpass');

		$this->form_validation->set_rules('passbaru', 'password baru', 'required|matches[ulangpass]');
		$this->form_validation->set_rules('ulangpass', 'ulangi password', 'required');
		if ($this->form_validation->run() != FALSE) {
			$data = array(
				'user_password' => password_hash($passbaru, PASSWORD_DEFAULT)
			);
			$username = array(
				'id' => $this->session->userdata('id')
			);

			$this->Mmasuk->update_password($username, $data, 'pelanggan');
			$this->session->set_flashdata('isi_terserah_berhasil', 'Ganti Password Berhasil!');
			redirect('Ganti');
		} else {
			$this->session->set_flashdata('isi_terserah_gagal', 'Password tidak sama!');
			redirect('Ganti');
		}
	}
}


?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarPengguna extends CI_Controller
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

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('A_admin/laporanPengguna', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$ktp = $this->input->post('ktp');
		$user_name = $this->input->post('user_name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		$user_password = $this->input->post('user_password');
		$level = $this->input->post('level');
		$user_status = $this->input->post('user_status');

		$cek = $this->M_register->cek_username($username);

		if (!preg_match("/^[a-z-A-Z_\s\-.\-,]*$/", $user_name)) {
			$data = array(
				'ktp' => $ktp,
				'user_name' => $user_name,
				'email_pelanggan' => $email,
				'hp' => $hp,
				'username' => $username,
				'level' => $level,
			);
			$this->session->set_flashdata($data);
			$this->session->set_flashdata('isi_terserah_gagal', 'Nama Lengkap hanya boleh huruf!');
			redirect('DaftarPengguna');
		} else if ($cek > 0) {
			$data = array(
				'ktp' => $ktp,
				'user_name' => $user_name,
				'email_pelanggan' => $email,
				'hp' => $hp,
				'username' => $username,
				'level' => $level,
			);
			$this->session->set_flashdata($data);
			$this->session->set_flashdata('isi_terserah_gagal', 'Username telah digunakan!');
			redirect('DaftarPengguna');
		} else {
			$data = array(
				'ktp' => $ktp,
				'user_name' => $user_name,
				'email_pelanggan' => $email,
				'hp' => $hp,
				'username' => $username,
				'user_password' => password_hash($user_password, PASSWORD_DEFAULT),
				'level' => $level,
				'user_status' => $user_status,
			);

			$res = $this->M_register->input_data($data, 'pelanggan');
			if ($res == false) {
				$this->session->set_flashdata('sukses', "Ditambahkan");
				redirect('DaftarPengguna');
			} else {
				$this->session->set_flashdata('gagal', "Ditambahkan");
				redirect('DaftarPengguna');
			}
		}
	}

	function update()
	{
		$id = $this->input->post('id');
		$ktp = $this->input->post('ktp');
		$user_name = $this->input->post('user_name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		$level = $this->input->post('level');

		$cek = $this->M_register->cek_username($username);

		if (!preg_match("/^[a-z-A-Z_\s\-.\-,]*$/", $user_name)) {
			$this->session->set_flashdata('isi_terserah_gagal', 'Nama Lengkap hanya boleh huruf!');
			redirect('DaftarPengguna');
		} else if ($cek > 0) {
			$data = array(
				'ktp' => $ktp,
				'user_name' => $user_name,
				'email_pelanggan' => $email,
				'hp' => $hp,
				'username' => $username,
				'level' => $level,
			);
			$this->session->set_flashdata($data);
			$this->session->set_flashdata('isi_terserah_gagal', 'Username telah digunakan!');
			redirect('DaftarPengguna');
		} else {
			$data = array(
				'ktp' => $ktp,
				'user_name' => $user_name,
				'email_pelanggan' => $email,
				'hp' => $hp,
				'username' => $username,
				'level' => $level
			);

			$where = array(
				'id' => $id
			);
			$res = $this->M_register->update_data($where, $data, 'pelanggan');
			if ($res == false) {
				$this->session->set_flashdata('sukses', "Diubah");
				redirect('DaftarPengguna');
			} else {
				$this->session->set_flashdata('gagal', "Diubah");
				redirect('DaftarPengguna');
			}
		}
	}



	function hapus($id)
	{
		$where = array('id' => $id);
		$res = $this->M_register->hapus_data($where, 'pelanggan');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Dihapus");
			redirect('DaftarPengguna');
		} else {
			$this->session->set_flashdata('gagal', "Dihapus");
			redirect('DaftarPengguna');
		}
	}
}
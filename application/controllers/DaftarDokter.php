<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarDokter extends CI_Controller
{
	private $ekstensi_gambar = array("jpg", "jpeg", "png");
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dokter');
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
		$data['title'] = "Data Dokter MCU";
		$data['dokter'] = $this->M_dokter->tampil_data()->result();
		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('A_admin/laporanDokter', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$kodedokter = $this->input->post('kodedokter');
		$namadokter = $this->input->post('namadokter');
		$spesialis = $this->input->post('spesialis');

		if (!empty($_FILES['foto']['name'])) {
			$foto = time() . $_FILES['foto']['name'];
			$path_foto = $_FILES['foto']['tmp_name'];
			$pecah = explode(".", $foto);
			$end = strtolower(end($pecah));

			if (in_array($end, $this->ekstensi_gambar)) {
				move_uploaded_file($path_foto, 'bootslander/img/doctors/' . $foto);
				$data = array(
					'kodedokter' => $kodedokter,
					'foto_dokter' => $foto,
					'namadokter' => $namadokter,
					'spesialis' => $spesialis,
					'dokter_active' => '1',
				);
				$res = $this->M_dokter->input_data($data, 'dokter');
				if ($res == false) {
					$this->session->set_flashdata('sukses', "Ditambahkan!");
					redirect('DaftarDokter');
				} else {
					$this->session->set_flashdata('gagal', "Ditambahkan!");
					redirect('DaftarDokter');
				}
			} else {
				$this->session->set_flashdata('gagal', "Disimpan! (gambar)");
				redirect('DaftarDokter');
			}
		} else {
			$data = array(
				'kodedokter' => $kodedokter,
				'foto_dokter' => 'default.jpg',
				'namadokter' => $namadokter,
				'spesialis' => $spesialis,
				'dokter_active' => '1',
			);

			$res = $this->M_dokter->input_data($data, 'dokter');
			if ($res == false) {
				$this->session->set_flashdata('sukses', "Ditambahkan");
				redirect('DaftarDokter');
			} else {
				$this->session->set_flashdata('gagal', "Ditambahkan");
				redirect('DaftarDokter');
			}
		}

	}

	public function update()
	{
		$id = $this->input->post('id');
		$kodedokter = $this->input->post('kodedokter');
		$namadokter = $this->input->post('namadokter');
		$spesialis = $this->input->post('spesialis');

		if (!empty($_FILES['foto']['name'])) {
			$foto = time() . $_FILES['foto']['name'];
			$path_foto = $_FILES['foto']['tmp_name'];
			$pecah = explode(".", $foto);
			$end = strtolower(end($pecah));

			if (in_array($end, $this->ekstensi_gambar)) {
				$query = $this->db->query("SELECT * FROM dokter WHERE id_dokter = '$id' ")->result();
				$foto_lama = $query->foto;
				move_uploaded_file($path_foto, 'bootslander/img/doctors/' . $foto);
				if ($foto_lama !== "default.jpg") {
					unlink('bootslander/img/doctors/' . $foto_lama);
				}
				$data = array(
					'kodedokter' => $kodedokter,
					'foto_dokter' => $foto,
					'namadokter' => $namadokter,
					'spesialis' => $spesialis,
				);

				$where = array('id_dokter' => $id);
				$res = $this->M_dokter->update_data($where, $data, 'dokter');
				if ($res == false) {
					$this->session->set_flashdata('sukses', "Diperbarui");
					redirect('DaftarDokter');
				} else {
					$this->session->set_flashdata('gagal', "Diperbarui");
					redirect('DaftarDokter');
				}
			} else {
				$this->session->set_flashdata('gagal', "Gambar Disimpan!");
				redirect('DaftarDokter');
			}
		} else {
			$data = array(
				'kodedokter' => $kodedokter,
				'namadokter' => $namadokter,
				'spesialis' => $spesialis,
			);

			$where = array('id_dokter' => $id);
			$res = $this->M_dokter->update_data($where, $data, 'dokter');
			if ($res == false) {
				$this->session->set_flashdata('sukses', "Diubah");
				redirect('DaftarDokter');
			} else {
				$this->session->set_flashdata('gagal', "Diubah");
				redirect('DaftarDokter');
			}
		}

	}

	function nonactive_dokter($id)
	{
		$data = array(
			'dokter_active' => '0',
		);
		$where = array('id_dokter' => $id);
		$res = $this->M_dokter->update_data($where, $data, 'dokter');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Diubah");
			redirect('DaftarDokter');
		} else {
			$this->session->set_flashdata('gagal', "Diubah");
			redirect('DaftarDokter');
		}
	}
	function active_dokter($id)
	{
		$data = array(
			'dokter_active' => '1',
		);
		$where = array('id_dokter' => $id);
		$res = $this->M_dokter->update_data($where, $data, 'dokter');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Diubah");
			redirect('DaftarDokter');
		} else {
			$this->session->set_flashdata('gagal', "Diubah");
			redirect('DaftarDokter');
		}
	}

	function hapus($id)
	{
		$where = array('id_dokter' => $id);
		$res = $this->M_dokter->hapus_data($where, 'dokter');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Dihapus");
			redirect('DaftarDokter');
		} else {
			$this->session->set_flashdata('gagal', "Dihapus");
			redirect('DaftarDokter');
		}
	}
}
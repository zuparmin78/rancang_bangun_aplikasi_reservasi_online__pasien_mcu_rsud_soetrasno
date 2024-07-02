<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class DaftarGaleri extends CI_Controller
{
	private $ekstensi_gambar = array("jpg", "jpeg", "png");
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_galeri');
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
		$data['title'] = "Data Galeri Rumah Sakit";
		$data['galeri'] = $this->M_galeri->tampil_data()->result();
		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $prof);
		$this->load->view('A_admin/laporanGaleri', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		if (!empty ($_FILES['foto']['name'])) {
			$foto = time() . $_FILES['foto']['name'];
			$path_foto = $_FILES['foto']['tmp_name'];
			$pecah = explode(".", $foto);
			$end = strtolower(end($pecah));

			if (in_array($end, $this->ekstensi_gambar)) {
				move_uploaded_file($path_foto, 'bootslander/img/gallery/' . $foto);
				$data = array(
					'nama_galeri' => $foto,
				);
				$res = $this->M_galeri->input_data($data, 'galeri_rs');
				if ($res == false) {
					$this->session->set_flashdata('sukses', "Ditambahkan!");
					redirect('DaftarGaleri');
				} else {
					$this->session->set_flashdata('gagal', "Ditambahkan!");
					redirect('DaftarGaleri');
				}
			} else {
				$this->session->set_flashdata('gagal', "Disimpan! (gambar)");
				redirect('DaftarGaleri');
			}
		} else {
			$this->session->set_flashdata('isi_terserah_gagal', "Tidak ada gambar yang dipilih!");
			redirect('DaftarGaleri');
		}
	}

	public function update()
	{
		$id = $this->input->post('id');

		if (!empty ($_FILES['foto']['name'])) {
			$foto = time() . $_FILES['foto']['name'];
			$path_foto = $_FILES['foto']['tmp_name'];
			$pecah = explode(".", $foto);
			$end = strtolower(end($pecah));

			if (in_array($end, $this->ekstensi_gambar)) {
				$query = $this->db->query("SELECT * FROM galeri_rs WHERE id_galeri = '$id' ")->result();
				$foto_lama = $query->foto;
				move_uploaded_file($path_foto, 'bootslander/img/gallery/' . $foto);
				if ($foto_lama !== "default.jpg") {
					unlink('bootslander/img/gallery/' . $foto_lama);
				}
				$data = array(
					'nama_galeri' => $foto,
				);

				$where = array('id_galeri' => $id);
				$res = $this->M_galeri->update_data($where, $data, 'galeri_rs');
				if ($res == false) {
					$this->session->set_flashdata('sukses', "Diperbarui");
					redirect('DaftarGaleri');
				} else {
					$this->session->set_flashdata('gagal', "Diperbarui");
					redirect('DaftarGaleri');
				}
			} else {
				$this->session->set_flashdata('gagal', "Gambar Disimpan!");
				redirect('DaftarGaleri');
			}
		} else {
			$this->session->set_flashdata('isi_terserah_gagal', "Tidak ada gambar yang dipilih!");
			redirect('DaftarGaleri');
		}
	}


	function hapus($id)
	{
		$where = array('id_galeri' => $id);
		$res = $this->M_galeri->hapus_data($where, 'galeri_rs');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Dihapus");
			redirect('DaftarGaleri');
		} else {
			$this->session->set_flashdata('gagal', "Dihapus");
			redirect('DaftarGaleri');
		}
	}
}
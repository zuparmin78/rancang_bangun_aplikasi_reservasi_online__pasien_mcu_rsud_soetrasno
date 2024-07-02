<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarPasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pasien');
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
		$data['title'] = "Data Pasien MCU";
		$data['pasien'] = $this->M_pasien->tampil_data()->result();
		$dataP['title'] = "Data Pasien MCU";
		$dataP['pasien'] = $this->db->select('*')->from('pasien_mcu')->where('id_pembuat', $this->session->userdata('id'))->get()->result();

		$profil = $this->session->userdata('id');
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		if ($this->session->userdata('level') === 'pengunjung') {
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_pengunjung/laporanPasienP', $dataP);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $prof);
			$this->load->view('A_admin/laporanPasien', $data);
			$this->load->view('templates/footer');
		}
	}

	public function register()
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$tmptlahir = $this->input->post('tempat_lahir');
		$tglahir = $this->input->post('tanggal_lahir');
		$jk = $this->input->post('jenis_kelamin');
		$goldar = $this->input->post('golongan_darah');
		$agama = $this->input->post('agama');
		$perkawinan = $this->input->post('perkawinan');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('nomor_telepon');
		$pendidikan = $this->input->post('pendidikan_terakhir');
		$pembuat = $this->input->post('pembuat');
		$tgldibuat = $this->input->post('tanggal_dibuat');

		$data = array(
			'nik_pasien' => $nik,
			'nama_pasien' => $nama,
			'tmpt_lahir' => $tmptlahir,
			'tglahir_pasien' => $tglahir,
			'jk_pasien' => $jk,
			'goldar' => $goldar,
			'agama_pasien' => $agama,
			'kawin_pasien' => $perkawinan,
			'pekerjaan_pasien' => $pekerjaan,
			'alamat_pasien' => $alamat,
			'telp_pasien' => $telp,
			'pnddk_terakhir' => $pendidikan,
			'id_pembuat' => $pembuat,
			'tgl_dibuat' => $tgldibuat,
		);

		$res = $this->M_pasien->input_data($data, 'pasien_mcu');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Ditambahkan");
			redirect('DaftarPasien');
		} else {
			$this->session->set_flashdata('gagal', "Ditambahkan");
			redirect('DaftarPasien');
		}

	}

	public function update()
	{
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$tmptlahir = $this->input->post('tempat_lahir');
		$tglahir = $this->input->post('tanggal_lahir');
		$jk = $this->input->post('jenis_kelamin');
		$goldar = $this->input->post('golongan_darah');
		$agama = $this->input->post('agama');
		$perkawinan = $this->input->post('perkawinan');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('nomor_telepon');
		$pendidikan = $this->input->post('pendidikan_terakhir');

		$data = array(
			'nik_pasien' => $nik,
			'nama_pasien' => $nama,
			'tmpt_lahir' => $tmptlahir,
			'tglahir_pasien' => $tglahir,
			'jk_pasien' => $jk,
			'goldar' => $goldar,
			'agama_pasien' => $agama,
			'kawin_pasien' => $perkawinan,
			'pekerjaan_pasien' => $pekerjaan,
			'alamat_pasien' => $alamat,
			'telp_pasien' => $telp,
			'pnddk_terakhir' => $pendidikan,
		);

		$where = array('id' => $id);
		$res = $this->M_pasien->update_data($where, $data, 'pasien_mcu');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Diubah");
			redirect('DaftarPasien');
		} else {
			$this->session->set_flashdata('gagal', "Diubah");
			redirect('DaftarPasien');
		}
	}

	function hapus($id)
	{
		$where = array('id' => $id);
		$res = $this->M_pasien->hapus_data($where, 'pasien_mcu');
		if ($res == false) {
			$this->session->set_flashdata('sukses', "Dihapus");
			redirect('DaftarPasien');
		} else {
			$this->session->set_flashdata('gagal', "Dihapus");
			redirect('DaftarPasien');
		}
	}
}
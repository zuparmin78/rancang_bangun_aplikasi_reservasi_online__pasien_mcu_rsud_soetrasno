<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Setting_Akun extends CI_Controller
{
	private $ekstensi_gambar = array("jpg", "jpeg", "png");
	public function __construct()
	{
		parent::__construct();
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
		$profil = $this->session->userdata('id');
		$data['tamu'] = $this->M_profile->tampil_data_profil($profil)->result();
		$data['profile'] = $this->M_profile->tampil_tamu($profil)->result();

		$this->load->view('templates/navbar.php');
		$this->load->view('templates/sidebar.php', $data);
		$this->load->view('Naratama/account_settings', $data);
		$this->load->view('templates/footer.php');
	}

	public function update()
	{
		$id_pelanggan = $this->session->userdata('id');
		$nik = $this->input->post('no_ktp');
		$nama = $this->input->post('namalengkap');
		$email = $this->input->post('email');
		$telp = $this->input->post('notelp');
		$tmptlahir = $this->input->post('tempat_lahir');
		$tglahir = $this->input->post('tanggal_lahir');
		$jk = $this->input->post('jenis_kelamin');
		$goldar = $this->input->post('golongan_darah');
		$agama = $this->input->post('agama');
		$perkawinan = $this->input->post('status_kawin');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat = $this->input->post('alamat');
		$pendidikan = $this->input->post('pendidikan_terakhir');

		$pembuat = $this->session->userdata('id');
		$tgldibuat = date("Y-m-d H:i:s");

		$data_pelanggan = array(
			'ktp' => $nik,
			'user_name' => $nama,
			'email_pelanggan' => $email,
			'hp' => $telp,
		);
		$penggunaid = array('id' => $id_pelanggan);
		$this->M_profile->update_data($penggunaid, $data_pelanggan, 'pelanggan');

		$match = $this->M_profile->tampil_tamu($id_pelanggan)->result();
		$array = json_decode(json_encode($match), true);
		if (!$array) {
			if (!empty ($_FILES['foto']['name'])) {
				$foto = time() . $_FILES['foto']['name'];
				$path_foto = $_FILES['foto']['tmp_name'];
				$pecah = explode(".", $foto);
				$end = strtolower(end($pecah));

				if (in_array($end, $this->ekstensi_gambar)) {
					$query = $this->db->query("SELECT * FROM profiletamu WHERE id_pelanggan = '$id_pelanggan' ")->result();
					$foto_lama = $query->foto;
					move_uploaded_file($path_foto, 'bootslander/img/pengguna/' . $foto);
					if ($foto_lama !== "default.jpg") {
						unlink('bootslander/img/pengguna/' . $foto_lama);
					}
					$data_profil = array(
						'foto_prof' => $foto,
						'id_pelanggan' => $this->session->userdata('id'),
						'tmpt_lahir_prof' => $tmptlahir,
						'tgl_lahir_prof' => $tglahir,
						'jk_prof' => $jk,
						'goldar_prof' => $goldar,
						'agama_prof' => $agama,
						'kawin_prof' => $perkawinan,
						'pekerjaan_prof' => $pekerjaan,
						'alamat_prof' => $alamat,
						'pnddk_terakhir_prof' => $pendidikan,
					);

					$data_pasien = array(
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
					$this->M_profile->input_data($data_pasien, 'pasien_mcu');
					$res = $this->M_profile->input_data($data_profil, 'profiletamu');
					if ($res == false) {
						$this->session->set_flashdata('sukses', "Diperbarui");
						redirect('Setting_Akun');
					} else {
						$this->session->set_flashdata('gagal', "Diperbarui");
						redirect('Setting_Akun');
					}
				} else {
					$this->session->set_flashdata('gagal', "Disimpan! (gambar)");
					redirect('Setting_Akun');
				}
			} else {
				$data_profil = array(
					'foto_prof' => 'default.jpg',
					'id_pelanggan' => $this->session->userdata('id'),
					'tmpt_lahir_prof' => $tmptlahir,
					'tgl_lahir_prof' => $tglahir,
					'jk_prof' => $jk,
					'goldar_prof' => $goldar,
					'agama_prof' => $agama,
					'kawin_prof' => $perkawinan,
					'pekerjaan_prof' => $pekerjaan,
					'alamat_prof' => $alamat,
					'pnddk_terakhir_prof' => $pendidikan,
				);
				$data_pasien = array(
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
				$this->M_profile->input_data($data_pasien, 'pasien_mcu');
				$res = $this->M_profile->input_data($data_profil, 'profiletamu');
				if ($res == false) {
					$this->session->set_flashdata('sukses', "Diperbarui");
					redirect('Setting_Akun');
				} else {
					$this->session->set_flashdata('gagal', "Diperbarui");
					redirect('Setting_Akun');
				}
			}
		} else {
			if (!empty ($_FILES['foto']['name'])) {
				$foto = time() . $_FILES['foto']['name'];
				$path_foto = $_FILES['foto']['tmp_name'];
				$pecah = explode(".", $foto);
				$end = strtolower(end($pecah));

				if (in_array($end, $this->ekstensi_gambar)) {
					$query = $this->db->query("SELECT * FROM profiletamu WHERE id_pelanggan = '$id_pelanggan' ")->result();
					$foto_lama = $query->foto;
					move_uploaded_file($path_foto, 'bootslander/img/pengguna/' . $foto);
					if ($foto_lama !== "default.jpg") {
						unlink('bootslander/img/pengguna/' . $foto_lama);
					}
					$data_profil = array(
						'foto_prof' => $foto,
						'tmpt_lahir_prof' => $tmptlahir,
						'tgl_lahir_prof' => $tglahir,
						'jk_prof' => $jk,
						'goldar_prof' => $goldar,
						'agama_prof' => $agama,
						'kawin_prof' => $perkawinan,
						'pekerjaan_prof' => $pekerjaan,
						'alamat_prof' => $alamat,
						'pnddk_terakhir_prof' => $pendidikan,
					);

					$where = array('id_pelanggan' => $this->session->userdata('id'));
					$res = $this->M_profile->update_data($where, $data_profil, 'profiletamu');
					if ($res == false) {
						$this->session->set_flashdata('sukses', "Diperbarui");
						redirect('Setting_Akun');
					} else {
						$this->session->set_flashdata('gagal', "Diperbarui");
						redirect('Setting_Akun');
					}
				} else {
					$this->session->set_flashdata('gagal', "Disimpan! (gambar)");
					redirect('Setting_Akun');
				}
			} else {
				$data_profil = array(
					'tmpt_lahir_prof' => $tmptlahir,
					'tgl_lahir_prof' => $tglahir,
					'jk_prof' => $jk,
					'goldar_prof' => $goldar,
					'agama_prof' => $agama,
					'kawin_prof' => $perkawinan,
					'pekerjaan_prof' => $pekerjaan,
					'alamat_prof' => $alamat,
					'pnddk_terakhir_prof' => $pendidikan,
				);

				$where = array('id_pelanggan' => $this->session->userdata('id'));
				$res = $this->M_profile->update_data($where, $data_profil, 'profiletamu');
				if ($res == false) {
					$this->session->set_flashdata('sukses', "Diperbarui");
					redirect('Setting_Akun');
				} else {
					$this->session->set_flashdata('gagal', "Diperbarui");
					redirect('Setting_Akun');
				}
			}
		}
	}

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class laporan_terkonfirmasi extends CI_Controller
{
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
		$prof['profile'] = $this->M_profile->tampil_tamu($profil)->result();

        $data['title'] = "Cetak Laporan";
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $prof);
        $this->load->view('A_admin/cetak_laporan/print_laporan_terkonfirmasi', $data);
        $this->load->view('templates/footer');
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mmasuk', 'Mmasuk');
    }

    function index()
    {

        if ($this->session->userdata('level') === 'pengunjung') {
            $url = base_url('pengunjung');
            redirect($url);
        } else if ($this->session->userdata('level') === 'kepala rm') {
            $url = base_url('kepala_rm');
            redirect($url);
        } else if ($this->session->userdata('level') === 'administrator') {
            $url = base_url('administrator');
            redirect($url);
        } else if ($this->session->userdata('level') === 'petugas') {
            $url = base_url('petugas');
            redirect($url);
        } else {
            $this->load->view('naratama/masuk_view');
        }
    }

    function autentikasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('pass');

        // $validasi_username = $this->Mmasuk->query_validasi_username($username);
        $query = $this->db->get_where('pelanggan', ['username' => $username]);
        if ($query->num_rows() > 0) {
            $assoc = $query->row();
            if ((password_verify($password, $assoc->user_password))) {
                // $validate_ps = $this->db->query_validasi_password($username, $password);
                $x = $query->row_array();
                if ($x['user_status'] == '1') {
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('user', $username);
                    $id = $x['id'];
                    if ($x['level'] == 'administrator') { //administrator
                        $name = $x['user_name'];
                        $email_pelanggan = $x['email_pelanggan'];
                        $hp = $x['hp'];
                        $pengunjung = $x['level'];
                        $this->session->set_userdata('access', 'Administrator');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('email_pelanggan', $email_pelanggan);
                        $this->session->set_userdata('hp', $hp);
                        $this->session->set_userdata('level', $pengunjung);
                        redirect('administrator');

                    } else if ($x['level'] == 'petugas') { //petugas
                        $name = $x['user_name'];
                        $email_pelanggan = $x['email_pelanggan'];
                        $hp = $x['hp'];
                        $pengunjung = $x['level'];
                        $this->session->set_userdata('access', 'Petugas');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('email_pelanggan', $email_pelanggan);
                        $this->session->set_userdata('hp', $hp);
                        $this->session->set_userdata('level', $pengunjung);
                        redirect('Petugas');

                    } else if ($x['level'] == 'kepala rm') { //petugas
                        $name = $x['user_name'];
                        $email_pelanggan = $x['email_pelanggan'];
                        $hp = $x['hp'];
                        $pengunjung = $x['level'];
                        $this->session->set_userdata('access', 'kepala rm');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('email_pelanggan', $email_pelanggan);
                        $this->session->set_userdata('hp', $hp);
                        $this->session->set_userdata('level', $pengunjung);
                        redirect('Kepala_Rm');

                    } else if ($x['level'] == 'pengunjung') { //pengunjung
                        $name = $x['user_name'];
                        $email_pelanggan = $x['email_pelanggan'];
                        $hp = $x['hp'];
                        $pengunjung = $x['level'];
                        $this->session->set_userdata('access', 'pengunjung');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('email_pelanggan', $email_pelanggan);
                        $this->session->set_userdata('hp', $hp);
                        $this->session->set_userdata('level', $pengunjung);
                        redirect('Pengunjung');
                    }

                } else {
                    $url = base_url('masuk');
                    echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            } else {
                $url = base_url('masuk');
                echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang anda masukan salah.</p>');
                redirect($url);
            }

        } else {
            $url = base_url('masuk');
            echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>username yang anda masukan salah.</p>');
            redirect($url);
        }

    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('utama');
        redirect($url);
    }

}
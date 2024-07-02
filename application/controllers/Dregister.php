<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dregister extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        // $this->load->library('form_validation');
        $this->load->model('M_register');
    }

    public function index()
    {
        $this->load->view('naratama/D_register');
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

        if ($cek > 0) {
            $data = array(
                'ktp' => $ktp,
                'user_name' => $user_name,
                'email_pelanggan' => $email,
                'hp' => $hp,
                'username' => $username,
            );
            $this->session->set_flashdata($data);
            $this->session->set_flashdata('username_telah_ada', 'Username telah digunakan!');
            redirect('Dregister');
        // } else if (strlen('ktp') === 16) {
        //     $data = array(
        //         'ktp' => $ktp,
        //         'user_name' => $user_name,
        //         'email_pelanggan' => $email,
        //         'hp' => $hp,
        //         'username' => $username,
        //     );
        //     $this->session->set_flashdata($data);
        //     $this->session->set_flashdata('username_telah_ada', 'Nama Lengkap hanya boleh huruf!');
        //     redirect('Dregister');
        } else if (!preg_match("/^[a-z-A-Z_\s\-.\-,]*$/", $user_name)) {
            $data = array(
                'ktp' => $ktp,
                'user_name' => $user_name,
                'email_pelanggan' => $email,
                'hp' => $hp,
                'username' => $username,
            );
            $this->session->set_flashdata($data);
            $this->session->set_flashdata('username_telah_ada', 'Nama Lengkap hanya boleh huruf!');
            redirect('Dregister');
        } else if (preg_match('/\s/', $user_password)) {
            $data = array(
                'ktp' => $ktp,
                'user_name' => $user_name,
                'email_pelanggan' => $email,
                'hp' => $hp,
                'username' => $username,
            );
            $this->session->set_flashdata($data);
            $this->session->set_flashdata('username_telah_ada', 'Passwod Tidak Boleh Spasi!');
            redirect('Dregister');
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

            $this->M_register->input_data($data, 'pelanggan');
            $this->session->set_flashdata('success_message', 'Daftar akun Sukses...!! Silahkan anda login kembali...');
            redirect('masuk');
        }
    }
}
?>
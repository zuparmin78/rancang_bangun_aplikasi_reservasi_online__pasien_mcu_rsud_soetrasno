<?php 

class Register extends CI_Controller {

    public function __construct()   {
    parent::__construct();
        $this->load->helper("url");
        $this->load->model('register_model');

        if($this->session->userdata('logged') !=TRUE){
            $url=base_url('masuk');
            redirect($url);
		};
    }   

    public function index(){
    $this->load->view('register_view');
    }

    public function register_user(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        $data = array (
            'username'=> $username,
            'password'=> $password
        );

        $this->register_model->inputdata($data,'user');
        redirect('utama');      
    }
}


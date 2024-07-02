<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Transaction extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-o02Rba93d7rJnLYGRj6luARR', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');

	}

	public function index()
	{
		$this->load->view('transaction');
	}

	public function process()
	{
		$order_id = $this->input->post('order_id');
		$action = $this->input->post('action');
		switch ($action) {
			case 'status':
				$this->status($order_id);
				break;
			case 'approve':
				$this->approve($order_id);
				break;
			case 'expire':
				$this->expire($order_id);
				break;
			case 'cancel':
				$this->cancel($order_id);
				break;
		}

	}

	public function status($order_id)
	{
		echo 'test get status </br>';
		echo '<pre>';
		print_r($this->veritrans->status($order_id));
		echo '</pre>';
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo '<pre>';
		echo $this->veritrans->cancel($order_id);
		echo '</pre>';
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		echo '<pre>';
		print_r($this->veritrans->approve($order_id));
		echo '</pre>';
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		echo '<pre>';
		print_r($this->veritrans->expire($order_id));
		echo '</pre>';
	}
}

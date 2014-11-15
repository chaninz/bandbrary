<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('join_band_model','join_band');
	}


	public function index()
	{
		// $data = array('username' => 'b',
		// 'email' => 'chaninz@live.com');
		// $this->load->model('user_model');
		// $data = array('name' => 'abnormal');
		// $this->load->model('band_model');
		// $result = $this->band_model->is_exist($data);
		// echo $result;
		//echo 
	}

	public function email() {
		$this->load->view('email.html');
	}

	public function band_master($band_id){
		$data = $this->join_band->get_band_master($band_id);
		$receiver_list = array();
			foreach ($data as $value) {
					echo $value->user_id;
			}
		print_r($data);
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		// $data = array('username' => 'b',
		// 'email' => 'chaninz@live.com');
		// $this->load->model('user_model');
		$data = array('name' => 'abnormal');
		$this->load->model('band_model');
		$result = $this->band_model->is_exist($data);
		echo $result;
	}

	public function email() {
		$this->load->view('email.html');
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */
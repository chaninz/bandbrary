<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function add(){
		$this->load->model('user_model');
		$data = $this->user_model->getStatus();
		$this->load->view('writeStatus',$data);
	}
	
	public function edit(){
		$data = array (
			'id' => $this->session->userdata('id'),
			'status' => $this->input->post('status')
		);
		$this->user->edit($data);
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatusFeed extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('status_model');
		$this->load->model('user_model');
	}

	public function add(){
		if ($this->input->post()) {
			$data = array(
				'id' => $this->session->userdata('id'),
				'status' => $this->input->post('status')
			);
			$this->statusfeed_model->add($data);
		}
		
		$this->load->view('timeline',$data);
	}
	
	public function delete($status_id){
		$data = array(
				'status_id' => $status_id
			);
		$this->statusfeed_model->delete($data);
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */
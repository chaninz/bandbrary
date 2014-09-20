<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('band_model');
	}

	public function index() {
		// edit how to get position from user ?
		// getting from query string
		if ($this->input->get()) {
			$user_id = $this->session->userdata('id');
			$data = array('band_id' => $this->input->get('band'),
				'user_id' => $user_id,
				'position' => $position/*$position*/,
				'status' => 1);
			$this->band_model->join($data);
		} else {
			redirect('');
		}
	}

	public function test() {
		// echo $this->band_model->check_user_status($this->session->userdata('id'), 1);
		$this->band_model->set_master($this->session->userdata('id'), 1, 3);
	}

}

/* End of file join.php */
/* Location: ./application/controllers/band/join.php */
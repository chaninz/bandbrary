<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('band_model');
	}

	public function index() {
		// edit how to get position from user ?
		if ($this->input->get()) {
			$band_id = $this->input->get('band');
			$user_id = $this->session->userdata('user_id');
			$data = array('band_id' => $band_id,
				'user_id' => $user_id,
				'position' => 1,
				'status' => 1);
			$this->band_model->join($data);
		} else {
			redirect('');
		}
	}

}

/* End of file join.php */
/* Location: ./application/controllers/band/join.php */
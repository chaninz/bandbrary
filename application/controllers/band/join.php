<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('join_band_model');
	}

	public function index($band_id) {
		// edit how to get position from user ?
		// getting from query string
		if ($this->input->get()) {
			$position = $this->input->get('pos');
			$ref = $this->input->get('ref');
			$user_id = $this->session->userdata('id');
			$data = array('band_id' => $band_id,
				'user_id' => $user_id,
				'position' => $position,
				'status' => 1);
			$this->join_band_model->join($data);

			redirect($ref);
		} else {
			redirect('');
		}
	}

	public function cancel($band_id) {
		if ($this->input->get()) {
			$ref = $this->input->get('ref');
			$user_id = $this->session->userdata('id');
			$this->join_band_model->reject($user_id, $band_id);

			redirect($ref);
		}
	}

	public function leave($band_id) {
		if ($this->input->get()) {
			$ref = $this->input->get('ref');
			$user_id = $this->session->userdata('id');
			$this->join_band_model->leave($user_id, $band_id);

			redirect($ref);
		}
	}

	public function test() {
		// echo $this->band_model->check_user_status($this->session->userdata('id'), 1);
		$this->band_model->set_master($this->session->userdata('id'), 1, 3);
	}

}

/* End of file join.php */
/* Location: ./application/controllers/band/join.php */
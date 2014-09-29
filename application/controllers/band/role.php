<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('join_band_model');
	}

	public function index() {
		$band_id = $this->session->userdata('band_id');
		$band_members = $this->join_band_model->get_current_member($band_id);
		$data = array('band_members' => $band_members);

		$this->load->view('band/role', $data);
	}

	public function master($user_id) {
		$band_id = $this->session->userdata('band_id');
		$this->join_band_model->master($user_id, $band_id);

		redirect(base_url('band/role'));
	}

	public function unmaster($user_id) {
		$band_id = $this->session->userdata('band_id');
		$this->join_band_model->unmaster($user_id, $band_id);

		redirect(base_url('band/role'));
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */
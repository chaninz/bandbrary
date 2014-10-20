<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
	}

	public function index($id) {
		$user_profile = $this->user_model->get_by_id($id);
		$data = array('user_profile' => $user_profile,
			'pm_users' => $this->pm_model->get_all() );

		$this->load->view('private_message',$data);
	}

	public function add($text,$target_user) {
		if ($this->input->post()) {
			$data = array(
			'from_user_id' => $this->session->userdata('id'),
			'text'=> $text,
			'to_user_id' => $target_user
		);
			$this->pm_model->add($data);
		} else {
			$this->load->view('user/createJob');
		}
	}
		
	public function view($target_user) {
		// $user_profile = $this->user_model->get_by_username($username);
		$data = array( //'user_profile' => $user_profile,
			'pm_users' => $this->pm_model->view($target_user)

		);
		print_r($data);
	}

}

/* End of file pm.php */
/* Location: ./application/controllers/pm.php */
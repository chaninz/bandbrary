<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
	}

	public function index() {
		redirect();
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
		
	


	// view only one job
	public function view($target_user) {

		// $user_profile = $this->user_model->get_by_username($username);
		$data = array( //'user_profile' => $user_profile,
			'pm_users' => $this->pm_model->view($target_user)

		);
		print_r($data);
	}

	//view all job (all job in job's page)
	public function allChat($username) {
		$user_profile = $this->user_model->get_by_username($username);
		$data = array('user_profile' => $user_profile,
			'pm_users' => $this->pm_model->get_all() 
		);

		//print_r($data);
		$this->load->view('user/privateMessage',$data);
	}

}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */
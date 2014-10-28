<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
	}

	public function index($id) {
		//$user_profile = $this->user_model->get_by_id($id);
		$data = array(//'user_profile' => $user_profile,
			'pm_users' => $this->pm_model->get_all() );

		$this->load->view('private_message',$data);
	}

	public function add($target_user) {
		if ($this->input->post()) {
			$data = array(
				'from_user_id' => $this->session->userdata('id'),
				'text'=> $this->input->post('text'),
				'to_user_id' => $target_user
			);
			//print_r($data);
			$id = $this->pm_model->add($data);

			$lastpm = $this->pm_model->get_pm_by_id($id);
			echo json_encode($lastpm);
			//redirect(base_url('pm/'.$data['to_user_id']));

		} 
	}
		
	public function view() {
		// $user_profile = $this->user_model->get_by_username($username);
		$target_user = $this->input->post('id');
		$data =  $this->pm_model->view($target_user);
		echo json_encode($data);
	}

}

/* End of file pm.php */
/* Location: ./application/controllers/pm.php */
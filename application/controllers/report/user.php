<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
				$this->load->model('report_user_model');

	}

	public function index() {
		if ($this->input->post()) {
			$data = array(
			'user_report' => $this->session->userdata('id'),
			'user_id' => $this->input->post('userid'),
			'type' => $this->input->post('type')
		);
			$this->report_user_model->add($data);
			$user = $this->report_user_model->getUsername($data['user_id']);
			redirect('/user/'.$user->username.'/timeline');
			//edirect('/band/'.$band.'/timeline');


		}
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */
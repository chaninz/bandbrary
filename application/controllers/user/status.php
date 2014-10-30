<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('status_model');
		$this->load->model('user_model');
	}

	public function all($username) {
		$user_profile = $this->user_model->get_by_username($username);
		$user = $this->user_model->get_by_username($username);
		
		if ( ! empty($username) && ! empty ($user)) {
			$data = array('statuss' => $this->status_model->get_by_user($user->id),
				'user_profile' => $user_profile);

			$this->load->view('user/status_all', $data);
		} else {
			show_404();
		}
	}

}

/* End of file status.php */
/* Location: ./application/controllers/user/status.php */
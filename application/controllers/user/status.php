<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('status_model');
		$this->load->model('user_model');
	}

	public function all($username) {
		$user = $this->user_model->get_by_username($username);
		if ( ! empty($username) && ! empty ($user)) {
			$status = $this->status_model->get_by_user($user->id);
			print_r($status);
		} else {
			show_404();
		}
	}

}

/* End of file status.php */
/* Location: ./application/controllers/user/status.php */
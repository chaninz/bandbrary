<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('join_band_model');
		$this->load->model('user_model');
	}

	public function all($username) {
		$user = $this->user_model->get_by_username($username);
		if ( ! empty($username) && ! empty ($user)) {
			$history = $this->join_band_model->get_join_all($user->id);
			print_r($history);
		} else {
			show_404();
		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/user/band.php */
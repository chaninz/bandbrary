<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('status_model');
	}

	public function add() {
		$band_id = $this->session->userdata('band_id');
		$is_master = $this->session->userdata('is_master');
		$status = $this->input->post('status');

		if ( ! empty($band_id) && $is_master == 1 && ! empty($status)) {
			echo $this->status_model->add_band_status($band_id, $status);
		} else {

		}
	}

}

/* End of file band.php */
/* Location: ./application/controllers/status/band.php */
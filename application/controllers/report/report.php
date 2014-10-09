<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($type) {
		if ($this->input->post()) {
			if ($type == 1){
				
			}
		);
			$this->report_band_model->add($data);
		}
	}


}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */
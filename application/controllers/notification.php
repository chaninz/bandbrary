<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('receive_noti_model','receive_noti');
		$this->load->model('pm_model','pm');
	}

		public function index() {
			$data = array(
					'noti' => $this->receive_noti->getReceive_NotiUser()
				);
		 $this->receive_noti->seen();
		$this->load->view('user/notification',$data);
	}


	public function total_noti() {
		//$user_profile = $this->user_model->get_by_id($id);
		header('Content-Type: text/event-stream');
		header('Cache-Control: no-cache');
		$total = $this->receive_noti->get_total_noti_User();
		echo "event:total_noti\n";
        echo "data: " .$total. "\n\n";
	}

	public function total_noti_pm() {
		//$user_profile = $this->user_model->get_by_id($id);
		header('Content-Type: text/event-stream');
		header('Cache-Control: no-cache');
		$total = $this->pm->get_total_noti_pm();
		echo "event:total_pm\n";
        echo "data: " .$total. "\n\n";
	}

	
}

/* End of file pm.php */
/* Location: ./application/controllers/pm.php */
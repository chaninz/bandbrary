<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('employment_model');
		$this->load->model('job_model');
		$this->load->model('notification_model');
	 	$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$user_type = $this->session->userdata('user_type');

		if ( ! empty($job_id) && ! empty($current_id) && $user_type == 2) {
			$this->employment_model->request($job_id, $current_id);
			
			//noti
			$noti = array('user_id' => $current_id,
						  'job_id' => $job_id,
						  'type' => "request_job",
						  'link' => "#",
						  'text' => "ได้ส่งคำร้องขอเข้าร่วมงาน"
			);
			$insert_id = $this->notification->add($noti);
			//select receiver
			$master =  $this->job_model->get($job_id);
			$receiver  = array('receive_id' => $insert_id,
								'user_id'    => $master->user_id		
					);
			$this->receive_noti->addOnce($receiver);
			redirect(base_url('job/view/'.$job_id));
		} else {
			show_404();
		}
	}

}

/* End of file request.php */
/* Location: ./application/controllers/job/request.php */
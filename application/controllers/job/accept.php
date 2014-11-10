<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accept extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('employment_model');
		$this->load->model('band_employment_model');
		$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
	}

	public function index($job_id) {
		$current_id = $this->session->userdata('id');
		$user_id = $this->input->get('user');
		$band_id = $this->input->get('band');
		$job = $this->job_model->get($job_id);

		if ( ! empty($job_id) && ! empty($current_id) && ! empty($job) && $job->user_id == $current_id) {
			if ( ! empty($user_id)) {
				$this->employment_model->accept($job_id, $user_id);

				//noti to accepted user
				$noti = array('user_id' => $current_id,
							  'job_id' => $job_id,
							  'type' => "accept_job_user",
							  'link' => "#",
							  'text' => "ได้ตอบรับคุณเข้าร่วมงาน"
				);
				$insert_id = $this->notification->add($noti);


				//select receiver
				$receiver  = array('receive_id' => $insert_id,
									'user_id'    => $user_id		
						);
					
				$this->receive_noti->addOnce($receiver);
				
				redirect(base_url('job/view/'.$job_id));
			} elseif ( ! empty($band_id)) {
				$this->band_employment_model->accept($job_id, $band_id);
				
			
			//to member band
			$notimember = array('user_id' => $user_id,
						  'band_id' => $band_id,
						  'type' => "accept_job_band",
						  'link' => "#",
						  'text' => "ได้ตอบรับของวงคุณเข้าร่วมงาน"
			);
			$insert_id = $this->notification->add($notimember);
			$member =  $this->join_band_model->get_all_member_band($band_id);
			$receiver_list = array();
			foreach ($member as $value) {
					$r  = array('receive_id' => $insert_id,
								'user_id'    => $value->user_id		
					);
					array_push($receiver_list, $r);
			}
			//print_r($receiver_list);
			$this->receive_noti->add($receiver_list);

				redirect(base_url('job/view/'.$job_id));
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

}

/* End of file accept.php */
/* Location: ./application/controllers/job/accept.php */
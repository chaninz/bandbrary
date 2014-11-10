<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('band_model');
		$this->load->model('join_band_model');
		$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
	}

	public function index() {
		$band_id = $this->session->userdata('band_id');
		$band_requests = $this->join_band_model->get_join_request($band_id);
		$data = array('band_requests' => $band_requests);
		$this->load->view('band/request', $data);
	}

	public function accept($user_id) {
		if ($this->input->get()) {
			$ref = $this->input->get('ref');
			$band_id = $this->session->userdata('band_id');
			$this->join_band_model->accept($user_id, $band_id);

			//noti to accepted user
			$noti = array('user_id' => $user_id,
						  'band_id' => $band_id,
						  'type' => "accept_request_user",
						  'link' => "#",
						  'text' => "ได้ตอบรับคุณเข้าร่วมวง"
			);
			$insert_id = $this->notification->add($noti);

			//select receiver
			$receiver  = array('receive_id' => $insert_id,
								'user_id'    => $user_id		
					);
				
			$this->receive_noti->addOnce($receiver);


			//to member band
			$notimember = array('user_id' => $user_id,
						  'band_id' => $band_id->band_id,
						  'type' => "accept_request_member",
						  'link' => "#",
						  'text' => "ได้เพิ่มสมาชิกเข้าในวง"
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
			redirect($ref);
		}
	}

	public function reject($user_id) {
		if ($this->input->get()) {
			$ref = $this->input->get('ref');
			$band_id = $this->session->userdata('band_id');
			$this->join_band_model->reject($user_id, $band_id);

			redirect($ref);
		}
	}

	public function bak() {
		if ($this->input->post()) {
			$band = array('name' => $this->input->post('name'),
				'biography' => $this->input->post('biography'),
				'style' => $this->input->post('style'),
				'fb_url' => $this->input->post('fburl'),
				'tw_url' => $this->input->post('twurl'),
				'yt_url' => $this->input->post('yturl'));
			if ($this->band_model->is_exist($band['name']) == 0) {
				$this->band_model->create($band);
				echo 'success';
			} else {
				echo 'cannot create band';
			}
		} else {
			$this->load->view('band/request');
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/band/create.php */
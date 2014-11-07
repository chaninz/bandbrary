<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('join_band_model','join_band');
		$this->load->model('notification_model','notification');
		$this->load->model('receive_noti_model','receive_noti');
	}

	public function index($band_id) {
		// getting from query string
		$position = $this->input->get('pos');
		$user_id = $this->session->userdata('id');
		$joining_band = $this->join_band_model->get_joining($user_id);

		if ( ! empty($band_id) && ! empty($position) && sizeof($joining_band) == 0) {
			$data = array('band_id' => $band_id,
				'user_id' => $user_id,
				'position' => $position,
				'status' => 1);
			$this->join_band_model->join($data);

			//noti
			$noti = array('user_id' => $user_id,
						  'band_id' => $band_id,
						  'type' => "request_join",
						  'link' => "#",
						  'text' => "ได้ส่งคำร้องขอเข้าร่วมวง"
			);
			$insert_id = $this->notification->add($noti);

			//select receiver
			$master =  $this->join_band->get_band_master($band_id);

			$receiver_list = array();
			foreach ($master as $value) {
					$r  = array('receive_id' => $insert_id,
								'user_id'    => $value->user_id		
					);
					array_push($receiver_list, $r);
			}
			$this->receive_noti->add($receiver_list);

			redirect('band/'.$band_id);
		} else {
			show_404();
		}
	}

	public function cancel($band_id) {
		$user_id = $this->session->userdata('id');
		if ( ! empty($band_id)) {
			$this->join_band_model->cancel($user_id, $band_id);

			redirect('band/'.$band_id);
		} else {
			show_404();
		}
	}

	public function leave($band_id) {
		$user_id = $this->session->userdata('id');
		if ( ! empty($band_id)) {
			$this->join_band_model->leave($user_id, $band_id);

			redirect('band/'.$band_id);
		} else {
			show_404();
		}
	}

	public function test() {
		// echo $this->band_model->check_user_status($this->session->userdata('id'), 1);
		$this->band_model->set_master($this->session->userdata('id'), 1, 3);
	}

}

/* End of file join.php */
/* Location: ./application/controllers/band/join.php */
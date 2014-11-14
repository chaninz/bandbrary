<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
		$this->load->model('pm_band_model');
		$this->load->model('receive_noti_model','receive_noti');
		$this->load->model('receive_noti_band_model','receive_noti_band');
	}

	public function index() {
		//$user_profile = $this->user_model->get_by_id($id);
		$data = array(//'user_profile' => $user_profile,
			'pm_users' => $this->pm_model->get_all(),
			'count_pm_user' => $this->pm_model->count_noti_pm_user(),
			'pm_bands'=> $this->pm_band_model->getPmBand(),
			'count_pm_band' => $this->receive_noti_band->get_total_noti_band(),
			'msg_to_band' => $this->pm_band_model->getMsgToBand(),
			'total_msg_in_band' => (int)$this->receive_noti_band->get_total_noti_band() - (int)$this->pm_band_model->getTotalMsgToBand()
		);

		//print_r($data);
		$this->load->view('private_message',$data);
	}

	public function add($target_user) {
		if ($this->input->post()) {
			$type = $this->input->post('message_type');
			if ($type=="user"){
				$data = array(
					'from_user_id' => $this->session->userdata('id'),
					'text'=> $this->input->post('text'),
					'to_user_id' => $target_user,
					'timestamp' => mdate("%Y-%m-%d %H:%i:%s", now())
				);
				//print_r($data);
				$id = $this->pm_model->add($data);
				$lastpm = $this->pm_model->get_pm_by_id($id);
				echo json_encode($lastpm);
				//redirect(base_url('pm/'.$data['to_user_id']));
			}
			else {
				$data = array(
					'user_id' => $this->session->userdata('id'),
					'text'=> $this->input->post('text'),
					'band_id' => $target_user
				);
				//print_r($data);
				$insert_id = $this->pm_band_model->add($data);
				
				$member =  $this->join_band_model->get_member_band($target_user);
				$band_id = $this->session->userdata('band_id');
				$receiver_list = array();
				foreach ($member as $value) {
						$r  = array('receive_id' => $insert_id,
									'band_id'    => $band_id,
									'user_id'    => $value->user_id		
						);
						array_push($receiver_list, $r);
				}
				//print_r($receiver_list);
				$this->receive_noti_band->add($receiver_list);
				$lastpm = $this->pm_band_model->get_pm_by_bandid($insert_id);
				echo json_encode($lastpm);
			}
		} 
	}
		
	public function message($target_user) {
		if ($this->input->post()) {
			$type = $this->input->post('message_type');
			$username =  $this->input->post('username');
			if ($type=="user"){
				$data = array(
					'from_user_id' => $this->session->userdata('id'),
					'text'=> $this->input->post('text'),
					'to_user_id' => $target_user,
					'timestamp' => mdate("%Y-%m-%d %H:%i:%s", now())
				);
				//print_r($data);
				$id = $this->pm_model->add($data);

				//noti

				redirect(base_url('user/'.$username));
			}
			else {
				$data = array(
					'user_id' => $this->session->userdata('id'),
					'text'=> $this->input->post('text'),
					'band_id' => $target_user
				);
				
				$insert_id = $this->pm_band_model->add($data);
				$member =  $this->join_band_model->get_member_band($target_user);
				$receiver_list = array();
				foreach ($member as $value) {
						$r  = array('receive_id' => $insert_id,
									'band_id'    => $target_user,
									'user_id'    => $value->user_id		
						);
						array_push($receiver_list, $r);
				}
				//print_r($receiver_list);
				$this->receive_noti_band->add($receiver_list);
				//$lastpm = $this->pm_band_model->get_pm_by_bandid($insert_id);
				redirect(base_url('band/'.$target_user));
			}
		} 
	}	
	public function view() {
		// $user_profile = $this->user_model->get_by_username($username);
		$target_user = $this->input->post('id');
		$data =  $this->pm_model->view($target_user);
		$this->receive_noti->seenPM($target_user);
		echo json_encode($data);
	}


	public function getTargetUsername(){
		$target_id = $this->input->post('id');
		$target_user = $this->user_model->get_by_id($target_id);
		echo json_encode($target_user);

	}

	public function getBand(){
		$target_id = $this->input->post('id');
		$band = $this->band_model->get($target_id);
		echo json_encode($band);

	}

	public function addPMBand($band_id) {
		if ($this->input->post()) {
			$data = array(
				'from_user_id' => $this->session->userdata('id'),
				'text'=> $this->input->post('text'),
				'band_id' => $band_id,
			);
			//print_r($data);
			$insert_id = $this->pm_band_model->add($data);

			

			$lastpm = $this->pm_model->get_pm_by_id($id);
			echo json_encode($lastpm);
			//redirect(base_url('pm/'.$data['to_user_id']));

		} 
	}

	public function viewPMBand() {
		// $user_profile = $this->user_model->get_by_username($username);
		$band = $this->input->post('id');
		$data =  $this->pm_band_model->view($band);
		$this->receive_noti_band->seenPMBands();
		echo json_encode($data);
	}
}

/* End of file pm.php */
/* Location: ./application/controllers/pm.php */
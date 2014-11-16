<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
		$this->load->model('pm_band_model');
		$this->load->model('receive_noti_model','receive_noti');
		$this->load->model('receive_noti_band_model','receive_noti_band');
		$this->load->model('receive_noti_user_band_model','receive_noti_user_band');
		$this->load->model('pm_user_and_band_model','pm_user_and_band');
	}

	public function index() {
		//$user_profile = $this->user_model->get_by_id($id);
		$count_pm_band = $this->receive_noti_band->get_total_noti_band();
		$count_msg_to_band = $this->pm_user_and_band->getCountMsgToBand();
		$countall_msg_band = 0;
		
		if($count_pm_band !=null){
			$countall_msg_band+=$count_pm_band;
		}

		foreach ($count_msg_to_band as $value) {
			$countall_msg_band+= (int)$value->total_unseen;
		}
		$data = array(//'user_profile' => $user_profile,
			'pm_users' => $this->pm_model->get_all(),
			'count_pm_user' => $this->pm_model->count_noti_pm_user(),
			'pm_bands'=> $this->pm_band_model->getPmBand(),
			'count_pm_band' => $this->receive_noti_band->get_total_noti_band(),
			'msg_to_band' => $this->pm_user_and_band->getMsgToBand(),
			'count_msg_to_band' => $this->pm_user_and_band->getCountMsgToBand(),
			'owner_group' => $this->pm_user_and_band->getOwnerGroup(),
			'countall_msg_band' =>	$countall_msg_band
			//'total_msg_in_band' => (int)$this->receive_noti_band->get_total_noti_band() - (int)$this->pm_band_model->getTotalMsgToBand()
		
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
			}else if($type == "user_and_band"){
				$band_id = $this->pm_user_and_band->getBandFromGroup($target_user)[0]->band_id;
				$member =  $this->join_band_model->get_all_member_band($band_id);
	 			$user_id = $this->session->userdata('id');
				
				$role = "user";
				foreach ($member as $value) {
						if($value->user_id == $user_id){
							$role= "band";
						}
				}

				$data = array(
					'user_id' => $this->session->userdata('id'),
					'text'=> $this->input->post('text'),
					'band_id' => $band_id,
					'pm_group_id' => $target_user,
					'role' => $role
				);

				$insert_id = $this->pm_user_and_band->add($data);
$member =  $this->join_band_model->get_member_band($band_id);
$receiver_list = array();
				foreach ($member as $value) {
						$r  = array('receive_id' => $insert_id,
									'band_id'    => $band_id,
									'user_id'    => $value->user_id		
						);
						
						array_push($receiver_list, $r);
				}
				if($role == "band"){
					$owner_group = $this->pm_user_and_band->getOwnerbyGroup($target_user);
					$r  = array('receive_id' => $insert_id,
									'band_id'    => $band_id,
									'user_id'    => $owner_group->id		
						);
						
						array_push($receiver_list, $r);
				}
				//print_r($receiver_list);
				
				$this->receive_noti_user_band->add($receiver_list);


				$lastpm = $this->pm_user_and_band->get_pm_by_id($insert_id);
				echo json_encode($lastpm);
			}else {
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
				echo $target_user;
	 			$member =  $this->join_band_model->get_member_band($target_user);
	 			print_r($member);
	 			$user_id = $this->session->userdata('id');
				
				$role = "user";
				foreach ($member as $value) {
						if($value->user_id == $user_id){
							$role= "band";
						}
				}

//select group id
				$rs_group = $this->pm_user_and_band->isExistGroup($user_id,$target_user);
				$pm_group_id = 0;
				if(count($rs_group)>0){
					$pm_group_id = $rs_group[0]->pm_group_id;
				}
				

				if(!$pm_group_id>0){
					$pm_group_id = $this->pm_user_and_band->last_group()[0]->max+1;
				}
				

				$data = array(
					'pm_group_id' => $pm_group_id,
					'user_id' => $user_id,
					'band_id' => $target_user,
					'text' => $this->input->post('text'),
					'role' => $role
				);


				$insert_id = $this->pm_user_and_band->add($data);
			
				$receiver_list = array();
				foreach ($member as $value) {
						$r  = array('receive_id' => $insert_id,
									'band_id'    => $target_user,
									'user_id'    => $value->user_id		
						);
						
						array_push($receiver_list, $r);
				}
				print_r($receiver_list);
				
				$this->receive_noti_user_band->add($receiver_list);
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

	public function viewUserAndBandPM() {
		// $user_profile = $this->user_model->get_by_username($username);
		$pm_group_id = $this->input->post('pm_group_id');
		$data =  $this->pm_user_and_band->view($pm_group_id);
		$this->receive_noti_user_band->seenUserAndBandPm($pm_group_id);
		echo json_encode($data);
	}
}

/* End of file pm.php */
/* Location: ./application/controllers/pm.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('pm_model');
		$this->load->model('user_model');
		$this->load->model('pm_band_model');
	}

	public function index() {
		//$user_profile = $this->user_model->get_by_id($id);
		$data = array(//'user_profile' => $user_profile,
			'pm_users' => $this->pm_model->get_all(),
			'pm_bands'=> $this->pm_band_model->getPmBand()
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
					'to_user_id' => $target_user
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
				$id = $this->pm_band_model->add($data);

				$lastpm = $this->pm_band_model->get_pm_by_bandid($id);
				echo json_encode($lastpm);
			}
		} 
	}
		
	public function view() {
		// $user_profile = $this->user_model->get_by_username($username);
		$target_user = $this->input->post('id');
		$data =  $this->pm_model->view($target_user);
		echo json_encode($data);
	}


	public function getTargetUsername(){
		$target_id = $this->input->post('id');
		$target_user = $this->user_model->get_by_id($target_id);
		echo json_encode($target_user);

	}

	public function getBand(){
		$target_id = $this->input->post('id');
		$band = $this->pm_band_model->get_pm_by_bandid($target_id);
		echo json_encode($band);

	}

	public function addPMBand($band_id) {
		if ($this->input->post()) {
			$data = array(
				'from_user_id' => $this->session->userdata('id'),
				'text'=> $this->input->post('text'),
				'band_id' => $band_id
			);
			//print_r($data);
			$id = $this->pm_band_model->add($data);

			$lastpm = $this->pm_model->get_pm_by_id($id);
			echo json_encode($lastpm);
			//redirect(base_url('pm/'.$data['to_user_id']));

		} 
	}

	public function viewPMBand() {
		// $user_profile = $this->user_model->get_by_username($username);
		$band = $this->input->post('id');
		$data =  $this->pm_band_model->view($band);
		echo json_encode($data);
	}
}

/* End of file pm.php */
/* Location: ./application/controllers/pm.php */
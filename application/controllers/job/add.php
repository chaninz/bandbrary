<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('province_model');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$style = $this->input->post('style');
		$description = $this->input->post('description');
		$venue = $this->input->post('venue');
		$province = $this->input->post('province');
		$budget = $this->input->post('budget');
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		$duration = $this->input->post('duration');

		if ( ! empty($user_id) && ! empty($name) && ! empty($type) && ! empty($style) && ! empty($description) &&
			! empty($venue) && ! empty($province) && ! empty($budget) && ! empty($time) && ! empty($duration)) {
			$time = str_replace('.', ':', $time);
			$data = array('user_id' => $user_id,
				'name' => $name,
				'type_id' => $type,
				'style_id' => $style,
				'description' => $description,
				'venue' => $venue,
				'province_id' => $province,
				'budget' => $budget,
				'date' => $date,
				'time' => $time,
				'duration' => $duration);

			$this->job_model->add($data);
			redirect(base_url('job/my'));
		} else {
			$provinces = $this->province_model->get_th_all();
			$this->load->view('job/add', array('provinces' => $provinces));
		}
		
	}

}

/* End of file add.php */
/* Location: ./application/controllers/job/add.php */
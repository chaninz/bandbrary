<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('province_model');
	}

	public function index($job_id) {
		$job = $this->job_model->get($job_id);

		if ( ! empty($job_id) && ! empty($job)) {
			$current_id = $this->session->userdata('id');
			$user_id = $job->user_id;
			$name = $this->input->post('name');
			$type = $this->input->post('type');
			$style = $this->input->post('style');
			$format = $this->input->post('format');
			$description = $this->input->post('description');
			$venue = $this->input->post('venue');
			$province = $this->input->post('province');
			$budget = $this->input->post('budget');
			$date = $this->input->post('date');
			$time = $this->input->post('time');
			$duration = $this->input->post('duration');

			if ( ! empty($current_id) && ! empty($user_id) && ! empty($name) && ! empty($type) && ! empty($style) &&
				! empty($format) && ! empty($description) && ! empty($venue) && ! empty($province) && ! empty($budget) &&
				! empty($date) && ! empty($time) && ! empty($duration) && $user_id == $current_id) {
				$time = str_replace('.', ':', $time);
				$data = array('user_id' => $user_id,
					'name' => $name,
					'type_id' => $type,
					'style_id' => $style,
					'format_id' => $format,
					'description' => $description,
					'venue' => $venue,
					'province_id' => $province,
					'budget' => $budget,
					'date' => $date,
					'time' => $time,
					'duration' => $duration);

				$this->job_model->edit($job_id, $data);
				redirect(base_url('job/view/'.$job_id));
			} else if ($user_id == $current_id){
				$provinces = $this->province_model->get_all();
				$display = array('job' => $job,
					'provinces' => $provinces);

				$this->load->view('job/edit', $display);
			} else {
				show_404();
			}

		} else {
			show_404();
		}
	}

}

/* End of file edit.php */
/* Location: ./application/controllers/job/edit.php */
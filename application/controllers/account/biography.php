<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biography extends CI_Controller {

	public function edit() {
		if ($this->input->post()) {
			$data = array (
				'id' => $this->session->userdata('id'),
				'biography' => $this->input->post('biography')
				);
			$this->user->updateProfile($data);
		} else {
			$this->load->model('user');
			$data = $this->user->getBiography();
			$this->load->view('editBiography',$data);
		}
	}

}

/* End of file biography.php */
/* Location: ./application/controllers/account/biography.php */
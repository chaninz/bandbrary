<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postcomment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('postcomment_model');
		$this->load->model('post_model');

	}

	public function index() {
		redirect();
	}

	public function add() {
		if ($this->input->post()) {
			$data = array(
			'$user_id' =>  $this->session->userdata('id'),
			'$post_id' => $this->input->post('post_id'),
			'$comment' => $this->input->post('comment')
		);
			$this->postcomment_model->add($data);
		} else {
			$data = $this->post_model->getPost();
			$this->load->view('temp/getPost',$data);
		}
		
	}

	public function delete() {
		$post_id = array('id' => $this->input->get('post_id'));
		$user_type = 1;
		$this->event->delete($post_id, $user_type);
	}

	// public function view() {
	// 	// edit user id to use session
	// 	$user_id = array('user_id' => $this->input->get('user_id'));
	// 	$user_type = 1;
	// 	$query = $this->event->get_by_user($user_id, $user_type);
	// 	// test to print. pls edit to sent data to view
	// 	foreach ($query->result() as $row) {
	// 			echo $row->user_id.' ';
	// 			echo $row->event.'<br/>';
	// 	}
	// }

	public function view($post_id){
		$data = array (
		'post' => $this->post_model->getPost($post_id),
		'comment' => $this->postcomment_model->getComment($post_id),
		'user_id' => $this->session->userdata('id'),
		'name' => $this->session->userdata('name'),
		'photo_url' => $this->session->userdata('photo_url')
		
		);
		// $this->load->view('headerBar',$data);
		// $this->load->view('coverSection');
		// $this->load->view('band/comment',$data);

	}

	public function count($post_id){
		$data = array (
		'post' => $this->post_model->getPost($post_id),
		'count' => $this->postcomment_model->countComment($post_id),
		'user_id' => $this->session->userdata('id'),
		'name' => $this->session->userdata('name'),
		'photo_url' => $this->session->userdata('photo_url')
	
		);
		// $this->load->view('headerBar',$data);
		// $this->load->view('coverSection');
		// $this->load->view('band/comment',$data);
		}
}

/* End of file event.php */
/* Location: ./application/controllers/user/event.php */
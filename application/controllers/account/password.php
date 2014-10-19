<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index(){
		$user_id = $this->session->userdata('id');
		$current_user = $this->user_model->get($user_id);
		$current_password = $this->input->post('current-password');
		$new_password = $this->input->post('new-password');

		if ( ! empty($current_user) && ! empty($current_password) && ! empty($new_password) && ! empty($user_id)) {
			if ($current_user->password == $current_password) {
				$this->user_model->update($user_id, array('password' => $new_password));

				$display = array('msg' => array('type' => 3, 
				'header' => '',
				'text' => 'เปลี่ยนรหัสผ่านเรียบร้อย'));
			} else {
				// current and session not equals
				$display = array('msg' => array('type' => 1, 
				'header' => '',
				'text' => 'รหัสผ่านปัจจุบันไม่ถูกต้อง'));
			}

			$this->load->view('account/change_password', $display);
		} else {
			$this->load->view('account/change_password');
		}
	}

	public function change() {
		
	}

	public function reset() {
		$password = $this->input->post('password');
		$pass_str = $this->input->get('code');

		if ( ! empty($password) && ! empty($pass_str)) {
			// Receive new password from form
			$user = $this->user_model->get_by_pass_str($pass_str);

			if (! empty($user)) {
				// Update new password to database
				$this->user_model->update($user->id, array('password' => $password, 
					'pass_str' => NULL));

				$display = array('msg' => array('type' => 3, 
					'header' => '',
					'text' => 'ตั้งค่ารหัสผ่านใหม่เรียบร้อย <a href="'.base_url('account/signin').'">คลิกที่นี่</a> เพื่อเข้าสู่ระบบ'));
				$this->load->view('account/reset_password', $display);
			} else {
				show_404();
			}
		} else if ( ! empty($pass_str)) {
			// Check if user clicked link from email
			$user = $this->user_model->get_by_pass_str($pass_str);

			if ( ! empty($pass_str) && ! empty($user)) {
				// Code is correct
				$display = array('code' => $pass_str);
				$this->load->view('account/reset_password', $display);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function forgot() {
		$username = $this->input->post('username');

		if ( ! empty($username)) {
			$user = $this->user_model->get_by_username($username);

			if ( ! empty($user)) {
				$rd_string  = random_string('alnum', 32);
				$this->user_model->update($user->id, array('pass_str' => $rd_string));
				$message = $this->load->view('email/forgot_password', array('code' => $rd_string), 'true');

				// Send an email
				$this->email->from('noreply@bandbrary.com', 'Bandbrary');
				$this->email->to($user->email);
				$this->email->subject('รีเซ็ตรหัสผ่าน');
				$this->email->message($message);
				$this->email->send();

				$display = array('msg' => array('type' => 3, 
					'header' => '',
					'text' => 'ส่งข้อมูลรหัสผ่านไปที่อีเมล '.$user->email.' เรียบร้อยแล้ว'));
				$this->load->view('account/forgot_password', $display);
			} else {
				$display = array('msg' => array('type' => 1, 
					'header' => '',
					'text' => 'ไม่มีชื่อผู้ใช้นี้ในระบบ'));
				$this->load->view('account/forgot_password', $display);
			}
		} else {
			$this->load->view('account/forgot_password');
		}
	}	

}

/* End of file password.php */
/* Location: ./application/controllers/account/password.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hook extends CI_Controller {

	private $CI;
	private $exec = TRUE;
	private $dont_exec = array('', 
		'account/signin', 'account/signout', 'account/signup', 
		'account/signup/check_username', 'account/signup/check_email',
		'account/password/forgot', 'account/password/reset');
	private $url_name;

	public function __construct() {
		$this->CI =& get_instance();
		//$controller_name = get_class($this->CI);
		$this->CI->load->helper('url');
		$this->CI->load->model('user_model');
		$this->CI->load->model('join_band_model');
		$this->CI->load->model('band_model');
		$this->CI->load->library('utils');
		$this->url_name = uri_string();
		
		if (in_array($this->url_name, $this->dont_exec))
			echo $this->exec = FALSE;
	}

	public function index() {
		if ($this->exec) {
			if ($this->CI->session->userdata('email')) {

			} else if (get_cookie('id')) {
				// If remember user
				$id = get_cookie('id');
				$user = $this->CI->utils->refresh_user($id);

				// Extend cookie life
				$cookie_id = array('name' => 'id',
					'value' => $user['id'],
					'expire' => '86500');
				set_cookie($cookie_id);

				if (empty($user['name']) && empty($user['surname'])) {
					// First time signin, forward to initial page to complete the profile
					redirect('account/start');
				}
			} else if ($this->CI->session->userdata('name') != NULL &&
				$this->CI->session->userdata('surname') != NULL) {
				// First time signin, forward to initial page to complete the profile
				redirect('account/start');
			} else {
				// Not sign in
				redirect('account/signin?ref='.$this->url_name);
			}
		}
	}

}

/* End of file hook.php */
/* Location: ./application/hooks/hook.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hook extends CI_Controller {

	private $CI;
	private $exec = TRUE;
	private $dont_exec = array('', 'account/signin', 'account/signout');
	private $url_name;

	public function __construct() {
		$this->CI =& get_instance();
		//$controller_name = get_class($this->CI);
		$this->CI->load->helper('url');
		$this->CI->load->model('user_model');
		$this->CI->load->model('join_band_model');
		$this->CI->load->model('band_model');
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
				$result = $this->CI->user_model->get($id);

				$user = array('id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'name' => $result->name,
					'surname' => $result->surname,
					'user_type' => $result->user_type,
					'photo_url' => $result->photo_url,
					'province_id' => $result->province_id,
					'band_id' => NULL,
					'is_master' => NULL);

				if ($user['user_type'] == 2) {
					// Check if he is a musician
					$bid = $this->CI->join_band_model->get_current_band($user['id'])->band_id;
					$is_master = $this->CI->join_band_model->get_current_band($user['id'])->is_master;
					
					if ($bid) {
						// If the user joined band, put id of his band to session
						$user['band_id'] = $bid;
						$user['is_master'] = $is_master;
					}
				}

				// Extend cookie life
				$cookie_id = array('name' => 'id',
					'value' => $user['id'],
					'expire' => '86500');
				set_cookie($cookie_id);

				// Put user data to session
				$this->CI->session->set_userdata($user);

				if (empty($user['name']) && empty($user['surname'])) {
					// First time signin, forward to initial page to complete the profile
					redirect('account/start');
				}
			} else {
				// Not sign in
				redirect('account/signin?ref='.$this->url_name);
			}
		}
	}

}

/* End of file hook.php */
/* Location: ./application/hooks/hook.php */
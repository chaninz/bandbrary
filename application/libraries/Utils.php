<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils {

	private $CI;

	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->model('user_model');
		$this->CI->load->model('join_band_model');
		$this->CI->load->model('band_model');
	}

	public function refresh_user($user_id) {
		$result = $this->CI->user_model->get_by_id($user_id);

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

		// Put user data to session
		$this->CI->session->set_userdata($user);

		return $user;
	}

	public function duration_text($duration) {
		$result = '';
		switch ($duration) {
			case 0.5:
				$result = '30 นาที';
				break;
			case '1':
				$result = '1 ชั่วโมง';
				break;
			case 1.5:
				$result = '1 ชั่วโมง 30 นาที';
				break;
			case 2:
				$result = '2 ชั่วโมง';
				break;
			case 2.5:
				$result = '2 ชั่วโมง 30 นาที';
				break;
			case 3:
				$result = '3 ชั่วโมง';
				break;
			case 3.5:
				$result = '3 ชั่วโมง 30 นาที';
				break;
			case 4:
				$result = '4 ชั่วโมง';
				break;
			case 4.5:
				$result = '4 ชั่วโมง 30 นาที';
				break;
			case 5:
				$result = '5 ชั่วโมง';
				break;
			case 5.5:
				$result = '5 ชั่วโมง 30 นาที';
				break;
			case 6:
				$result = '6 ชั่วโมง';
				break;
			case 0:
				$result = 'มากกว่า 6 ชั่วโมง';
				break;
		}

		return $result;
	}

}

/* End of file Utils.php */
/* Location: ./application/libraries/Utils.php */
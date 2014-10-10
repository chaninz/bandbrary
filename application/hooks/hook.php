<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hook extends CI_Controller {

	private $CI;
	private $exec = TRUE;
	private $dont_exec = array('');

	public function __construct() {
		$this->CI =& get_instance();
		//$controller_name = get_class($this->CI);
		$this->CI->load->helper('url');
		echo uri_string();
		$url_name = uri_string();
		//echo $controller_name;
		if (in_array($url_name, $this->dont_exec))
			echo $this->exec = false;
	}

	public function index() {
		if ($this->exec) {
			print_r($this->CI->session->all_userdata());
		}
	}

}

/* End of file hook.php */
/* Location: ./application/hooks/hook.php */
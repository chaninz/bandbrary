<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join_band_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function get($id){
		$this->db->select('band_id');
		$this->db->from('Join_Band');
		$this->db->where('user_id',$id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */
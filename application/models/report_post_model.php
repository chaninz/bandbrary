<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Post_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('Report_Post',$data);
	}

	function getBand($post_id){
		$this->db->select('Band_Posts.band_id');
		$this->db->from('Report_Post');
		$this->db->join('Band_Posts', 'Band_Posts.id = Report_Post.post_id');
		$this->db->where('Report_Post.post_id',$post_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
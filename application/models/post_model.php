<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {

	function add($data){
		$this->db->insert('Band_Posts',$data);	
	}

	function get_by_user($id, $user_type) {
		if ($user_type == 1) {
			//$query = $this->db->get_where('User_Events', array('user_id' => $id));
		} elseif ($user_type == 2) {
			$query = $this->db->get_where('Band_Posts', array('band_id' => $id));
		}
		$result = $query->result();

		return $result;
	}

	function get_band_post($band_id) {
		return $this->get_by_user($band_id, 2);
	}

	function getPost($post_id){
		$this->db->select('*');
		$this->db->from('Band_Posts');
		$this->db->where('id',$post_id);

		$query = $this->db->get();
		return $query->row();
	}

	function get_all($band_id) {
		$query = $this->db->query('SELECT b.id, b.topic, b.post, b.image_url, b.timestamp, COUNT(c .id) AS count, COUNT(c.id) AS total_comments 
			FROM Band_Posts b 
			LEFT JOIN Post_Comments c ON b.id = c.post_id 
			WHERE b.band_id = '.$band_id.'
			GROUP BY b.id,b.topic,b.post,b.image_url,b.timestamp
			ORDER BY b.timestamp DESC
			');
		$result = $query->result();
		
		return $result;
	}

	function editPost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Band_Posts',$data);
	}

	function deletePost($post_id){
		$this->db->where('id',$post_id);
		$this->db->delete('Band_Posts');
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
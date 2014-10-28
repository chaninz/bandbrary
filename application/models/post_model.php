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

	function getAllPost($band_id){
		// $this->db->select('*');
		// $this->db->from('Band_Posts');
		// $this->db-join()
		// $this->db->where('band_id',$band_id);

		$query = $this->db->query('SELECT b.id ,b.topic,b.post,b.image_url,b.timestamp,count(c .id) as count,count(c.id) as total_comments FROM Band_Posts b left join Post_Comments c on b.id = c.post_id  WHERE b.band_id = '.$band_id.' group by b.id,b.topic,b.post,b.image_url,b.timestamp');
		return $query->result();
	}

	function editPost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('Band_Posts',$data);
	}

	function deletePost($data){
		$id = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->delete('Band_Posts',$data);
	}

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
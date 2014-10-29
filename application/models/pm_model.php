<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_model extends CI_Model {

	function __construct(){
		parent::__construct();	
	}

	function add($data){
		$this->db->insert('PM_Users',$data);
		$id = $this->db->insert_id();
		return $id;	
	}
	
	function view($target_user){
		$current_id = $this->session->userdata('id');
		// $array = array(
		// 	'PM_Users.from_user_id' => $current_id,
		// 	'PM_Users.to_user_id' => $target_user
		// );

		// $array2 = array(
		// 	'PM_Users.from_user_id' => $target_user,
		// 	'PM_Users.to_user_id' => $current_id
		// );
		
		// $this->db->select('PM_Users.*,f.name as from_user_name ,f.surname as from_user_surname ,t.username as target,f.photo_url as from_photo,t.photo_url as to_photo');
		// $this->db->from('PM_Users');
		// $this->db->join('Users AS f', 'PM_Users.from_user_id = f.id');
		// $this->db->join('Users AS t', 'PM_Users.to_user_id = t.id');
		// $this->db->where($array);
		// $this->db->or_where($array2);
		// $this->db->order_by("PM_Users.timestamp", "asc"); 

		$query = $this->db->query('select PM_Users.*,f.name as from_user_name ,f.surname as from_user_surname ,t.username as target,f.photo_url as from_photo,t.photo_url as to_photo
									from PM_Users join Users AS f on PM_Users.from_user_id = f.id
									join Users AS t on  PM_Users.to_user_id = t.id
									where 
									(PM_Users.from_user_id = '.$current_id.' and PM_Users.to_user_id = '.$target_user.') 
									or (PM_Users.from_user_id ='.$target_user.' and PM_Users.to_user_id='.$current_id.')
									order by PM_Users.timestamp ');
		return $query->result();

		// $query = $this->db->get();
		// return $query->result();
	}

	function delete($data){
		$current_id = $this->session->userdata('id');
		$this->db->where('id',$current_id);
		$this->db->delete('Greedd',$data);
	}

	function get_all(){
		// $current_id = $this->session->userdata('id');
		// $this->db->select('*');
		// $this->db->distinct();
		// $this->db->from('PM_Users');
		// $this->db->join('Users', 'PM_Users.from_user_id = Users.id');
		// $this->db->where('from_user_id',$current_id);

		// $query = $this->db->get();
		// return $query->result();


		$current_id = $this->session->userdata('id');
		
		$query = $this->db->query('select DISTINCT pm1.from_user_id,pm1.text,pm1.timestamp,u.* 
							from PM_Users pm1
                            join Users u on pm1.from_user_id  = u.id
							where pm1.timestamp =
							(select max(pm2.timestamp) 
							from PM_Users pm2
							where pm1.from_user_id = pm2.from_user_id)
							and pm1.to_user_id='.$current_id .'
							order by pm1.timestamp desc');
		return $query->result();
	}
	
	function get_pm_by_id($id){
		$this->db->select('PM_Users.*,f.name as from_user_name ,f.surname as from_user_surname ,t.username as target,f.photo_url as from_photo,t.photo_url as to_photo');
		$this->db->from('PM_Users');
		$this->db->join('Users AS f', 'PM_Users.from_user_id = f.id');
		$this->db->join('Users AS t', 'PM_Users.to_user_id = t.id');
		$this->db->where('PM_Users.id',$id);	
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
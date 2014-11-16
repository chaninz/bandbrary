<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm_user_and_band_model extends CI_Model {

	function __construct(){
		parent::__construct();	
		$this->load->model('join_band_model','Join_Band');
	}

	function add($data){
		$this->db->insert('PM_User_And_Band',$data);
		$id = $this->db->insert_id();
		return $id;	
	}


	function last_group(){
		$this->db->select('max(pm_group_id) as max');
		$this->db->from('PM_User_And_Band');
		$id = $this->db->get();
		return $id->result();	
	}

	function getMsgToBand(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}

		$query = $this->db->query('
			select pm1.*,u.name,u.surname,u.photo_url,b.name as band_name,b.photo_url as band_photo
			from  PM_User_And_Band pm1
            join Users u on pm1.user_id  = u.id
            join Bands b on pm1.band_id = b.id
            where pm1.id in (select pm2.id 
                             from PM_User_And_Band pm2
                            where pm1.pm_group_id = pm2.pm_group_id
                           and pm2.timestamp = (
                               select max(pm3.timestamp) 
                               from PM_User_And_Band pm3
                               where pm2.pm_group_id = pm3.pm_group_id
                               ) ) and
                 				pm1.pm_group_id in (select pm4.pm_group_id from 
                 					Receive_Noti_User_Band r join	
                 					PM_User_And_Band pm4 on r.receive_id = pm4.id
                                    where r.user_id ='.$user_id.'
                                     group by pm4.pm_group_id
                                    )
      	');
		return $query->result();
	}

	function getCountMsgToBand(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}

		$query = $this->db->query('
			select p.pm_group_id, count(*) as total_unseen from PM_User_And_Band p 
			join Receive_Noti_User_Band r on p.id = r.receive_id 
			where r.user_id = '.$user_id.'  and r.seen_date is null group by p.pm_group_id
						
		');
		return $query->result();
	}

	function view($pm_group_id){
		$query = $this->db->query('select p.*,Users.name,Users.surname,Users.photo_url AS from_photo,Bands.photo_url as band_photo,Bands.name as bandname
									FROM PM_User_And_Band p 
									Join Users on Users.id = p.user_id 
									join Bands on p.band_id = Bands.id
									where p.pm_group_id = '.$pm_group_id.'
									order by p.timestamp');
		return $query->result();
	}

	function isExistGroup($user_id,$band_id){
		$query = $this->db->query('select pm_group_id
from PM_User_And_Band p 
where user_id = '.$user_id.' and band_id = '.$band_id.'
group by pm_group_id
');
		return $query->result();
	}

	function getBandFromGroup($pm_group_id){
		$query = $this->db->query('select band_id
from PM_User_And_Band p 
where  pm_group_id = '.$pm_group_id.'
group by band_id
');
		return $query->result();
	}

	function get_pm_by_id($id){
		$this->db->select('p.*,f.name as from_user_name ,f.surname as from_user_surname ,f.photo_url as from_photo,Bands.photo_url as band_photo,Bands.name as bandname');
		$this->db->from('PM_User_And_Band p');
		$this->db->join('Users f', 'p.user_id = f.id');
		$this->db->join('Bands', 'p.band_id = Bands.id');
		$this->db->where('p.id',$id);	
		$query = $this->db->get();
		return $query->result();
	}

function getOwnerGroup(){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}
		$query = $this->db->query('select  p.pm_group_id,u.name,u.surname,u.photo_url
									from Users u
									join PM_User_And_Band p on u.id = p.user_id
									where p.role = \'user\' and p.pm_group_id in (
									select p.pm_group_id from PM_User_And_Band p 
												join Receive_Noti_User_Band r on p.id = r.receive_id 
												where r.user_id = '.$user_id.' and r.band_id = '.$band_id.'  group by p.pm_group_id
									    )
    								group by p.pm_group_id');
		return $query->result();
	}

	function getOwnerbyGroup($pm_group_id){
		$user_id = $this->session->userdata('id');
		$band_id = $this->Join_Band->get_current_band($user_id);
		if($band_id == null){
			$band_id = 0;
		}else{
			$band_id = $band_id->band_id;
		}
		$query = $this->db->query('select  u.id,u.name,u.surname,u.photo_url
									from Users u
									join PM_User_And_Band p on u.id = p.user_id
									where p.role = \'user\' and p.pm_group_id = '.$pm_group_id.'
    								group by p.pm_group_id');
		return $query->row();
	}
	



}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */
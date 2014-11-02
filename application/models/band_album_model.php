<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_album_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function create($data) {
		$this->db->insert('Band_Albums', $data);
	}
	function delete($data) {
		$this->db->delete('Band_Albums', $data);
	}	

	function edit($data,$album_id){
		$this->db->where('id',$album_id);
		$this->db->update('Band_Albums',$data);
	}
	
	function getAll(){
		$band_id = $this->session->userdata('band_id');
		$this->db->select('*');
		$this->db->from('Band_Albums');
		$this->db->where('band_id',$band_id);

		$query = $this->db->get();
		return $query->result();
	}

	function getAlbum($album_id){
		$this->db->select('*');
		$this->db->from('Band_Albums');
		$this->db->where('id',$album_id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */
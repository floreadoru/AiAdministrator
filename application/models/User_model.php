<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
	}

	public function addUser($data)
	{

		$runOk = $this->db->insert('users', $data);
		return $runOk;

	}
	
	public function getUsersByAssociationId($id)
	{
		$users = array();
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_association_id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$users = $query->result_array();

		} else ;

		return $users;
	}	
	
	public function getUserById($id)
	{
		$association = false;
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$association = $query->row();

		} else ;

		return $association;
	}
	
}

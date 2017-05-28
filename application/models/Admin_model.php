<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
	}	
	
	public function getAdminById($id)
	{
		$admin = false;
		
		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where('id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$admin = $query->row();

		} else ;

		return $admin;
	}
	
	


}

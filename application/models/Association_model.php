<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Association_model extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
	}
	
	public function addAssociation($data)
	{

		$runOk = $this->db->insert('associations', $data);
		return $runOk;

	}
	
	public function getAllAssociations()
	{
		$all_associations = array();
		
		$this->db->select('*');
		$this->db->from('associations');

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$all_associations = $query->result_array();

		} else ;

		return $all_associations;
	}

	public function getAssociationsByAdminId($admin_id)
	{
		$all_associations = array();
		
		$this->db->select('*');
		$this->db->from('associations');
		$this->db->where('admin_id', $admin_id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$all_associations = $query->result_array();

		} else ;

		return $all_associations;
	}	
	
	public function getAssociationById($id)
	{
		$association = false;
		
		$this->db->select('*');
		$this->db->from('associations');
		$this->db->where('id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$association = $query->row();

		} else ;

		return $association;
	}
	
	public function getDistinctAssociationsStreetsByAdminId($admin_id)
	{
		$all_associations = array();
		
		$this->db->distinct('association_street');
		$this->db->select('association_street');
		$this->db->from('associations');
		$this->db->where('admin_id', $admin_id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$all_associations = $query->result_array();

		} else ;

		return $all_associations;
	}
	
	public function getDistinctAssociationsStreetsNrByAdminId($admin_id)
	{
		$all_associations = array();
		
		$this->db->distinct('association_street_nr');
		$this->db->select('association_street_nr');
		$this->db->from('associations');
		$this->db->where('admin_id', $admin_id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$all_associations = $query->result_array();

		} else ;

		return $all_associations;
	}
	
	public function getDistinctAssociationsBuildingByAdminId($admin_id)
	{
		$all_associations = array();
		
		$this->db->distinct('association_building');
		$this->db->select('association_building');
		$this->db->from('associations');
		$this->db->where('admin_id', $admin_id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$all_associations = $query->result_array();

		} else ;

		return $all_associations;
	}
	
	public function getDistinctAssociationsEntranceByAdminId($admin_id)
	{
		$all_associations = array();
		
		$this->db->distinct('association_entrance');
		$this->db->select('association_entrance');
		$this->db->from('associations');
		$this->db->where('admin_id', $admin_id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$all_associations = $query->result_array();

		} else ;

		return $all_associations;
	}
	
	public function checkAssociationExistence($user_street, $user_street_number, $user_building, $user_entrance)
	{
		$response = false;
		
		$this->db->select('*');
		$this->db->from('associations');
		$this->db->where('association_street', $user_street);
		$this->db->where('association_street_nr', $user_street_number);
		$this->db->where('association_building', $user_building);
		$this->db->where('association_entrance', $user_entrance);
		$query = $this->db->get();
		
		if ( ($query) && ($query->num_rows() > 0) ) {

			$response = $query->row();
			return $response->id;

		} else ;
		
	}
	
}

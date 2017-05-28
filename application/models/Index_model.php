<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index_model extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
	}

	public function addIndex($data)
	{

		$runOk = $this->db->insert('index', $data);
		return $runOk;

	}
	
	public function getIndexesByUserId($id)
	{
		$indexes = array();
		
		$this->db->select('*');
		$this->db->from('index');
		$this->db->order_by("index_adate", "desc");
		$this->db->where('index_user_id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$indexes = $query->result_array();

		} else ;

		return $indexes;
	}	
	
	public function getColdIndexByUserId($id)
	{
		$cold_index = 0;
		
		$this->db->select_sum('index_cold_water');
		$this->db->from('index');
		$this->db->where('index_user_id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$cold_index = $query->row()->index_cold_water;

		} else ;

		return $cold_index;
	}
	
	public function getHotIndexByUserId($id)
	{
		$hot_index = 0;
		
		$this->db->select_sum('index_hot_water');
		$this->db->from('index');
		$this->db->where('index_user_id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$hot_index = $query->row()->index_hot_water;

		} else ;

		return $hot_index;
	}
	
	public function getIndexById($id)
	{
		$index = false;
		
		$this->db->select('*');
		$this->db->from('index');
		$this->db->where('id', $id);	

		$query = $this->db->get();

		if ( ($query) && ($query->num_rows() > 0) ) {

			$index = $query->row();

		} else ;

		return $index;
	}
	
}

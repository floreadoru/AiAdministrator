<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexes extends My_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->isOnlineUser(array('user'));
		
		$hdata = array();
		$data = array();
		
		$this->wsTitle = 'Index';
		$this->load->model('Association_model');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
		$this->load->model('Index_model');
		
		$user_data = $this->User_model->getUserById($this->session->userdata('id'));
		
		$user_association_id = $user_data->user_association_id;
		$association = $this->Association_model->getAssociationById($user_association_id);
		$admin_id = $association->admin_id;
		$admin_data = $this->Admin_model->getAdminById($admin_id);
		
		$sum_cold_index = $this->Index_model->getColdIndexByUserId($this->session->userdata('id'));
		$sum_hot_index = $this->Index_model->getHotIndexByUserId($this->session->userdata('id'));
				
		$hdata["association"] = $association;
		$data["user_data"]    = $user_data;
		$data["admin_data"]   = $admin_data;
		$data["sum_cold_index"]   = $sum_cold_index;
		$data["sum_hot_index"]   = $sum_hot_index;
		
		$this->user_template('user/dashboard', $hdata, $data);
	}
		
		

	

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ( ! IS_AJAX) die('AJAX Requests only!');
	}
	
	public function index()
	{
		redirect();
	}
	
	public function get_association($id)
	{
		$this->isOnlineAdmin(array('admin'));
		
		$this->load->model('Association_model');
		
		$data = $this->Association_model->getAssociationById($id);
		
		$this->load->view('ajax/json', array('json' => json_encode($data)));
	}
	
	public function users_list($id)
	{
		
		$this->load->model('User_model');
		$data = $this->User_model->getUsersByAssociationId($id);
		
		$this->load->view('ajax/users_list', array('users' => $data));
		
	}
	
}
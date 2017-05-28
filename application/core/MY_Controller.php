<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	
	public $userOnline		= false;
	public $userType		= NULL;
	
	public $wsBeforeHead      = '';
	public $wsBeforeBody      = '';
	
	public $wsName			= SITENAME;
	public $wsTitle			= SITENAME;
	
	function __construct()
	{
		parent::__construct();
		

		$this->output->set_header(base64_decode(WS_APP_DS));
		
		header("Content-type: text/html; charset=utf-8");
		header("Cache-Control: no-cache, no-store, must-revalidate");
		header("Pragma: no-cache");
		header("X-UA-Compatible: IE=Edge");
		
		if ( ($this->session->userdata('online')) && ($this->session->userdata('id') > 0) ) {
			
			$this->userOnline = true;
			$this->userType = $this->session->userdata('type');
			
		} else ;
	}
	
	public function admin_template($view, $hdata = array(), $data = array(), $fdata = array())
	{
		$this->load->view('templates/admin/header', $hdata);
		$this->load->view($view, $data);
		$this->load->view('templates/admin/footer', $fdata);
	}
	
	public function user_template($view, $hdata = array(), $data = array(), $fdata = array())
	{
		$this->load->view('templates/user/header', $hdata);
		$this->load->view($view, $data);
		$this->load->view('templates/user/footer', $fdata);
	}
	
	public function isOnlineAdmin($permissionArr, $userOnly = true)
	{
		if ($this->userOnline) {
			
			if ( ! $userOnly) {
				
				//redirect('/user/dashboard');
				
			} else {
				
				if ( ($permissionArr != NULL) && ( ! in_array($this->userType, $permissionArr)) ) {
					
					redirect('/admin/warning');
					
				} else ;
			}
			
		} else {
			
			if ($userOnly) {
				
				redirect('/admin/login');
				
			} else ;
		}
	}
	
	public function isOnlineUser($permissionArr, $userOnly = true)
	{
		if ($this->userOnline) {
			
			if ( ! $userOnly) {
				
				//redirect('/user/dashboard');
				
			} else {
				
				if ( ($permissionArr != NULL) && ( ! in_array($this->userType, $permissionArr)) ) {
					
					redirect('/user/warning');
					
				} else ;
			}
			
		} else {
			
			if ($userOnly) {
				
				redirect('/user/login');
				
			} else ;
		}
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if ($this->userOnline) {
			
			redirect('/user/dashboard');
			
		} else {
			
			redirect('/user/login');
		}
	}
	
	public function dashboard()
	{
		$this->isOnlineUser(array('user'));
		
		$hdata = array();
		$data = array();
		
		$this->wsTitle = 'Panou Control';
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
		
		if( ($this->input->post('send_index_submit')) ) {	
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules(
				array(
					array(
						'field' => 'index_cold_water',
						'label' => 'Apa rece',
						'rules' => 'required'
					),
					array(
						'field' => 'index_hot_water',
						'label' => 'Apa calda',
						'rules' => 'required'
					)				
				)
			);
			
			
			if ($this->form_validation->run() == false) {
				
				$this->session->set_flashdata('error', VALIDATIONERROR . validation_errors());
				
			} else {
			
				$dataInsert = array(
					'index_adate'         => date("Y-m-d H:i:s"),
					'index_cold_water'    => $this->input->post('index_cold_water'),
					'index_hot_water'    => $this->input->post('index_hot_water'),
					'index_user_id'        => $this->session->userdata('id'),
				);
				
				$runOk = $this->Index_model->addIndex($dataInsert);
				
				if ($runOk  && ($this->db->insert_id() > 0) ) {
					
					$this->session->set_flashdata('success', 'Indexul a fost adaugat cu succes!');

				} else {

					$this->session->set_flashdata('error', 'Eroare la introducerea indexului!<br> Încearcă din nou.<br> ' . '[MySQL Error: ' . $this->db->error() . ']');
					
				}

				redirect('/user/dashboard');
				
			} 
			
		} else;
		
		$this->user_template('user/dashboard', $hdata, $data);
	}
		
		
	public function indexes()
	{
		$this->isOnlineUser(array('user'));
		
		$hdata = array();
		$data = array();
		
		$this->wsTitle = 'Panou Control';
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
		$user_istoric_index = $this->Index_model->getIndexesByUserId($this->session->userdata('id'));
				
		$hdata["association"] = $association;
		$data["user_data"]    = $user_data;
		$data["admin_data"]   = $admin_data;
		$data["sum_cold_index"]   = $sum_cold_index;
		$data["sum_hot_index"]   = $sum_hot_index;
		$data["istoric_index"]  = $user_istoric_index;

		if( ($this->input->post('send_index_submit')) ) {	
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules(
				array(
					array(
						'field' => 'index_cold_water',
						'label' => 'Apa rece',
						'rules' => 'required'
					),
					array(
						'field' => 'index_hot_water',
						'label' => 'Apa calda',
						'rules' => 'required'
					)				
				)
			);
			
			
			if ($this->form_validation->run() == false) {
				
				$this->session->set_flashdata('error', VALIDATIONERROR . validation_errors());
				
			} else {
			
				$dataInsert = array(
					'index_adate'         => date("Y-m-d H:i:s"),
					'index_cold_water'    => $this->input->post('index_cold_water'),
					'index_hot_water'    => $this->input->post('index_hot_water'),
					'index_user_id'        => $this->session->userdata('id'),
				);
				
				$runOk = $this->Index_model->addIndex($dataInsert);
				
				if ($runOk  && ($this->db->insert_id() > 0) ) {
					
					$this->session->set_flashdata('success', 'Indexul a fost adaugat cu succes!');

				} else {

					$this->session->set_flashdata('error', 'Eroare la introducerea indexului!<br> Încearcă din nou.<br> ' . '[MySQL Error: ' . $this->db->error() . ']');
					
				}

				redirect('/user/indexes');
				
			} 
			
		} else;
		
		$this->user_template('user/indexes', $hdata, $data);

	}		
		
	public function warning()
	{
		$this->isOnlineUser(array('user'));
		
		$hdata = array();
		$data = array();
		
		$this->wsTitle = 'Panou de Control';
		$this->wsBreadcrumb = array();
		$this->wsBreadcrumb['user/warning'] = 'Atenţionare';
		
		$this->user_template('user/warning', $hdata, $data);
	}
	
	public function login()
	{
		$this->isOnlineUser(NULL, false);
		
		if ($this->userOnline) {
			
			redirect('/user/dashboard');
			
		}
		$data = array();
		
		$this->wsTitle =  'Autentificare Locatar';
		
		if ( ($this->input->post('user_email')) && ($this->input->post('user_pass')) ) {
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('user_pass', 'password', 'required|min_length[6]|max_length[30]');
			
			if ($this->form_validation->run() == false) {
				
				$this->session->set_flashdata('error', VALIDATIONERROR . validation_errors());
				
			} else {
				
				$user_email = $this->input->post('user_email'); 
				$user_pass = $this->input->post('user_pass'); 

				// To protect MySQL injection
				$user_email = stripslashes($user_email);
				$user_pass = md5(stripslashes($user_pass));
				
				$this->db->from('users');
				$this->db->where('user_email', $user_email);
				$this->db->where('user_pass', $user_pass);
				
				$query = $this->db->get();
				
				if ($query->num_rows() == 1) {
					
					$row = $query->row();
					
					switch ($row->user_status) {
						
						case 'ACTIV' : {
							
							$ts = date('Y-m-d H:i:s');
							
							$this->db->set('last_login', $ts);
							$this->db->where('id', $row->id);
							$this->db->update('users');
							
							$userData = array(
								'id'		  => $row->id,
								'name'		  => $row->user_first_name . ' ' . $row->user_last_name,
								'type'		  => 'user',
								'online'	  => true
							);
							
							$this->session->set_userdata($userData);
							
							redirect('/user/dashboard');
							
						} break;
						
						default : {
							
							$this->session->set_flashdata('error', 'Contul tău nu este activ sau a fost închis / şters!<br> Încearcă din nou.');
						}
					}
					
				} else {
					
					$this->session->set_flashdata('error', 'Datele de autentificare nu sunt corecte!<br> Încearcă din nou.');
				}
			}
			
			redirect('/user/login');
			
		} else ;
		
		$this->load->view('user/login', $data);
	}
	
	public function logout()
	{
		$this->isOnlineUser(NULL);
		
		$this->session->set_userdata('online', false);
		
		$this->session->sess_destroy();
		
		redirect();
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends My_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if ($this->userOnline) {
			
			redirect('/admin/dashboard');
			
		} else {
			
			redirect('/admin/login');
		}
	}
	
	public function dashboard()
	{
		$this->isOnlineAdmin(array('admin'));
		
		$hdata = array();
		$data  = array();
		$fdata = array();
		
		$this->load->model('Association_model');
		$associations = $this->Association_model->getAssociationsByAdminId($this->session->userdata('id'));
		
		$hdata["associations"] = $associations;

		
		$this->wsTitle = 'Panou Control';	
		
		$this->admin_template('admin/dashboard', $hdata, $data);
	}
	
	public function users()
	{
		$this->isOnlineAdmin(array('admin'));
		
		$hdata = array();
		$data  = array();
		$fdata = array();
		
		$this->load->model('Association_model');
		$associations = $this->Association_model->getAssociationsByAdminId($this->session->userdata('id'));
		
		$hdata["associations"] = $associations;

		$this->wsTitle = 'Locatari';	
		
		$this->admin_template('admin/users', $hdata, $data);
	}
	
	public function add_new_user()
	{
		$this->isOnlineAdmin(array('admin'));
		
		$hdata = array();
		$data  = array();
		$fdata = array();
		
		$this->load->model('Association_model');
		$associations = $this->Association_model->getAssociationsByAdminId($this->session->userdata('id'));
		$hdata["associations"] = $associations;
		
		$distinct_associations_street = $this->Association_model->getDistinctAssociationsStreetsByAdminId($this->session->userdata('id'));
		$distinct_associations_street_nr = $this->Association_model->getDistinctAssociationsStreetsNrByAdminId($this->session->userdata('id'));
		$distinct_associations_building = $this->Association_model->getDistinctAssociationsBuildingByAdminId($this->session->userdata('id'));
		$distinct_associations_entrance = $this->Association_model->getDistinctAssociationsEntranceByAdminId($this->session->userdata('id'));
		$data["distinct_associations_street"] = $distinct_associations_street;
		$data["distinct_associations_street_nr"] = $distinct_associations_street_nr;
		$data["distinct_associations_building"] = $distinct_associations_building;
		$data["distinct_associations_entrance"] = $distinct_associations_entrance;
		$this->wsTitle = 'Adauga locatar';	
		
		if( ($this->input->post('add_new_user')) ) {	
			
			$this->load->library('form_validation');
			$this->load->model('User_model');
			
			$this->form_validation->set_rules(
				array(
					array(
						'field' => 'user_first_name',
						'label' => 'Nume',
						'rules' => 'required'
					),
					array(
						'field' => 'user_last_name',
						'label' => 'Prenume',
						'rules' => 'required'
					),
					array(
						'field' => 'user_email',
						'label' => 'Email',
						'rules' => 'required'
					),
					array(
						'field' => 'user_phone',
						'label' => 'Numar de telefon',
						'rules' => 'required'
					),
					array(
						'field' => 'user_pass',
						'label' => 'Parola',
						'rules' => 'required'
					),
					array(
						'field' => 'user_pass_repeat',
						'label' => 'Repeta parola',
						'rules' => 'required|matches[user_pass]'
					),
					array(
						'field' => 'user_floor_number',
						'label' => 'Etaj',
						'rules' => 'required'
					),
					array(
						'field' => 'user_apartment_number',
						'label' => 'Nr apartament',
						'rules' => 'required'
					),
					array(
						'field' => 'user_rooms_nr',
						'label' => 'Nr. camere',
						'rules' => 'required'
					)				
				)
			);
			
			$check_association_existence = $this->Association_model->checkAssociationExistence($this->input->post('user_street'), $this->input->post('user_street_number'), $this->input->post('user_building'), $this->input->post('user_entrance'));
			
			if($check_association_existence){
				
				$user_association_id = $check_association_existence;
				
			} else {
				
				$this->session->set_flashdata('error', 'Momentan pentru adresa selectata nu exista o asociatie!');
				$this->form_validation->set_rules(
						'username', 'Username',
						array(
								'required',
								array(
										'username_callable',
										function($str)
										{
												return false;
										}
								)
						)
				);
				
				$this->form_validation->set_message('username_callable', 'Momentan pentru adresa selectata nu exista asociatie in sistem!');
				
			}
			
			
			
			if ($this->form_validation->run() == false) {
				
				$this->session->set_flashdata('error', VALIDATIONERROR . validation_errors());
				
			} else {
			
				$dataInsert = array(
					'user_adate'         => date("Y-m-d H:i:s"),
					'last_login'         => date("Y-m-d H:i:s"),
					'user_status'        => 'ACTIV',
					'approved_by'        => $this->session->userdata('id'),
					'user_first_name'          => $this->input->post('user_first_name'),
					'user_last_name'          => $this->input->post('user_last_name'),
					'user_email'           => $this->input->post('user_email'),
					'user_pass' => $this->input->post('user_pass'),
					'user_zip_code'           => $this->input->post('user_zip_code'),
					'user_street'        => $this->input->post('user_street'),
					'user_street_number'     => $this->input->post('user_street_number'),
					'user_building'      => $this->input->post('user_building'),
					'user_entrance'      => $this->input->post('user_entrance'),
					'user_floor_number'      => $this->input->post('user_floor_number'),
					'user_apartment_number'      => $this->input->post('user_apartment_number'),
					'user_phone'      => $this->input->post('user_phone'),
					'user_rooms_nr'      => $this->input->post('user_rooms_nr'),
					'user_persons_nr'      => $this->input->post('user_persons_nr'),
					'user_association_id'      => $user_association_id
					
				);
				
				$runOk = $this->User_model->addUser($dataInsert);
				
				if ($runOk  && ($this->db->insert_id() > 0) ) {
					
					$this->session->set_flashdata('success', 'Locatarul a fost adaugat cu succes!');

				} else {

					$this->session->set_flashdata('error', 'Eroare la crearea locatarului!<br> Încearcă din nou.<br> ' . '[MySQL Error: ' . $this->db->error() . ']');
					
				}

				redirect('/admin/users');
				
			} 
			
		} else;

			$this->admin_template('admin/add_new_user', $hdata, $data);
	}
	
	public function associations()
	{
		$this->isOnlineAdmin(array('admin'));
		
		$hdata = array();
		$data  = array();
		$fdata = array();
		
		$this->load->model('Association_model');
		$associations = $this->Association_model->getAssociationsByAdminId($this->session->userdata('id'));
		$hdata["associations"] = $associations;
		
		$associations = $this->Association_model->getAllAssociations();
		$data["associations"] = $associations;

		$this->wsTitle = 'Asociatii';	
		
		$this->admin_template('admin/associations', $hdata, $data);
	}
	
	public function add_new_association()
	{
		$this->isOnlineAdmin(array('admin'));
		
		$hdata = array();
		$data  = array();
		$fdata = array();
		
		$this->load->model('Association_model');
		$associations = $this->Association_model->getAssociationsByAdminId($this->session->userdata('id'));
		$hdata["associations"] = $associations;

		$this->wsTitle = 'Adauga asociatie';
		if( ($this->input->post('add_new_association')) ) {	

			$this->load->model('Association_model');
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules(
				array(
					array(
						'field' => 'association_name',
						'label' => 'Nume asociatie',
						'rules' => 'required'
					),
					array(
						'field' => 'association_iban',
						'label' => 'IBAN',
						'rules' => 'required'
					),
					array(
						'field' => 'association_cui',
						'label' => 'CUI',
						'rules' => 'required'
					),
					array(
						'field' => 'association_apartments_nr',
						'label' => 'Nr. apartamente',
						'rules' => 'required'
					),
					array(
						'field' => 'association_street',
						'label' => 'Strada',
						'rules' => 'required'
					),
					array(
						'field' => 'association_street_nr',
						'label' => 'Nr. strada',
						'rules' => 'required'
					),
					array(
						'field' => 'association_building',
						'label' => 'Bloc',
						'rules' => 'required'
					),
					array(
						'field' => 'association_entrance',
						'label' => 'Scara',
						'rules' => 'required'
					),
					array(
						'field' => 'association_zip',
						'label' => 'Cod postal',
						'rules' => 'required'
					)					
				)
			);
			if ($this->form_validation->run() == false) {
				
				$this->session->set_flashdata('error', VALIDATIONERROR . validation_errors());
				
			} else {
			
				$dataInsert = array(
					'association_adate'         => date("Y-m-d H:i:s"),
					'association_name'          => $this->input->post('association_name'),
					'association_iban'          => $this->input->post('association_iban'),
					'association_cui'           => $this->input->post('association_cui'),
					'association_apartments_nr' => $this->input->post('association_apartments_nr'),
					'association_zip'           => $this->input->post('association_zip'),
					'association_street'        => $this->input->post('association_street'),
					'association_street_nr'     => $this->input->post('association_street_nr'),
					'association_building'      => $this->input->post('association_building'),
					'association_entrance'      => $this->input->post('association_entrance'),
					'admin_id'                  => $this->session->userdata('id')
				);
				
				$runOk = $this->Association_model->addAssociation($dataInsert);
				
				if ($runOk  && ($this->db->insert_id() > 0) ) {
					
					$this->session->set_flashdata('success', 'Asociatia a fost adaugat cu succes!');

				} else {

					$this->session->set_flashdata('error', 'Eroare la crearea asociatiei!<br> Încearcă din nou.<br> ' . '[MySQL Error: ' . $this->db->error() . ']');
					
				}

				redirect('/admin/associations');
			
			}
			
		}	else;

		$this->admin_template('admin/add_new_association', $hdata, $data);		
		
		
	}
	
	public function warning()
	{
		$this->isOnlineAdmin(array('admin'));
		
		$hdata = array();
		$data = array();
		
		$this->wsTitle = 'Panou de Control';
		
		$this->dashboard_template('admin/warning', $hdata, $data);
	}
	
	public function login()
	{
		$this->isOnlineAdmin(NULL, false);
		
		if ($this->userOnline) {
			
			redirect('/admin/dashboard');
			
		}
		$data = array();
		
		$this->wsTitle =  'Autentificare Admin';
		
		if ( ($this->input->post('admin_email')) && ($this->input->post('admin_pass')) ) {
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('admin_pass', 'password', 'required|min_length[6]|max_length[30]');
			
			if ($this->form_validation->run() == false) {
				
				$this->session->set_flashdata('error', VALIDATIONERROR . validation_errors());
				
			} else {
				
				$admin_email = $this->input->post('admin_email'); 
				$admin_pass = $this->input->post('admin_pass'); 

				// To protect MySQL injection
				$admin_email = stripslashes($admin_email);
				$admin_pass = md5(stripslashes($admin_pass));
				
				$this->db->from('admins');
				$this->db->where('admin_email', $admin_email);
				$this->db->where('admin_pass', $admin_pass);
				
				$query = $this->db->get();
				
				if ($query->num_rows() == 1) {
					
					$row = $query->row();
					
					switch ($row->admin_status) {
						
						case 'ACTIV' : {
							
							$ts = date('Y-m-d H:i:s');
							
							$this->db->set('last_login', $ts);
							$this->db->where('id', $row->id);
							$this->db->update('admins');
							
							$userData = array(
								'id'		  => $row->id,
								'name'		  => $row->admin_first_name . ' ' . $row->admin_last_name,
								'type'		  => 'admin',
								'online'	  => true
							);
							
							$this->session->set_userdata($userData);
							
							redirect('/admin/dashboard');
							
						} break;
						
						default : {
							
							$this->session->set_flashdata('error', 'Contul tău nu este activ sau a fost închis / şters!<br> Încearcă din nou.');
						}
					}
					
				} else {
					
					$this->session->set_flashdata('error', 'Datele de autentificare nu sunt corecte!<br> Încearcă din nou.');
				}
			}
			
			redirect('/admin/login');
			
		} else ;
		
		$this->load->view('admin/login', $data);
	}
	
	public function logout()
	{
		$this->isOnlineAdmin(NULL);
		
		$this->session->set_userdata('online', false);
		
		$this->session->sess_destroy();
		
		redirect();
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_Con extends CI_Controller 
{
    public function __construct() {
        parent:: __construct();
		
       // $this->load->helper("url");
        $this->load->model("Register_Model");
        $this->load->library("form_validation");
    }

	//create a new user
	function index()
	{
		//load the registration helper under helper folder
		$this->load->helper('registration');
		
		$this->data['title'] = "Register User";

		//validate form input
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('surname', 'Surname', 'required|xss_clean');
		$this->form_validation->set_rules('birth_date_year', 'Year', 'xss_clean');
		$this->form_validation->set_rules('birth_date__nc_month', 'Month', 'xss_clean');
		$this->form_validation->set_rules('birth_date__nc_day', 'Day', 'xss_clean');
		$this->form_validation->set_rules('url', 'Website', 'xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'xss_clean');
		$this->form_validation->set_rules('city', 'City', 'xss_clean');
		$this->form_validation->set_rules('province', 'State/Province', 'required|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'required|xss_clean');
		$this->form_validation->set_rules('zipcode', 'Zip/Postal code', 'required|xss_clean');
		$this->form_validation->set_rules('biography', 'Biography', 'xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

		$this->form_validation->set_rules('agree', '...', 'callback_terms_check');
		
		if ($this->form_validation->run() == true)
		{
			$data = array(
				'username' 		=> strtolower($this->input->post('username')),
				'email'    		=> $this->input->post('email'),
				'password' 		=> $this->input->post('password'),
				'name'		 	=> $this->input->post('name'),
				'surname'  	=> $this->input->post('surname'),
				'birth_date'  	=> $this->input->post('birth_date_year') . '-' .$this->input->post('birth_date_month') . '-'. $this->			 				input->post('birth_date_day') ,
				'address'    	=> $this->input->post('address'),
				'city'    		=> $this->input->post('city'),
				'province'    		=> $this->input->post('province'),
				'country'    	=> $this->input->post('country'),
				'zipcode'    	=> $this->input->post('zipcode'),
				'phone'      	=> $this->input->post('phone'),
				'date_created'	=> date('Y-m-d H:i:s'),
			);
		}
		if ($this->form_validation->run() == true && $this->Register_Model->register($data))
		{ 
			//check to see if we are creating the user
			//redirect them to checkout page
			redirect('success');
		}
		else
		{ 
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->session->flashdata('message')));
			
			$province = array(
			
			);
			
			$guest_title = array(
						  ''    => 'Select',
						  'Dr'   => 'Dr.',
						  'Mr'   => 'Mr.',
						  'Mrs'  => 'Mrs.',
						  'Ms'   => 'Ms.',
						  'Prof' => 'Prof.',
						  'Mr. & Mrs.' => 'Mr. & Mrs.',
						);
			$this->data['guest_title'] = $guest_title;
	
			$this->data['name'] = array(
				'name'  	=> 'name',
				'id'    	=> 'first_name',
				'type'  	=> 'text',
				'size'		=>	32,
				'maxlength'	=>	32,
				'value' => $this->form_validation->set_value('name'),
			);

			$this->data['surname'] = array(
				'surnname'  => 'surname',
				'id'    => 'last_name',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	32,
				'value' => $this->form_validation->set_value('surname'),
			);

			$this->data['birth_date_year'] = buildYearDropdown('birth_date_year', $this->input->post('birth_date_year'));
			
			$this->data['birth_date_month'] = buildMonthDropdown('birth_date_month', $this->input->post('birth_date_month'));
			
			$this->data['birth_date_day'] = buildDayDropdown('birth_date_day', $this->input->post('birth_date_day'));
			
			
			$this->data['url'] = array(
				'name'  => 'url',
				'id'    => 'url',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	128,
				'value' => $this->form_validation->set_value('url'),
			);
			$this->data['address'] = array(
				'name'  => 'address',
				'id'    => 'address',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	64,
				'value' => $this->form_validation->set_value('address'),
			);
			
			$this->data['city'] = array(
				'name'  => 'city',
				'id'    => 'city',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	64,
				'value' => $this->form_validation->set_value('city'),
			);
			$this->data['province'] = array(
				'name'  => 'province',
				'id'    => 'province',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	64,
				'value' => $this->form_validation->set_value('province'),
			);
			
			$this->data['country'] = buildCountryDropdown('country', $this->input->post('country'));
			 
			$this->data['zipcode'] = array(
				'name'  => 'zipcode',
				'id'    => 'zipcode',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	32,
				'value' => $this->form_validation->set_value('zipcode'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	32,
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'size'		=>	32,
				'maxlength'	=>	128,				
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'username',
				'size'		=>	32,
				'maxlength'	=>	32,				
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'size'		=>	32,
				'maxlength'	=>	32,				
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'size'		=>	32,
				'maxlength'	=>	32,				
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->load->view('register', $this->data);
		}
	}
	
	function success()
	{
		$this->data['message'] = "<h1>User created successfully...</h1>";
		$this->load->view('success', $this->data);
	}
}

?>
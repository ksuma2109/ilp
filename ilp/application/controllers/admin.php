<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->admin_login();
	}

	public function admin_login(){ 
		if(!$this->session->userdata('Admin')){
			$this->form_validation->set_rules('ldap_id', 'LDAP ID', 'trim|required');
			$this->form_validation->set_rules('ldap_pass', 'Password', 'required');
			$data['error'] = '';
			if($this->form_validation->run() === TRUE){
				// $this->load->library('curl');
				// $url = "http://www.cse.iitb.ac.in/~shubhamj/ldap.php/";
				// $this->load->library('curl');
				 // $post_data = array ( 
				 // 	"user" => $this->input->post('ldap_id'), 
				 // 	"pass" => $this->input->post('ldap_pass') 
				 // 	);
				// $output = $this->curl->simple_post($url, $post_data);
				// echo $output;

				if ($this->input->post('ldap_id')==="Admin" && $this->input->post('ldap_pass')==="sarc_iitb"){
					$output = 'Admin';
				}

				if($output != "Admin"){
					$data['error'] = "Invalid username or password";
					$this->load->view('templates/header',$data);
					$this->load->view('admin_login',$data);
					$this->load->view('templates/footer');
				}else{
					$array = array(
						'Admin' => $output
						);
					$this->session->set_userdata($array);
					redirect('admin/home','refresh');
				}

			}else{
				$this->load->view('templates/header',$data);
				$this->load->view('admin_login',$data);
				$this->load->view('templates/footer',$data);
			}
		}else{
			redirect('admin/home','refresh');
			// $this->page_1();
		}
	}

	public function home(){

		if(!$this->session->userdata('Admin')){
			//$this->load->view('create');
			 
			redirect('admin/admin_login','refresh');
		}else{

			$data['status'] = TRUE;
			$data['rollno'] = $this->session->userdata('Admin');
			$this->load->view('templates/header',$data);
			$this->load->view('admin_design',$data);
			$this->load->view('templates/footer',$data);
			
		}
	}

	public function create(){
		if($this->session->userdata('Admin')){
			$data['status'] = TRUE;
			$data['rollno'] = $this->session->userdata('Admin');

			//$this->load->view('templates/header',$data);
			$this->load->view('design',$data);
			//$this->load->view('templates/footer',$data);
		}else {
			redirect('admin/create','refresh');
		}
	}

			// $this->load->helper(array('form', 'url'));

   //      	$this->load->library('form_validation');

   //          $this->form_validation->set_rules('company', 'Company','required'); 
   //          $this->form_validation->set_rules('firstname','First Name', 'required'); 
   //          $this->form_validation->set_rules('lastname','Last Name', 'required');
   //          $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
   //          $this->form_validation->set_rules('phone', 'Phone No.', 'required');
   //          $this->form_validation->set_rules('title', 'Title', 'required'); 
   //          $this->form_validation->set_rules('maxsize', '1','is_numeric'); 
   //          $this->form_validation->set_rules('probstat','required');
   //          $this->form_validation->set_rules('deadline','date(YYYY-MM-DD)');

	  //       if ($this->form_validation->run() == FALSE)
	  //       {
	  //       	//echo "Validation errors";
	  //           $this->load->view('templates/header',$data);
			// 	$this->load->view('admin_design',$data);
			// 	$this->load->view('templates/footer',$data);
	  //       }
	  //       else
	  //       {
	  //       	echo "hi";
	  //           //$this->load->view('templates/header',$data);
			// 	//$this->load->view('admin_design',$data);
			// 	//$this->load->view('templates/footer',$data);
	  //       }

			
		

	public function logout(){
		$this->session->sess_destroy();
		redirect('student/login','refresh');
	}

	
	

}
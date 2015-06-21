<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$this->login();
	}
	public function page_1(){
		if($this->session->userdata('rollno')){
			$data['status'] = TRUE;
			$data['rollno'] = $this->session->userdata('rollno');
			$this->load->view('templates/header',$data);
			$this->load->view('templates/analyticstracking',$data);
			$this->load->view('form_page1',$data);
			$this->load->view('templates/footer',$data);
		}else{
			redirect('student/login','refresh');
		}
	}
	// login page used for logging in using ldap id and lands when someone logs out
	public function login(){
		if(!$this->session->userdata('rollno')){
			$this->form_validation->set_rules('ldap_id', 'LDAP ID', 'trim|required');
			$this->form_validation->set_rules('ldap_pass', 'Password', 'required');
			
			if($this->form_validation->run() === TRUE){
				$this->load->library('curl');
				$url = "http://www.cse.iitb.ac.in/~shubhamj/ldap.php/";
				$this->load->library('curl');
				$post_data = array ( 
					"user" => $this->input->post('ldap_id'), 
					"pass" => $this->input->post('ldap_pass') 
					);
				$output = $this->curl->simple_post($url, $post_data);
				// echo $output;
				if($output=="NONE"){
					$data['error'] = "Invalid ldap or password";
					$this->load->view('templates/header',$data);
					$this->load->view('login',$data);
					$this->load->view('templates/footer');
				}else{
					$array = array(
						'rollno' => $output
						);
					$this->session->set_userdata($array);
					$this->page_1();
				}
			}else{
				$this->load->view('templates/header');
				$this->load->view('login');
				$this->load->view('templates/footer');
			}
		}else{
			redirect('student/page_1','refresh');
			// $this->page_1();
		}
	}

	public function home(){
		if($this->session->userdata('rollno')){
			$data['status'] = TRUE;
			$data['rollno'] = $this->session->userdata('rollno');
			$this->load->view('templates/header',$data);
			$this->load->view('design',$data);
			$this->load->view('templates/footer',$data);
		}else{
			redirect('student/login','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('student/login','refresh');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
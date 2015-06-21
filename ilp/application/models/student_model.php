<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->library('session');
	}
	public function get_status($rollno){
		$query = $this->db->get_where('deregistered',array('rollno' => $rollno));
		$result = $query->result_array();
		if(sizeof($result)>0){
			return $result[0]['status'];
		}else{
			return 1;
		}
	}
	public function get_details($rollno){
		$query = $this->db->get_where('user_details',array('rollno' => $rollno));
		$result = $query->result_array();
		if(sizeof($result)>0){
			return $result[0];
		}else{
			return 0;
		}	
	}
	public function deregister($rollno){
		$query = $this->db->get_where('deregistered',array('rollno' => $rollno));
		$result = $query->result_array();
		if(sizeof($result)>0){
			$this->db->where('rollno', $rollno);
			$query = $this->db->update('deregistered',array('status'=>0));	
		}else{
			$query = $this->db->insert('deregistered',array('rollno' => $rollno));
		}
		return $query;
	}
	public function add_to_dummy($rollno, $name, $emailid, $degree, $phone){
		$query = $this->db->insert('dummy',array('rollno' => $rollno,'name'=>$name,'emailid'=>$emailid,'degree'=>$degree, 'phone'=>$phone));
		return $query;
	}
	public function register($rollno){
		$this->db->where('rollno', $rollno);
		$query = $this->db->update('deregistered',array('status'=>1));
		return $query;
	}
	public function available($table, $rollno){
		$query = $this->db->get_where($table,array('rollno' => $rollno));
		$result = $query->result_array();
		return sizeof($result);
	}
	public function already_reg($rollno, $degree){
		$query = $this->db->get_where('dummy',array('rollno' => $rollno, 'degree'=>$degree));
		$result = $query->result_array();
		return sizeof($result);	
	}
}

/* End of file mentee.php */
/* Location: ./application/models/mentee.php */
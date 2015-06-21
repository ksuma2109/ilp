<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->library('session');
	}
	public function get_admin($user,$pass){
		$query = $this->db->get_where('admin',array('logId' => $user,'password' => $pass));
		$result = $query->result_array();
		return $result;
	}
	
	public function get_answers($val){
		$query = "SELECT mentee_psychotest.rollno,mentee_psychotest.".$val." AS response,points.".$val." AS points FROM (mentee_psychotest NATURAL JOIN mentor_status) LEFT OUTER JOIN points USING (rollno)";
		$result =$this->db->query($query)->result_array();
		return $result;
	}

	public function save($post_data){
		$this->db->set($post_data);
		$this->db->insert('problems');
	}
	public function assign_points($rollno,$category,$points){
		$data = array(
			'rollno' => $rollno,
			$category => $points
		);
		$query = $this->db->get_where('points',array('rollno' => $rollno));
		$result = $query->result_array();
		if(sizeof($result) == 0){
			$this->db->insert('points',$data);
		}else{
			$this->db->where('rollno',$rollno);
			$this->db->update('points', $data); 
		}
	}
}

/* End of file mentee.php */
/* Location: ./application/models/mentee.php */
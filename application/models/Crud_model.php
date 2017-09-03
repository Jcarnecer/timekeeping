<?php
class Crud_model extends CI_Model{
	
	public function fetch($table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}

		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}
	

	public function fetch_tag($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function fetch_tag_row($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function insert($table,$data){
		$result = $this->db->insert($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	public function update($table,$data,$where=""){
		if($where!="") {
				$this->db->where($where);
		}

		$result = $this->db->update($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($table,$where=""){
		if($where!=""){
			$this->db->where($where);
		}
	 	$result = $this->db->delete($table); 
 		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function last_inserted_row($table,$data) {
		$this->db->insert($table, $data);
		$id = $this->db->insert_id();
		$q = $this->db->get_where($table, array('id' => $id));
		return $q->row();
	}

	public function join_user_record_row($id){
		$this->db->select('users.id,first_name,last_name,email,username,role,profile_picture,employee_number');
		$this->db->from('users');
		$this->db->order_by('time_in','desc');
		$this->db->where('users.id',$id);
		$this->db->join('record', 'users.id = record.id', 'inner');
		$query = $this->db->get();
		return $query->row();

	}
	public function join_intern_result(){
		$this->db->select('users.id,first_name,last_name,middle_name,status,email,role,profile_picture,school,no_of_hrs,course,year,start_date');
		$this->db->from('users');
		$this->db->order_by('last_name','asc');
		$this->db->join('intern', 'users.id = intern.id','inner');
		$query = $this->db->get();
		return $query->result();
	}
	public function join_employee_result(){
			$this->db->select('users.id,first_name,last_name,middle_name,status,email,role,profile_picture,sss_no,tin_no,phil_health,start_date');
			$this->db->from('users');
			$this->db->order_by('last_name','asc');
			$this->db->join('employee', 'users.id = employee.id','inner');
			$query = $this->db->get();
			return $query->result();
	}
	public function join_two_table($tag,$table){
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->join('users','change_shift.id= users.id');

		$query = $this->db->get();
		return $query->result();

	}


	public function user_intern_row($where){
		$this->db->select('users.id,firstname,lastname,middlename,status,email,position_id,profile_picture,
						   intern.id,intern.user_id,school,birthday,no_of_hrs,course,year,start_date');
		$this->db->from('users');
		$this->db->where($where);
		$this->db->join('intern', 'users.id = intern.user_id','inner');
		$query = $this->db->get();
		return $query->row();
	}

	public function join_tag_row($tag,$table,$where="",$join_table,$columns){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->join($join_table,$columns);
		$query = $this->db->get();
		return $query->row();
	}
}
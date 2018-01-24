<?php
class Crud_model extends CI_Model{

	public function fetch($table,$where="",$limit="",$offset="",$order="",$where_in= false){
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

		if($where_in)
		{
			$this->db->where_in($where_in['name'], $where_in['values']);
		}


		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}


	public function fetch_tag($tag,$table,$where="",$where_in="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($where_in)) {
			$this->db->or_where_in($where);
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

	public function test($user_id){
		$sql = "select * from timekeeping_record where user_id = $user_id and status = 'Sick Leave' OR status = 'Vacation Leave'";
		$query = $this->db->query($sql);
		return $query->result();
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

	public function get_users(){
		return $this->db->select('*')
			->from('users')
			->join('user_details', 'users.id = user_details.user_id')
			->get()
			->result();
	}

	public function join_user_record_row($id){
		$this->db->select('users.id,first_name,last_name,email,username,role,profile_picture,employee_number');
		$this->db->from('users');
		$this->db->order_by('time_in','desc');
		$this->db->where('users.id',$id);
		$this->db->join('timekeeping_record', 'users.id = timekeeping_record.id', 'inner');
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

	public function join_user_overtime(){
		$this->db->select('users.*,timekeeping_record_overtime.*,users.id AS uid, timekeeping_record_overtime.id as rid');
		$this->db->from('users');
		$this->db->join('timekeeping_record_overtime', 'users.id = timekeeping_record_overtime.user_id');
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



	public function join_tag_row($tag,$table,$where="",$join_table,$columns,$keyword,$order=""){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($order)) {
			$this->db->order_by($order);
		}
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->join($join_table,$columns,$keyword);
		$query = $this->db->get();
		return $query->row();
	}

	public function join_tag_result($tag,$table,$where="",$join_table,$columns,$keyword,$order=""){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($order)) {
			$this->db->order_by($order);
		}
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->join($join_table,$columns,$keyword);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_events($start, $end) 
    {
		$id = $this->user->info('id');
		return $this->db
			->where('user_id', $id)
            ->where("start >=", $start)
            ->where("end <=", $end)
            ->get("calendar_events");
    }

    public function add_event($data) 
    {
        $this->db->insert("calendar_events", $data);
    }

    public function get_event($id) 
    {
        return $this->db->where("id", $id)->get("calendar_events");
    }

    public function update_event($id, $data) 
    {
        $this->db->where("id", $id)->update("calendar_events", $data);
    }

    public function delete_event($id) 
    {
        $this->db->where("id", $id)->delete("calendar_events");
	}
	
   public function fetch_leave($user_id){
	   if(!empty($user_id)){
			$this->db->where($user_id);
	  	 }
			$this->db->select('timekeeping_file_leave.id,timekeeping_leave.leave_name,timekeeping_file_leave.start_date,timekeeping_file_leave.end_date,timekeeping_file_leave.duration,users.firstname,users.lastname,timekeeping_file_leave.status,timekeeping_file_leave.reason');
			$this->db->from('timekeeping_file_leave');
			$this->db->join('users','timekeeping_file_leave.user_id=users.id','inner');
			$this->db->join('timekeeping_leave','timekeeping_file_leave.leave_id=timekeeping_leave.id','inner');
			$query = $this->db->get();
		    return $query->result();
			
			
		}

	
	public function check($table,$where="",$limit="",$offset="",$order="",$where_in= false){
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
	
			if($where_in)
			{
				$this->db->where_in($where_in['name'], $where_in['values']);
			}
	
	
			$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				return TRUE;
			}else{
				return FALSE;
			}		
		
		}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

    public function index() {
      return parent::mainpage('attendance/index',
            [
                'title' => 'Timesheet',
                'record'	=> $this->Crud_model->fetch('timekeeping_record',['company_id'=>$this->session->user->company_id]),
            ]
        );
	}
	

    public function leaves(){
        parent::mainpage('attendance/leaves',
            [
                'title' => 'Leaves',
            ]
        );
    }

    public function employee() {
        parent::mainpage('attendance/employee_attendance',
            [
                'title' => 'Employee Attendance',
            ]
        );
    }

    public function calendar(){
        parent::mainpage('attendance/calendar',
            [
                'title' => 'Calendar',
            ]
        );
    }

    public function overtime(){
        parent::mainpage('attendance/index',
            [
                'title' => 'Overtime',
            ]
        );
        
    }

    public function leave_request(){
        parent::mainpage('attendance/employee_leave',
        [
            'title' => 'Employee Leave',
        ]
    );
    }

    public function add_timesheet(){
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Manila'));
        $date_now = $now->format('Y-m-d');
        $time = $now->format('H:i:s');

        $id = $this->input->post('userid');

        if($this->input->post('four')){
            $time =  date('H:i:s',strtotime('+4 hour',strtotime($time)));
            $status = "4 hours";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => $now->format('H:i:s'),
                'time_out' => $time,
                'status' => $status,
            ];
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            $check_date = $this->Crud_model->fetch('timekeeping_record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $recent = $this->Crud_model->insert('timekeeping_record',$insert);
                //position
                // $position_id = $this->user->info('position_id');
                // $pos_where = ['id'  => $position_id];
                // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
                // parent::audittrail(
                //     'User Time-in / Time-out',
                //     '4 Hours',
                //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
                //     $position->name,
                //     $this->input->ip_address()
                // );
                echo json_encode($insert);
            }

        }elseif($this->input->post('eight')){
            $time =  date('H:i:s',strtotime('+8 hour',strtotime($time)));
            $status = "8 hours";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => $now->format('H:i:s'),
                'time_out' => $time,
                'status' => $status,
            ];
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            $check_date = $this->Crud_model->fetch('timekeeping_record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('timekeeping_record',$insert);
                // //position
                // $position_id = $this->user->info('position_id');
                // $pos_where = ['id'  => $position_id];
                // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
                // parent::audittrail(
                //     'User Time-in / Time-out',
                //     '8 Hours',
                //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
                //     $position->name,
                //     $this->input->ip_address()
                // );
                echo json_encode($insert);
            }

        }elseif($this->input->post('sick')){
            $time = "";
            $status = "Sick Leave";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => NULL,
                'time_out' => NULL,
                'status' => $status,
            ];
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            $check_date = $this->Crud_model->fetch('timekeeping_record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('timekeeping_record',$insert);
                //position
                // $position_id = $this->user->info('position_id');
                // $pos_where = ['id'  => $position_id];
                // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
                // parent::audittrail(
                //     'User Leave',
                //     'Sick Leave',
                //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
                //     $position->name,
                //     $this->input->ip_address()
                // );
                echo json_encode($insert);
            }

        }elseif($this->input->post('vacation')){

            // $status = "Vacation Leave";
            // $insert =[
            //     'user_id' => $id,
            //     'date' => $date_now,
            //     'time_in' => NULL,
            //     'time_out' => NULL,
            //     'status' => $status,
            // ];
            // $user_id = $this->user->info('id');
            // $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            // $check_date = $this->Crud_model->fetch('timekeeping_record',$where);
            // if($check_date == TRUE){
            //     echo json_encode("You already have attendance today");
            // }else{
            //     $this->Crud_model->insert('timekeeping_record',$insert);
            //     //position
            //     $position_id = $this->user->info('position_id');
            //     $pos_where = ['id'  => $position_id];
            //     $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
            //     parent::audittrail(
            //         'User Leave',
            //         'Vacation Leave',
            //         $this->user->info('firstname') .' '. $this->user->info('lastname'),
            //         $position->name,
            //         $this->input->ip_address()
            //     );
            //     echo json_encode($insert);
            

        }elseif($this->input->post('wfh')){
            $time = date('H:i:s',strtotime('+8 hour',strtotime($time)));
            $status = "Off-Site";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => $now->format('H:i:s'),
                'time_out' => $time,
                'status' => $status,
            ];
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            $check_date = $this->Crud_model->fetch('timekeeping_record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('timekeeping_record',$insert);
                //position
                // $position_id = $this->user->info('role');
                // $pos_where = ['id'  => $position_id];
                // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
                // parent::audittrail(
                //     'User Time-in / Time-out',
                //     'Work From Home',
                //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
                //     $position->name,
                //     $this->input->ip_address()
                // );
                echo json_encode($insert);
            }
        }elseif($this->input->post('intern')){
            $status='Attendance'; 
            $timein  = $this->input->post('intern_time_in');
            $timeout = $this->input->post('intern_time_out');
            $date = $this->input->post('intern_date');
            $total   = strtotime($timeout) - strtotime($timein) ; 
            $hours      = floor($total / 60 / 60);
            $minutes    = round(($total - ($hours * 60 * 60)) / 60);
            $no_of_hrs =  $hours.'.'.$minutes - 1.0;
            
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => $date];
            $check_date = $this->Crud_model->fetch('timekeeping_record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance that day");
            }else{
                $insert =[
                    'user_id' => $user_id,
                    'date' => clean_data($date),
                    'time_in' => clean_data($timein),
                    'time_out' => clean_data($timeout),
                    'status' => "Employee Attendance",
                    'intern_no_hrs' => $no_of_hrs,
                    'company_id'=>$this->session->user->company_id,
                ];
                $this->Crud_model->insert('timekeeping_record',$insert);
               
                // $intern_where = ['user_id' => $user_id];
                // $get_intern = $this->Crud_model->fetch_tag_row('*','user_details',$intern_where);
                // $remaining_update = [
                //     'remaining' => $get_intern->remaining - $no_of_hrs
                // ];
                // $this->Crud_model->update('user_details',$remaining_update,$intern_where);
                echo json_encode($insert);
            }
            
        }
    }

    public function get_timesheet(){
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id,'company_id'=>$this->session->user->company_id];
        $timesheet = $this->Crud_model->fetch('timekeeping_record',$where,"","",$order_by); ?>
        <table class="table table-bordered" id="timesheet-table">
          <thead>
              <tr>
                <th>Date</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
              </tr>
          </thead>
          <tbody>
    <?php if(!$timesheet == NULL){
        foreach ($timesheet as $row):
        ?>
            <tr>
                <td><?= $row->date?></td>
                <td><?= $row->time_in?></td>
                <td><?= $row->time_out?></td>
                <td><?= $row->status?></td>
                <!-- <td><button class="btn btn-custom">Edit</button></td> -->
            </tr>
            <?php endforeach;
        }?>

        </tbody>
      </table>
      <?php
    }

    public function get_intern_timesheet(){
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id];
        // $where_in = ['name' => 'status', 'values' => ['4 hours', '8 hours', 'Work From Home']];
        $timesheet = $this->Crud_model->fetch('timekeeping_record',$where,"","",$order_by); ?>
        <table class="table table-bordered" id="intern-timesheet-table">
          <thead>
              <tr>
                <th>Date</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>No. of Hours</th>
                <!-- <th>Action</th> -->
              </tr>
          </thead>
          <tbody>
    <?php if(!$timesheet == NULL){
        foreach ($timesheet as $row):
        ?>
            <tr>
                <td><?= $row->date?></td>
                <td><?= $row->time_in?></td>
                <td><?= $row->time_out?></td>
                <td><?= $row->intern_no_hrs?></td>
            </tr>
            <?php endforeach;
        }?>

        </tbody>
      </table>
      <?php
    }

    public function get_employee_attendance() {
        // $order_by = "lastname desc";
        $where=['timekeeping_record.company_id'=>$this->session->user->company_id];
        $timesheet = $this->Crud_model->join_tag_result('users.*,timekeeping_record.*,timekeeping_record.id AS rid,users.id AS uid','users',$where,'timekeeping_record','users.id = timekeeping_record.user_id',"inner");
        // print_r($timesheet);die;
        if(!$timesheet == NULL){
            foreach ($timesheet as $row) :
        ?>
            <tr>
                <td><?= $row->first_name ." ".$row->last_name?></td>
                <td><?= $row->date?></td>
                <td><?= $row->time_in?></td>
                <td><?= $row->time_out?></td>
                <td><?= $row->status?></td>
                <!-- <td><button class="btn btn-custom">Edit</button></td> -->
            </tr>
            <?php endforeach;
        }
    }

    
    //Overtime
    public function add_overtime(){
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Manila'));
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $diff = $end-$start;

        $insert=[
            'user_id' => clean_data(ucwords($this->input->post('user_id'))),
            'reason' => clean_data(ucwords($this->input->post('reason'))),
            'start' => clean_data($start),
            'end' => clean_data($end),
            'overtime_date' => clean_data($this->input->post('overtime-date')),
            'date_submitted' => clean_data($now->format('Y-m-d')),
            'ot_hours' => clean_data($diff),
            'status' => 0,
            'company_id'=>$this->session->user->company_id,
        ];
        $this->Crud_model->insert('timekeeping_record_overtime', $insert);
        //position
        // $position_id = $this->user->info('position_id');
        // $pos_where = ['id'  => $position_id];
        // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
        // parent::audittrail(
        //     'File Overtime',
        //     'Filed Overtime',
        //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
        //     $position->name,
        //     $this->input->ip_address()
        // );
    }

    public function get_admin_overtime(){
        $where=['company_id'=>$this->session->user->company_id];
      $overtime = $this->Crud_model->join_user_overtime(); ?>
      <?php
      if(!$overtime == NULL){
          foreach ($overtime as $row) :
      ?>
      <tr>
        <td><?= $row->email_address?></td>
        <td><?= $row->date_submitted?></td>
        <td>
          <?php
              if($row->status == 0){
                echo "<p class='text-warning'>Pending</p>";
              }elseif($row->status == 1){
                echo "<p class='text-success'>Accepted</p>";
              }elseif($row->status == 2){
                echo "<p class='text-danger'>Rejected</p>";
              } ?>
        </td>
        <td>
          <button class="btn custom-button dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php if($row->status == 0){ //pending ?>
                <a class="dropdown-item accept-ot" data-toggle="modal" 
                        data-id="<?= secret_url('encrypt',$row->rid) ?>"
                        data-name="<?= $row->first_name.' '.$row->last_name ?>" 
                        data-datesubmit="<?= $row->date_submitted ?>"
                        data-start="<?= date('g:i a',strtotime($row->start)) ?>"
                        data-end="<?= date('g:i a',strtotime($row->end)) ?>"
                        data-reason="<?= $row->reason ?>"
                        data-date="<?= date('F j, Y', strtotime($row->overtime_date)) ?>" href="#accept-overtime-modal" title="Accept" >Accept</a>
                <a class="dropdown-item reject-ot" data-toggle="modal" 
                        data-id="<?= secret_url('encrypt',$row->rid) ?>"
                        data-name="<?= $row->first_name.' '.$row->last_name ?>" 
                        data-datesubmit="<?= $row->date_submitted ?>"
                        data-start="<?= date('g:i a',strtotime($row->start)) ?>"
                        data-end="<?= date('g:i a',strtotime($row->end)) ?>"
                        data-reason="<?= $row->reason ?>"
                        data-date="<?= date('F j, Y', strtotime($row->overtime_date)) ?>" href="#reject-overtime-modal" title="Reject" >Reject</a>
              <?php }?>
              <a class="dropdown-item details-ot" data-toggle="modal" 
                        data-id="<?= secret_url('encrypt',$row->rid) ?>"
                        data-name="<?= $row->first_name.' '.$row->last_name ?>" 
                        data-datesubmit="<?= $row->date_submitted ?>"
                        data-start="<?= date('g:i a',strtotime($row->start)) ?>"
                        data-end="<?= date('g:i a',strtotime($row->end)) ?>"
                        data-reason="<?= $row->reason ?>"
                        data-date="<?= date('F j, Y', strtotime($row->overtime_date)) ?>"
                        href="#overtime-details-modal" title="Overtime Details" data-name="overtime-details">Details</a>
                <!-- <a class="dropdown-item" data-toggle="modal" 
                        data-id="<?= secret_url('encrypt',$row->rid) ?>"
                        data-name="<?= $row->firstname.' '.$row->lastname ?>" 
                        data-datesubmit="<?= $row->date_submitted ?>"
                        data-start="<?= date('g:i a',strtotime($row->start)) ?>"
                        data-end="<?= date('g:i a',strtotime($row->end)) ?>"
                        data-reason="<?= $row->reason ?>"
                        data-date="<?= date('F j, Y', strtotime($row->overtime_date)) ?>"
                 href="#overtime-edit-modal" title="Edit Overtime Details">Edit</a> -->
          </div>
        </td>
      </tr>
      <?php endforeach;
      }
    }

    public function get_overtime_details($id){
      $decrypt_id = secret_url('decrypt',$id);
      $where = ['id' => $decrypt_id,'company_id'=>$this->session->user->company_id];
      $overtime = $this->db->get_where('timekeeping_record_overtime',$where)->row();
      print json_encode($overtime);
    }

    public function get_employee_overtime(){
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id,'company_id' => $this->session->user->company_id];
        $overtime = $this->Crud_model->fetch('timekeeping_record_overtime',$where,"","",$order_by);  ?>
        <table class="table table-bordered" id="employee-overtime-table">
        <thead>
            <tr>
              <th>Status</th>
              <th>Overtime Date</th>
              <th>Start</th>
              <th>End</th>
              <th>Reason</th>
              <th>Date Submitted</th>
              <th>Overtime Hours</th>
            </tr>
        </thead>
        <tbody >
        <?php if(!$overtime == NULL){ ?>
            
          <?php  foreach ($overtime as $row) :
        ?>
            <tr>
                <td><?php
                    if($row->status == 0){
                        echo "<p class='text-warning'>Pending</p>";
                    }elseif($row->status == 1){
                        echo "<p class='text-success'>Accepted</p>";
                    }elseif($row->status == 2){
                        echo "<p class='text-danger'>Rejected</p>";
                    } ?>
                </td>
                <td><?= $row->overtime_date?></td>
                <td><?= $row->start?></td>
                <td><?= $row->end?></td>
                <td><?= $row->reason?></td>
                <td><?= $row->date_submitted?></td>
                <td><?= $row->ot_hours?></td>
            </tr>
            <?php endforeach; ?>
             </tbody>
             
            </table>
            <?php
        }
    }

    public function approve_ot() {  
        $id = $this->input->post('id');
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id'  => $decrypt_id,'company_id'=>$this->session->user->company_id];
        $approve = [
            'status'   => 1
        ];
        $this->Crud_model->update('timekeeping_record_overtime',$approve,$where);
        //user
        $get_user_id = $this->Crud_model->fetch_tag_row('*','timekeeping_record_overtime',$where);
        $user_where = ['id' => $get_user_id->user_id];
        $user = $this->Crud_model->fetch_tag_row('*','users',$user_where);
        //position
        // $position_id = $this->user->info('position_id');
        // $pos_where = ['id'  => $position_id];
        // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
        // parent::audittrail(
        //     'Approve Overtime',
        //     'Approved Overtime of '.$user->firstname.' '.$user->lastname,
        //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
        //     $position->name,
        //     $this->input->ip_address()
        // );
    }

    public function reject_ot() {  
        $id = $this->input->post('id');
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id'  => $decrypt_id,'company_id'=>$this->session->user->company_id];
        $approve = [
            'status'   => 2
        ];
        $this->Crud_model->update('timekeeping_record_overtime',$approve,$where);
        //user
        // $get_user_id = $this->Crud_model->fetch_tag_row('*','timekeeping_record_overtime',$where);
        // $user_where = ['id' => $get_user_id->user_id];
        // $user = $this->Crud_model->fetch_tag_row('*','users',$user_where);
        //position
        // $position_id = $this->user->info('position_id');
        // $pos_where = ['id'  => $position_id];
        // $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
        // parent::audittrail(
        //     'Reject Overtime',
        //     'Rejected Overtime of '.$user->firstname.' '.$user->lastname,
        //     $this->user->info('firstname') .' '. $this->user->info('lastname'),
        //     $position->name,
        //     $this->input->ip_address()
        // );
    }
}
?>

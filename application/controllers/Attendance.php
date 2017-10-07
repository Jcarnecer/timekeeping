<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

    public function index() {
        // print_r($this->user->info('position_id'));die;
        
        // $now = new DateTime();
        // $now->setTimezone(new DateTimezone('Asia/Manila'));
        // $date_now = $now->format('Y-m-d');
        // $time = $now->format('H:i:s');
        parent::mainpage('attendance/index',
            [
                'title' => 'Timesheet',
                'record'	=> $this->Crud_model->fetch('record'),
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
            $check_date = $this->Crud_model->fetch('record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $recent = $this->Crud_model->insert('record',$insert);
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
            $check_date = $this->Crud_model->fetch('record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('record',$insert);
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
            $check_date = $this->Crud_model->fetch('record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('record',$insert);
                echo json_encode($insert);
            }

        }elseif($this->input->post('vacation')){

            $status = "Vacation Leave";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => NULL,
                'time_out' => NULL,
                'status' => $status,
            ];
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            $check_date = $this->Crud_model->fetch('record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('record',$insert);
                echo json_encode($insert);
            }

        }elseif($this->input->post('wfh')){
            $time = date('H:i:s',strtotime('+8 hour',strtotime($time)));
            $status = "Work From Home";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => $now->format('H:i:s'),
                'time_out' => $time,
                'status' => $status,
            ];
            $user_id = $this->user->info('id');
            $where = ['user_id' => $user_id , 'date' => date('Y-m-d')];
            $check_date = $this->Crud_model->fetch('record',$where);
            if($check_date == TRUE){
                echo json_encode("You already have attendance today");
            }else{
                $this->Crud_model->insert('record',$insert);
                echo json_encode($insert);
            }
        }elseif($this->input->post('time-in')){
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => $now->format('H:i:s'),
                'time_out' => NULL,
                'status' => NULL,
            ];
            $this->Crud_model->insert('record',$insert);

        }elseif($this->input->post('time-out')){
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => $now->format('H:i:s'),
                'time_out' => NULL,
                'status' => NULL,
            ];
            $this->Crud_model->insert('record',$insert);
        }
    }

    public function get_timesheet(){
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id];
        $where_in = ['name' => 'status', 'values' => ['4 hours', '8 hours', 'Work From Home']];
        $timesheet = $this->Crud_model->fetch('record',$where,"","",$order_by, $where_in); ?>
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

    public function get_employee_attendance() {
        $order_by = "lastname desc";
        $timesheet = $this->Crud_model->join_tag_result('users.*,record.*,record.id AS rid,users.id AS uid','users','','record','users.id = record.user_id ',"inner",$order_by);
        // print_r($timesheet);die;
        if(!$timesheet == NULL){
            foreach ($timesheet as $row) :
        ?>
            <tr>
                <td><?= $row->firstname.' '.$row->lastname ?></td>
                <td><?= $row->date?></td>
                <td><?= $row->time_in?></td>
                <td><?= $row->time_out?></td>
                <td><?= $row->status?></td>
                <!-- <td><button class="btn btn-custom">Edit</button></td> -->
            </tr>
            <?php endforeach;
        }
    }

    public function get_leave() {
        // $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id];
        $where_in = ['name' => 'status', 'values' => ['Sick Leave', 'Vacation Leave']];
        $leave = $this->Crud_model->fetch('record',$where,"","","", $where_in); 
        ?>
            <table class="table table-bordered" id="leave-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                <tbody>
            <?php 
            if(!$leave == NULL){
                foreach ($leave as $row):
                ?>
                    <tr>
                        <td><?= $row->date?></td>
                        <td><?= $row->status?></td>
                    </tr>
        <?php   endforeach; ?>
                </tbody>
                </table>
    <?php   } 
    
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
        ];
        $this->Crud_model->insert('record_overtime', $insert);
    }

    public function get_admin_overtime(){
      $overtime = $this->Crud_model->join_user_overtime(); ?>
      <?php
      if(!$overtime == NULL){
          foreach ($overtime as $row) :
      ?>
      <tr>
        <td><?= $row->firstname?> <?= $row->lastname?></td>
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
          <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" data-toggle="modal" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#accept-overtime-modal" title="Accept" >Accept</a>
            <a class="dropdown-item" data-toggle="modal"  data-id="<?= secret_url('encrypt',$row->id) ?>" href="#reject-overtime-modal" title="Reject" >Reject</a>
            <a class="dropdown-item" data-toggle="modal" id="details" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#overtime-details-modal" title="Overtime Details" data-name="overtime-details">Details</a>
            <a class="dropdown-item" data-toggle="modal" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#overtime-edit-modal" title="Edit Overtime Details">Edit</a>
          </div>
        </td>
      </tr>
      <?php endforeach;
      }
    }

    public function get_overtime_details($id){
      $decrypt_id = secret_url('decrypt',$id);
      $where = ['id' => $decrypt_id];
      $overtime = $this->db->get_where('record_overtime',$where)->row();
      print json_encode($overtime);
    }

    public function get_employee_overtime(){
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id];
        $overtime = $this->Crud_model->fetch('record_overtime',$where,"","",$order_by); 
         
        if(!$overtime == NULL){ ?>
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
}
?>

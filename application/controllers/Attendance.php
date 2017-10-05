<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

    public function index() {
        //  $data = $this->session->userdata('user_logged_in');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Manila'));
        $date_now = $now->format('Y-m-d');
        $time = $now->format('H:i:s');

        if($this->user->info('position_id')  == '1' || $this->user->info('position_id')=='3'){
            parent::mainpage('attendance/admin',
                [
                    'title' => 'Timesheet',
                    'record'	=> $this->Crud_model->fetch('record'),
                    'now' => $now,
                ]
            );
        }


        elseif($this->user->info('position_id') == '2'){
            parent::mainpage('attendance/employee',
                [
                    'title' => 'Timesheet',
                    'now' => $now,
                ]
            );
        }

        elseif($this->user->info('position_id') == '4'){
            parent::mainpage('attendance/intern',
                [
                    'title' => 'Timesheet',
                    'users'	=> $this->Crud_model->fetch('record'),
                    'now' => $now,
                ]
            );
        }

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
        if($this->user->info('position_id') == '1'){
            parent::mainpage('attendance/overtime',
                [
                    'title' => 'Overtime',
                ]
            );
        }
        elseif($this->user->info('position_id') == '2'){
            parent::mainpage('attendance/employee_overtime',
                [
                    'title' => 'Overtime',
                ]
            );
        }
    }

    public function add_timesheet(){
      // print_r($this->input->post('userid'));
      // print_r($this->input->post('time-in'));
      // print_r($this->input->post('time-out'));
      //  die;
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
            $this->Crud_model->insert('record',$insert);

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
            $this->Crud_model->insert('record',$insert);

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
            $this->Crud_model->insert('record',$insert);

        }elseif($this->input->post('vacation')){

            $status = "Vacation Leave";
            $insert =[
                'user_id' => $id,
                'date' => $date_now,
                'time_in' => NULL,
                'time_out' => NULL,
                'status' => $status,
            ];
            $this->Crud_model->insert('record',$insert);

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
            $this->Crud_model->insert('record',$insert);
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
        // $where = ['user_id' => $this->user->info('id'),'status'=>'4 hourse'];
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id];
        $where_in = ['name' => 'status', 'values' => ['4 hours', '8 hours', 'Work From Home']];
        // $where = " ";
        // $where_in = ['4 hours', '8 hours', 'Work From Home'];
        $timesheet = $this->Crud_model->fetch('record',$where,"","",$order_by, $where_in); ?>
        <table class="table table-bordered" id="timesheet-table">
          <thead>
              <tr>
                <th>NAME</th>
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
                <td><?= $row->user_id ?></td>
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
        $order_by = "record.created_at desc";
        // $timesheet = $this->Crud_model->fetch('record','','','',$order_by);
        $timesheet = $this->Crud_model->join_tag_result('users.*,record.*','users','','record','users.id = record.user_id',$order_by);
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
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = "user_id = $user_id and status = 'Sick Leave' AND status = 'Vacation Leave'";
        $timesheet = $this->Crud_model->fetch_tag('*','record',$where,'','',$order_by);
        if(!$timesheet == NULL){ ?>
        <table class="table table-bordered" id="leave-table">
            <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
              <!-- <th>Action</th> -->
            </tr>
            </thead>
            <tbody>

        <?php  foreach ($timesheet as $row):
        ?>
            <tr>
                <td><?= $row->date?></td>
                <td><?= $row->status?></td>
            </tr>
            <?php endforeach;
        } ?>
         </tbody>
        </table>

    <?php
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

    public function get_employee_overtime(){
        $order_by = "id desc";
        $user_id = $this->user->info('id');
        $where = ['user_id' => $user_id];
        $overtime = $this->Crud_model->fetch('record_overtime',$where,"","",$order_by); ?>
        <?php
        if(!$overtime == NULL){
            foreach ($overtime as $row) :
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
            <?php endforeach;
        }
    }
}
?>

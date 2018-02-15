<div class="row">
  <div class="col-md-12">
      <h3>My Timesheet</h3>
      <hr>
  </div>
</div>

<div class="row" id="DateTime">
  <div class="col-md-12">
      <!-- <?php echo $time = date('H:i:s'); ?><br> -->
      <span class="time" id=curTime></span><br>
      <span class="date"><?php echo $date = date('m/d/Y'); ?></span>   
      <button class="btn intern-attendance-button" data-toggle="modal" data-target="#intern-attendance-modal">Attendance</button>
  </div>
</div>
  <!-- <div class="row" id="DateTime">
    <div class="col-md-12">
      <center>
        <?php echo $date = date('m/d/Y'); ?><br>
        <?php echo $time = date('H:i:s'); ?><br>
      </center>
    </div>
  </div> -->
<!-- 
  <form id="timesheet-timein" class="form-timesheet"  method="post">
    <input type="hidden" name="userid" id="userid" value="<?=$this->user->info('id');?>">
    <input type="hidden" name="time-in" value="Time-in">
    <input type="submit" class="btn btn-custom" value="Attendance" >
  </form> -->

<div class="table-responsive" id="intern-timesheet">
    
</div>

<?php $this->load->view('attendance/partials/intern_attendance') ?>
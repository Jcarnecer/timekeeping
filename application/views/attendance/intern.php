<div class="row">
<div class="col-md-12">
    <h3>My Timesheet</h3>
  <center>

  <div class="row" id="DateTime">
    <div class="col-md-12">
      <center>
        <?php echo $date = date('m/d/Y'); ?><br>
        <?php echo $time = date('H:i:s'); ?><br>
      </center>
    </div>
  </div>

  <form id="timesheet-timein" class="form-timesheet"  method="post">
    <input type="hidden" name="userid" id="userid" value="<?=$this->user->info('id');?>">
    <input type="hidden" name="time-in" value="Time-in">
    <input type="submit" class="btn btn-custom" value="Time-in" >
  </form>

  <form id="timesheet-timeout" class="form-timesheet" method="post">
    <input type="hidden" name="userid" id="userid" value="<?=$this->user->info('id');?>">
    <input type="hidden" name="time-out" value="Time-out">
    <input type="submit" class="btn btn-custom" value="Time-out">
  </form>

</center>

<div class="table-responsive" id="timesheet">
    
  </div>

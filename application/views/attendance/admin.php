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
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-container">
      <form id="timesheet_halfday" class ="form-timesheet" method="post">
        <input type="hidden" name="userid" id="userid" value="<?=$this->user->info('id');?>">
        <input type="hidden" name="four" value="1">
        <input type="submit" class="btn custom-button" id="four" value="4 HOURS">
      </form>

      <form id="timesheet_wholeday" class ="form-timesheet" method="post">
        <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
        <input type="hidden" name="eight" value="2">
        <input type="submit" class="btn custom-button" name="eight" value="8 HOURS">
      </form>

      <form id="timesheet_WFH" class ="form-timesheet" method="post">
        <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
        <input type="hidden" name="wfh" value="5">
        <input type="submit" class="btn custom-button" name="wfh" value="WORK FROM HOME">
      </form>
    </div>
  </div>
</div>

  <div class="table-responsive" id="timesheet">
    
  </div>
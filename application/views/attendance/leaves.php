<div class="row">
  <div class="col-md-12">
      <h3>My Leaves</h3>
    <center>

    <div class="row" id="DateTime">
      <div class="col-md-12">
        <center>
        </center>
      </div>
    </div>

    <form id="timesheet_SL" class ="form-timesheet" method="post">
      <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
      <input type="hidden" name="sick" value="3">
      <input type="submit" class="btn btn-custom" name="sick" value="SICK LEAVE">
    </form>

    <form id="timesheet_VL" class ="form-timesheet" method="post">
      <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
      <input type="hidden" name="vacation" value="4">
      <input type="submit" class="btn btn-custom" name="vacation" value="VACATION LEAVE">
    </form>

  </center>
  </div>
</div>

<div class="table-responsive" id="leave-data">
    
        
        
       
  </div>
</div>

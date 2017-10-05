<div class="row">
    <div class="col-md-12">
        <h3>My Timesheet</h3>
      <center>

      <div class="row" id="DateTime">
        <div class="col-md-12">
          <center>
            <?php echo $date = $now->format('m/d/Y'); ?><br>
            <?php echo $time = $now->format('H:i:s'); ?><br>
          </center>
        </div>
      </div>

      <form id="timesheet_halfday" class ="form-timesheet" method="post">
        <input type="hidden" name="userid" id="userid" value="<?=$this->user->info('id');?>">
        <input type="hidden" name="eight" value="2">
        <input type="submit" class="btn btn-custom" id="four" value="4 HOURS">
      </form>

      <form id="timesheet_wholeday" class ="form-timesheet" method="post">
        <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
        <input type="hidden" name="eight" value="2">
        <input type="submit" class="btn btn-custom" name="eight" value="8 HOURS">
      </form>

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
      
      <form id="timesheet_WFH" class ="form-timesheet" method="post">
        <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
        <input type="hidden" name="wfh" value="5">
        <input type="submit" class="btn btn-custom" name="wfh" value="WORK FROM HOME">
      </form>

    </center>
    </div>
  </div>

  <div class="table-responsive">
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
          <tbody id="timesheet">

          </tbody>
      </table>
    </div>
</div>

<div class="row" id="DateTime">
  <div class="col-md-12">
    <center>
      <?= $now->format('m/d/Y'); ?><br>
      <?= $now->format('H:i:s'); ?><br>
    </center>
  </div>
</div>
<center>

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

<div class="table-responsive">
    <table class="table table-bordered" id="timesheet-table">
        <thead>
            <tr>
              <th>Date</th>
              <th>Time in</th>
              <th>Time out</th>
              <th>Status</th>
              <th></th>
            </tr>
        </thead>
        <tbody id="timesheet">

        </tbody>
    </table>
  </div>

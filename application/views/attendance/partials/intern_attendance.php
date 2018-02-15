<div class="modal fade" id="intern-attendance-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Attendance</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h5 class="text-left"><strong>NOTE: Use military time. </strong></h5>
        <form id="intern-attendance-form" class="form-timesheet" method="post">
          <div class="form-group">
            <input type="hidden" name="userid" value="<?= secret_url('encrypt',$this->user->info('id'));?>">
            <input type="hidden" name="intern" value="intern_attendance">
            <label for="">Date</label>
            <input type="text" name="intern_date" id="intern_date" class="form-control ">
          </div>
          <div class="form-group">
            <label for="">Time-in</label>
            <input type="text" name="intern_time_in" class="form-control" id="intern_timein">
          </div>
          <div class="form-group">
            <label for="">Time-out</label>
            <input type="text" name="intern_time_out" class="form-control" id="intern_timeout">
          </div>
      </div>
      
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn custom-button" name="intern">Save</button>
        </form>
      </div>

    </div>
  </div>
</div>

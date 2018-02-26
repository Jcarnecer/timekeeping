<div class="row">
  <div class="col-md-12">
      <h3>My Leaves</h3>
      <hr>
      <input type="hidden" name="user_id" id="my_leave" value="<?=$this->user->info('id');?>" data-id="<?=$this->user->info('id');?>">
      <button class="btn-file-leave" data-toggle="modal" data-target="#file-leave-modal">File Leave</button>
  </div>
</div>

  <!-- <div class="row" id="DateTime">
    <div class="col-md-12">
      <div class="form-container">

        <form id="timesheet_VL" class ="form-timesheet" method="post">
          <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
          <input type="hidden" name="vacation" value="4">
          <button type="submit" id="vacation-leave" class="btn custom-button leave-button" name="vacation">
            <span class="button-text">Vacation Leave</span>
          </button>
        </form>

        <form id="timesheet_SL" class ="form-timesheet" method="post">
          <input type="hidden" name="userid" value="<?=$this->user->info('id');?>">
          <input type="hidden" name="sick" value="3">
          <button type="submit" id="sick-leave" class="btn custom-button leave-button" name="sick">
            <span class="button-text">Sick Leave</span>
          </button>
        </form>

      </div>
    </div>
  </div> -->
<div class="table-responsive" id="leave-data">
<table class="table table-bordered table-responsive-xl" id="table-my-leave" > 

        <thead>
                <tr>
                  <th>Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Duration</th>
                  <th>Status</th>
                  
                </tr>
        </thead>
      <tbody id="tbody-my-leave">

      </tbody> 
</table>
</div>
<?php 
$this->load->view('attendance/partials/file_leave_modal'); ?>
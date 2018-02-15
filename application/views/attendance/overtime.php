<div class="row">
  <div class="col-md-12">
  <h3>Overtime</h3>
  <hr>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-bordered" id="admin-overtime-table">
      <thead>
          <tr>
            <th>Name</th>
            <th>Date Submitted</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
      </thead>
      <tbody id="admin-overtime">

      </tbody>
  </table>
</div>
<?php  $this->load->view('attendance/partials/accept_overtime_modal'); ?>
<?php  $this->load->view('attendance/partials/reject_overtime_modal'); ?>
<?php  $this->load->view('attendance/partials/overtime_details_modal'); ?>
<?php  $this->load->view('attendance/partials/overtime_edit_modal'); ?>

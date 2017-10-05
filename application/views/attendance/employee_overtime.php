<div class="row">
  <h3>Overtime</h3>
    <div class="col-md-12">
      <div class="row" id="DateTime">
        <div class="col-md-12">
          <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#file-overtime-modal">File Overtime</button>
        </div>
      </div>

      <div class="table-responsive">
          <table class="table table-bordered" id="employee-overtime-table">
              <thead>
                  <tr>
                    <th>Status</th>
                    <th>Overtime Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Reason</th>
                    <th>Date Submitted</th>
                    <th>Overtime Hours</th>
                  </tr>
              </thead>
              <tbody id="employee-overtime">

              </tbody>

          </table>
        </div>
      </div>
    </div>

<?php $this->load->view('attendance/partials/file_overtime_modal');?>

<!-- Modal -->
<div id="intern-edit-other-information" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Other Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="success-message"></div>

        <form id="intern-other-info-form" method="post">
            <div class="form-group">
                <input type="hidden" id="id" name="id" value="<?= $this->uri->segment(3) ?>">
                <label>School</label>
                <input type="text" name="school" id="school" class="form-control">
                <div class="text-danger" id="school_err"></div>
            </div>
            <div class="form-group">
                <label>Number of Hours</label>
                <input type="text" name="no_of_hrs" id="no-of-hrs" class="form-control">
                <div class="text-danger" id="no_of_hrs_err"></div>
            </div>
            <div class="form-group">
                <label>Course</label>
                <input type="text" name="course" id="course" class="form-control">
                <div class="text-danger" id="course_err"></div>
            </div>
            <div class="form-group">
                <label>Birthday</label>
                <input type="text" name="bday" id="bday" class="form-control">
                <div class="text-danger" id="bday_err"></div>
            </div>
            <div class="form-group">
                <label>Year (School Year)</label>
                <input type="text" name="year" id="year" class="form-control">
                <div class="text-danger" id="year_err"></div>
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="text" name="start_date" id="start-date" class="form-control">
                <div class="text-danger" id="start_date_err"></div>
            </div>
            <div class="form-group">
            <hr>
                <button type="Submit" class="btn custom-button float-right">Apply Changes</button>
            <!-- <button type="Submit" class="btn btn-info"><i class="fa fa-save m-r-10"></i>Submit</button> -->
            </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
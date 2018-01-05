<div class="modal fade" id="leave-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLabel">Add Leave</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <h5 class="text-danger" id="error-message"></h5>
        <form id="leave-form" method="POST">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="leave_name" id="leave_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="">No. of Days</label>
            <input type="text" name="days" id="No_of_days"class="form-control">
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn custom-button" id="btn-save" data-function="" data-id="">Save</button> 
        </form>
      </div>

    </div>
  </div>
</div>

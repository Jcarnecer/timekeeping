<?php
$leave=$this->Crud_model->fetch('timekeeping_leave');
?>
<div class="modal fade" id="view-file-leave-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filed by:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="view-file-leave-form" method="post">
          <!-- <input type="hidden" name="user_id" value="<?=$this->user->info('id');?>"> -->
          <div class="form-group">
          <h5 class="text-danger" id="error-message"></h5>
            <label for="">Leave</label>
            <input type="text" name="leave_name" class="form-control"   id="leave_name"disabled>
          </div>
          
          <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="">From</label>
                <input type="date" name="start" class="form-control" id="start_date"disabled>
            </div>
           
              <div class="form-group col-12 col-md-6">   
                <label for="">To</label>
                <input type="date" name="end" class="form-control" id="end_date"disabled>
            </div>
          </div>

          <div class="form-group">
          <h5 class="text-danger" id="error-message"></h5>
            <label for="">Duration</label>
            <input type="text" name="duration" class="form-control" value="Adsadd" id="duration"disabled>
          </div>

          <div class="form-group">
          <h5 class="text-danger" id="error-message"></h5>
            <label for="">Status</label>
            <input type="text" name="Status" class="form-control" id="status"disabled>
          </div>

          <div class="form-group">
            <label for="">Reason</label>
            <textarea name="reason" rows="2" class="form-control" id="reason"disabled></textarea>
          </div>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn custom-button" id="btn-file-leave">Save</button>  -->
        </form>
      </div>

    </div>
  </div>
</div>

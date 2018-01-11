<?php
$leave=$this->Crud_model->fetch('timekeeping_leave');
?>
<div class="modal fade" id="file-leave-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File Leave</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="file-leave-form" method="post">
          <input type="hidden" name="user_id" value="<?=$this->user->info('id');?>">
          <div class="form-group">
          <h5 class="text-danger" id="error-message"></h5>
            <label for="">Leave</label>
            <select class="form-control" id="leaveSelect" name="leave_id">
               <?php foreach($leave as $row){ ?> 
                    <option value=<?=$row->id?>><?=$row->leave_name?></option>
                <?php }?> 
            </select>    
          </div>
          <div class="form-group">
            <label for="">Start</label>
            <input type="date" name="start" class="form-control">
          </div>
          <div class="form-group">
            <label for="">End</label>
            <input type="date" name="end" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Reason</label>
            <textarea name="reason" rows="2" class="form-control"></textarea>
          </div>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn custom-button" id="btn-file-leave">Save</button> 
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="file-overtime-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File Overtime</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="file-overtime-form" method="post">
          <input type="hidden" name="user_id" value="<?=$this->user->info('id');?>">
          <div class="form-group">
            <label for="">Overtime Date</label>
            <input type="date" name="overtime-date" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Start</label>
            <input type="time" name="start" class="form-control">
          </div>
          <div class="form-group">
            <label for="">End</label>
            <input type="time" name="end" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Reason</label>
            <textarea name="reason" rows="2" class="form-control"></textarea>
          </div>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn custom-button">Save</button> 
        </form>
      </div>

    </div>
  </div>
</div>

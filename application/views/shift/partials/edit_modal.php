<!-- Modal -->
<div class="modal fade" id="e-sh-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Shift</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="shift-form" method="POST" autocomplete="off">
            <div class="form-group">
              <label>Shift</label>
              <input type="text" id="shift-type"  name="shift" class="form-control">
            </div>
            
            <div class=form-group>
              <label>Start Time</label>
              <input type="time" name="start" id="start-time" class="form-control">
              <h5 class="text-danger" id="start-error"></h5>
            </div> 
            <div class=form-group>
              <label>End Time</label>
              <input type="time" name="end" id="end-time" class="form-control">
              <h5 class="text-danger" id="end-error"></h5>
            </div> 
        <br>
        <input type="hidden" id="id" name="id">
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn custom-button" data-function='' id="btn-save">Save</button>
          </form>
        </div>
  </div>
</div>




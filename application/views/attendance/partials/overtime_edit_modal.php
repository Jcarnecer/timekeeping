<!-- Modal -->
<div class="modal fade" id="overtime-edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Overtime</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-overtime-form" method="POST">

          <div class="form-group">
            <label>Overtime Date</label>
            <input type="date" name="position" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Start</label>
            <input type="time" name="start" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Start</label>
            <input type="time" name="start" class="form-control">
          </div>

      </div>
      <div class="modal-footer">
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="intern-picture-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Profile Picture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="intern-picture-form" method="post">
          <div id="error-message-picture"></div>
          <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id" id="id">
          <label>Select Profile Picture</label>
          <input type="file" id="profile_pic" class="form-control" name="profile_pic">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn custom-button">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

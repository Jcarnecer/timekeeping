
<!-- Modal -->
<div id="intern-picture-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Profile Picture</h4>
      </div>
      <div class="modal-body">
        <form id="intern-picture-form" method="post">
          <div id="error-message-picture"></div>
          <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id" id="id">
          <label>Select Profile Picture</label>
          <input type="file" id="profile_pic" class="form-control" name="profile_pic">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

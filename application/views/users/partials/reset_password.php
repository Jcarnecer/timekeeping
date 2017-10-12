<!-- Modal -->
<div class="modal fade" id="reset-user-pass" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 id="confirm-msg"></h6>
        <br>
        <p>Note: If email doesn't received wait atleast 2 mins. or check in spam mail. </p>
        <form id="reset-password-form" method="post">
            <input type="hidden" id="id" name="id">
            <input type="hidden" name="email" id="email" class="form-control">
            <h5 class="text-danger fname-error" ></h5>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn custom-button">Proceed</button>
          </form>
      </div>
    </div>
  </div>
</div>
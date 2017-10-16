<!-- Modal -->
<div id="employee-edit-other-information" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="success-message"></div>

        <form id="employee-other-info-form" method="post">
            <div class="form-group">
            <label>SSS</label>
            <input type="hidden" name="id" value="<?= $this->uri->segment(3) ?>">
            <input type="text" name="sss" id="sss" class="form-control">
            <div class="text-danger" id="sss_err"></div>
            </div>
            <div class="form-group">
            <label>Phil Health</label>
            <input type="text" name="philhealth" id="phil-health" class="form-control">
            <div class="text-danger" id="philhealth_err"></div>
            </div>
            <div class="form-group">
            <label>Tin</label>
            <input type="text" name="tin" id="tin" class="form-control">
            <div class="text-danger" id="tin_err"></div>
            </div>
            <div class="form-group">
            <label>Date Started</label>
            <input type="text" name="date_start" id="start-date" class="form-control">
            <div class="text-danger" id="date_start_err"></div>
            </div>
            <div class="form-group">
            <hr>
            <button type="Submit" class="btn custom-button float-right">Apply Changes</button>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>
<?php $shifts = $this->Crud_model->fetch('timekeeping_shift'); ?>
<!-- Modal -->
<div id="intern-edit-information" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
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

        <form id="intern-info-form" method="post">
            <input type="hidden" name="id" value="<?= $this->uri->segment(3) ?>">
            <div class="form-group">
                <label>First Name</label>
                <!-- <input type="text" name="fname" value="<?= $this->user->info('firstname') ?>" class="form-control"> -->
                <input type="text" name="fname" id="firstname" class="form-control">
                <div class="text-danger" id="fname_err"></div>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <!-- <input type="text" name="lname" value="<?= $this->user->info('lastname') ?>" class="form-control"> -->
                <input type="text" name="lname" id="lastname" class="form-control">
                <div class="text-danger" id="lname_err"></div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <!-- <input type="text" name="email" value="<?= $this->user->info('email') ?>" class="form-control"> -->
                <input type="text" name="email" id="email" class="form-control">
                <div class="text-danger" id="email_err"></div>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn custom-button float-right">Apply Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
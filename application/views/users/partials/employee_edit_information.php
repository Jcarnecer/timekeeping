<?php $shifts = $this->Crud_model->fetch('shift'); ?>
<!-- Modal -->
<div id="employee-edit-information" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
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


        <form id="employee-info-form" method="post">
            <div class="form-group">
            <label>First Name</label>
            <input type="hidden" name="id" value="<?= $this->uri->segment(3) ?>">
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
            <div class="form-group">
            <label>Shift</label>
            <!-- <input type="text" name="shift" value="<?= $shift->shift_type ?>" class="form-control"> -->
            <select class="form-control" name="shift" id="shift">
            <?php foreach($shifts as $row): ?>
                <option value="<?= $row->id ?>"<?php if($shift->id==$row->id) echo 'selected="selected"' ?> ><?= $row->shift_type ?></option>
            <?php endforeach ?>
            </select>
            </div>
            <div class="form-group">
            <hr>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <button type="Submit" class="btn custom-button float-right">Apply Changes</button>
            <!-- <button type="Submit" class="btn btn-info"><i class="fa fa-save m-r-10"></i>Submit</button> -->
            </div>
        </form>
        
      </div>
    </div>
  </div>
</div>

<?php $pos = $this->Crud_model->fetch('position') ?>
<!-- Modal -->
<div class="modal fade" id="add-users-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-user-form" method="post">
            <label for="">First Name</label>
            <input type="text" name="fname" class="form-control">
            <h5 class="text-danger fname-error" ></h5>

            <label for="">Middle Name</label>
            <input type="text" name="mname" class="form-control"> 
            <h5 class="text-danger mname-error" ></h5>

            <label for="">Last Name</label>
            <input type="text" name="lname" class="form-control">
            <h5 class="text-danger lname-error" ></h5>
            
            <label for="">Email Address</label>
            <input type="text" name="emailadd" class="form-control"> 
            <h5 class="text-danger email-error" ></h5>

            <label for="">Position</label>
            <select name="pos" id="" class="form-control">
                <?php foreach($pos as $row): ?>
                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                <?php endforeach;   ?>
            </select>
            <h5 class="text-danger pos-error"></h5>
       
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
      </div>
    </div>
  </div>
</div>
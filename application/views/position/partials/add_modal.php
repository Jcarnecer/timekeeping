<?php $pos = $this->Crud_model->fetch('position') ?>
<!-- Modal -->
<div class="modal fade" id="add-position-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="add-position-form" method="POST">
          <div id="add-position-error">
          </div>
          <div class="form-group">
            <label>Enter Position</label>
            <input type="text" name="position" class="form-control " id="position">
          </div>

          <div class="form-group">
            <label>Select Position Privileges</label>
            <select class="form-control selectpicker"  name="privileges[]" multiple id="add-select" title="-- SELECT PRIVILEGE/S --">
            <optgroup label="Current Privileges">
              <?php
              $x=1;
              foreach($menu as $key){ if($x!=1){?>
              <option value="<?php echo $key->id?>"><?php echo $key->name; ?></option>
              <?php  } $x+=1;}?>
            </optgroup>
          </select>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="e-p-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="update-position-form" method="POST" autocomplete="off">
          <div id="u-position-error">

          </div>
          <div class="form-group">
            <label>Enter position</label>
            <input type="text" name="position" class="form-control position">
          </div>
          
          <div class=form-group>
          <label>Select position Privileges</label>
               <select class="selectpicker" id="privileges"  data-width="100%" name="privileges[]" title="-- Please select privileges --" multiple>
            <optgroup label="Current Privileges">
              <?php
              $x=1;
              foreach($menu as $key){ ?>
              <option value="<?php echo $key->id?>"><?php echo $key->name; ?></option>
              <?php  }?>
            </optgroup>
          </select>
          </div> 
      <br>
      <input type="hidden" id="id" name="id">
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
      </div>
    </div>
  </div>
</div>
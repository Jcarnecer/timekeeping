<?php 
// $where = ['id !=' => 1];
$shift = $this->Crud_model->fetch('shift');
$pos = $this->Crud_model->fetch('position'); ?>
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
          <div class="form-group">
              <label for="">First Name</label>
              <input type="text" name="fname" class="form-control">
              <h5 class="text-danger fname-error" ></h5>
          </div>
          <div class="form-group">
              <label for="">Middle Name</label>
              <input type="text" name="mname" class="form-control"> 
              <h5 class="text-danger mname-error" ></h5>
          </div>
          <div class="form-group">
              <label for="">Last Name</label>
              <input type="text" name="lname" class="form-control">
              <h5 class="text-danger lname-error" ></h5>
          </div>
          <div class="form-group">   
              <label for="">Email Address</label>
              <input type="text" name="emailadd" class="form-control"> 
              <h5 class="text-danger email-error" ></h5>
          </div>
          <div class="form-group">
              <label for="">Position</label>
              <select name="pos" id="position" class="form-control">
								<option value="" disabled selected>-- Select Position --</option>
                  <?php foreach($pos as $row): ?>
                  <option id="<?= $row->id ?>" value="<?= $row->id ?>"><?= $row->name ?></option>
                  <?php endforeach;   ?>
              </select>
              <h5 class="text-danger pos-error"></h5>
          </div>
          <div class="form-group">
              <label for="">Start Date</label>
              <input type="text" name="start_date" class="form-control" id="user-start-date" placeholder="yyyy-mm-dd">
              <h5 class="text-danger sd-error"></h5>
          </div>
          <div class="form-group">
							<label for="">Birthday </label>
              <input type="text" name="bday" id="add_bday" class="form-control">
          </div>
          <div class="form-group">
              <label for="">Shift</label>
              <select name="shift" id="shift" class="form-control">
                  <?php foreach($shift as $row): ?>
                  <option id="<?= $row->id ?>" value="<?= $row->id ?>"><?= $row->shift_type ?></option>
                  <?php endforeach;   ?>
              </select>
          </div>
          

          <div id="intern-other-info" style="display:none">
            <div class="form-group">
              <label for="">Number of Hours</label>
              <input type="text" name="num_hrs" class="form-control">
            </div>
            <div class="form-group">
              <label for="">School</label>
              <input type="text" name="school" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Course</label>
              <input type="text" name="course" class="form-control">
            </div>
            <div class="form-group">
              <label for="">School Year</label>
              <input type="text" name="sy" class="form-control">
            </div>
          </div>

					<div id="emp-other-info" style="display:none">
            <div class="form-group">
              <label for="">SSS</label>
              <input type="text" name="sss" class="form-control">
            </div>
            <div class="form-group">
              <label for="">TIN</label>
              <input type="text" name="tin" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Phil Health</label>
              <input type="text" name="phil_health" class="form-control">
            </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn custom-button" id="btn-save" data-id="" data-function="">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#position").on('change',function(){
      var pos_id = $("#position").val();
      if(pos_id >= 1 && pos_id != 4){

				$("#intern-other-info").css({"display":"none"});
        $("#emp-other-info").css({"display":"block"});
      }else if(pos_id == 4){

				$("#emp-other-info").css({"display":"none"});
        $("#intern-other-info").css({"display":"block"});
      }
      // e.preventDefault();
    })
  })
</script>

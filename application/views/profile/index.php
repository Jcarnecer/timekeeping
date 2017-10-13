<?php
  $id = $this->user->info('id');
  $where = ['id'  => $id];
  $user = $this->Crud_model->fetch_tag_row('*','users',$where);
?>

<?php $this->load->view('profile/partials/picture_modal') ?>
<?php $this->load->view('profile/partials/edit_profile') ?>

    <h2>Profile</h2>
    <hr>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        <a data-toggle="modal" href="#profile-picture-modal"><img id="prof_pic" class="center-block bottom-margin img-fluid"></a>
          <!-- <a data-toggle="modal" href="#profile-picture-modal"><img height="200" id="prof_pic"></a>
          <hr> -->
          <!-- <a class="btn btn-info waves-effect" href="<?= base_url().'employee/request_shift/'.$this->session->id?>">Shift</a> -->
          <?php if($this->user->info('position_id') == 4){ ?>
            <h5>Remaining Hours</h5>
            <h5 id="hrs_remaining"></h5>
          <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
          <h2>User Information</h2>
          <!-- <?= $this->user->info('lastname') ?>,
          <?= $this->user->info('firstname') ?><br>
          <?= $this->user->info('email') ?> -->
          <h5 id="profile-name"></h5>
          <h5 id="profile-email"></h5>
          <h5 id="profile-position"></h5>
          <button class="btn custom-button edit-button" data-toggle="modal" href="#edit-profile-modal">Edit Account Info</button>
        </div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
          <h2>Other Information</h2>
          <?php if($this->user->info('position_id') == 4){ ?>
            <h5 >School: <span id="profile-school"></span></h5>
            <h5>Course: <span  id="profile-course"></span></h5>
            <h5>School Year: <span id="profile-year"></span></h5>
            <h5>Total Number of Hours: <span id="profile-total-num-hrs"></span></h5>
          <?php }else{ ?>
						<h5 >SSS No.: <span id="profile-sss"></span></h5>
            <h5>Tin No.: <span  id="profile-tin"></span></h5>
            <h5>Phil Heath: <span id="profile-philhealth"></span></h5>
					<?php } ?>
         </div>
          <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <div class="card">
                  <div class="card-block text-center">
                      <h2>Edit Information</h2>
                      <hr>
                      <form id="change-profile-form" method="post">
                        <div class="form-group">
                          <label>First Name</label>
                        
                          <input type="text" name="fname" id="firstname" class="form-control">
                          <div class="text-danger" id="fname_err"></div>
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                        
                          <input type="text" name="lname" id="lastname" class="form-control">
                          <div class="text-danger" id="lname_err"></div>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          
                          <input type="text" name="email" id="email" class="form-control">
                          <div class="text-danger" id="email_err"></div>
                        </div>
                        <div class="form-group">
                        <hr>
                          <button type="Submit" class="btn btn-info"><i class="fa fa-save m-r-10"></i>Submit</button>
                        </div>
                      </form>

                  </div>
              </div>
          </div> -->
          <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <div class="card">
                  <div class="card-block text-center">
                    <div id="success-message"></div>
                      <h2>Edit Password</h2>
                      <hr>
                      <form id="change-pass-form" method="post">
                        <div class="form-group">
                          <label>Old Password</label>
                          <input type="password" name="opassword" class="form-control">
                          <div class="text-danger" id="old_err"></div>
                        </div>
                        <div class="form-group">
                          <label>New Password</label>
                          <input type="password" name="npassword" class="form-control">
                          <div class="text-danger" id="new_err"></div>
                        </div>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" name="cpassword" class="form-control">
                          <div class="text-danger" id="confirm_err"></div>
                        </div>
                        <div class="form-group">
                        <hr>
                          <button type="Submit" class="btn btn-info"><i class="fa fa-save m-r-10"></i>Submit</button>
                        </div>
                      </form>

                  </div>
              </div>
          </div> -->
      </div>
    </div>

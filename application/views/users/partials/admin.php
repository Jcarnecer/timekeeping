<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                            <h2>Edit Profile Picture</h2>
                            <hr>
                                <a data-toggle="modal" href="#profile-picture-modal"><img height="200" id="prof_pic"></a>
                                <hr>

                                <!-- <a class="btn btn-info waves-effect" href="<?= base_url().'employee/request_shift/'.$this->session->id?>">Shift</a> -->
                                 </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                                <h2>Edit Information</h2>
                                <hr>
                                <form id="change-profile-form" method="post">
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
                                  <div class="form-group">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn custom-button" id="btn-save" data-id="" data-function="">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
</div>

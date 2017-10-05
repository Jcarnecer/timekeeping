<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                            <h2>Edit Profile Picture</h2>
                            <hr>
                                <a data-toggle="modal" href="#employee-picture-modal"><img height="200" id="prof_pic"></a>
                                <hr>

                                <!-- <a class="btn btn-info waves-effect" href="<?= base_url().'employee/request_shift/'.$this->session->id?>">Shift</a> -->
                                <a class="btn btn-info waves-effect" href="login/logout"><i class="fa fa-sign-out m-r-10"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                                <h2>Edit Information</h2>
                                <hr>
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
                                  <hr>
                                    <button type="Submit" class="btn btn-info"><i class="fa fa-save m-r-10"></i>Submit</button>
                                  </div>
                                </form>

                            </div>
                        </div>
</div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                              <div id="success-message"></div>
                                <h2>Other Information</h2>
                                <hr>
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
                                    <button type="Submit" class="btn btn-info"><i class="fa fa-save m-r-10"></i>Submit</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>


    </div>
</div>

<?php $this->load->view('users/partials/employee_picture') ?>

<div class="container">
    <div class="login-page">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h5 id="alert-login"></h5> -->
                    <form id="reset-form" class="form-vertical" method="post">
                    <div class="control-group normal_text"> <h3>Reset Password</h3></div>
                    <h5>To Activate Your Account.</h5>
                    <hr>
                    <h5 id="alert-reset"></h5>
                           <div class="control-group">
                           <input type="hidden" name="id" value="<?= $id ?>">
                           <input type="hidden" name="check" value="<?= $check ?>">
                               <div class="controls">
                                   <div class="main_input_box">
                                       <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Temporary Password" name="tpass" />
                                       <div style="color: red" id="old_err"></div>
                                   </div>
                               </div>
                           </div>
                           <div class="control-group">
                               <div class="controls">
                                   <div class="main_input_box">
                                       <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="New Password" name="npass" />
                                       <div style="color: red" id="new_err"></div>
                                   </div>
                               </div>
                           </div>
                           <div class="control-group">
                               <div class="controls">
                                   <div class="main_input_box">
                                       <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Confirm Password" name="cpass" />
                                       <div style="color: red" id="con_err"></div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-action pull-right">
                               <button type="submit" class="btn btn-success ">Submit</button>
                           </div>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
<h3>Users Management</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-users-modal">
        Add Users
    </button>
        <br><hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="tktbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userdata">
                    
                </tbody>
            </table>
        </div>
    </div>
    <?php 
    $this->load->view('users/partials/add_users_modal'); 
    $this->load->view('users/partials/activate_modal'); 
    $this->load->view('users/partials/deactivate_modal'); 
    $this->load->view('users/partials/reset_password');
    ?>

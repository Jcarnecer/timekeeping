    <h3 class="title">Position Management</h3>
    <button type="button" class="btn custom-button float-right" data-toggle="modal" data-target="#add-position-modal">
        Add Position
    </button>
    <hr>
        <br><hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="tktbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Privileges</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="positiondata">
                    
                </tbody>
            </table>
        </div>
    </div>
    <?php $this->load->view('position/partials/add_modal') ?>
    <?php $this->load->view('position/partials/edit_modal') ?>
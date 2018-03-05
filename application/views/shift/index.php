
<?php 
$segment1 = $this->uri->segment(1);
if($segment1 == 'schedule'){
    $this->load->view('shift/admin');
}elseif($segment1 == 'shift'){?>
    <h3>Shift Type</h3>
    <button class="btn custom-button float-right" data-toggle="modal" data-target="#e-sh-modal" id="btn_add_shift">Add Shift</button>
        <br><hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="tktbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shift</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="shiftdata">
                    
                </tbody>
            </table>
        </div>
    </div>
    <?php $this->load->view('shift/partials/edit_modal');
}elseif($segment1 == 'eschedule'){
    $this->load->view('shift/employee');
}
?>






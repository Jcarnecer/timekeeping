
<?php 
$segment1 = $this->uri->segment(1);
$segment2=$this->uri->segment(2);
if($segment2 == 'front'){
    $this->load->view('shift/frontHouse');
}elseif($segment1 == 'eschedule'){
    $this->load->view('shift/employee');
}elseif($segment2=='back'){
    $this->load->view('shift/backHouse');
}elseif($segment1 == 'shift'){?>
        <h3>Shift Type</h3>
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
        <?php $this->load->view('shift/partials/edit_modal');}

?>






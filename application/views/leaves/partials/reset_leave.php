<div id="reset-leave-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Reset Leave For Active Users</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <h6> Are you sure you want to reset leave for active users? </h6>
                <br>
                <h5 id="r-allowance"></h5>
			</div>
			<div class="modal-footer">
                <form id="r-a-form" method="post">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="leave_name" name="leave_name">
					<input type="hidden" id="No_of_Days" name="No_of_Days">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="submit" class="btn custom-button">Yes</button>
				</form>
			</div>
		</div>
  </div>
</div>
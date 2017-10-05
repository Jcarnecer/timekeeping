		<?php 
			$segment =  $this->uri->segment(1);
			$segment2 =  $this->uri->segment(2);
		if($segment == 'users' && $segment2 == 'details' ){ ?>
			<script>
				fetch_details();
			</script>
			<?php } ?>
		
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.nicescroll.min.js"></script>
		<script src="assets/js/script.js"></script>
    </body>
</html>
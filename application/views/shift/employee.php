<div class="card-group h-100">
    <?php foreach($all_shift as $shift): ?>
    <div class="card rounded-0">
        <div class="card-header">
            <h2 class="d-inline-block m-0"><?= $shift->shift_type ?></h2>
            <p class="d-inline-block text-muted m-0"><?= $shift->start_time . ' - ' . $shift->end_time ?></p>
        </div>
        <div id="shift-<?= $shift->id ?>" class="card-body shift-table" ondrop="drop(event)" ondragover="allowDrop(event)">
        	<?php foreach($all_employee as $employee):
        			$e_shift=null;
        			foreach ($all_emp_shift as $emp_shift)
        				if($employee->id == $emp_shift->user_id) 
		        			if($shift->id == $emp_shift->shift_id) {
        	?>
                <div id="user-<?= $employee->id ?>" class="card my-2 custom-card" draggable="true" ondragstart="drag(event)">
                    <div class="card-body">
                        <div class="card-text"><?= $employee->firstname . ' ' . $employee->lastname ?></div>
                    </div>
                </div>
            <?php 
			break;}
            endforeach; ?>
        </div>
    </div>
    <?php endforeach ?>
</div>
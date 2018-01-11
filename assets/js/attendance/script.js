var date_today = $.datepicker.formatDate('DD - MM dd, yy', new Date());

function fetch_attendance(){
  $.ajax({
    url: "get/attendance",
    type: "POST",
    success: function(data){
      $("#timesheet").html(data);
      $("#timesheet-table").DataTable({
        "order": [[ 0, "desc" ],[ 1, "desc" ]]
      });
    }
  })
}

function fetch_intern_attendance(){
	$.ajax({
	  url: "attendance/get_intern_timesheet",
	  type: "POST",
	  success: function(data){
		$("#intern-timesheet").html(data);
		$("#intern-timesheet-table").DataTable({
		  "order": [[ 0, "desc" ],[ 1, "desc" ]]
		});
	  }
	})
  }

function fetch_employee_attendance() {
	$.ajax({
		url: "get/emp_attendance",
		type: "POST",
		success: function(data){
			$("#employee-attendance").html(data);
			$("#employee-attendance-table").DataTable({
				"order": [[ 1, "desc" ]]
			});
		}
	})
}

// function fetch_leave(index,order) {
// 	$.ajax({
// 		url: "get/leave",
// 		type: "POST",
// 		success: function(data){
// 			$("#leave-data").html(data);
// 			$("#leave-table").DataTable({
// 				"order": [[ 0, "desc" ]]
// 			});
// 		}
// 	})
// }

function fetch_overtime() {
	$.ajax({
		url: "get/emp_overtime",
		type: "POST",
		success: function(data){
			$("#employee-overtime").html(data);
			$("#employee-overtime-table").DataTable();
		}
	})
}

// function fetch_employee_overtime(){
//   $.ajax({
//     url: base_url + "get/emp_overtime",
//     type: "POST",
//     success: function(data){
//       $("#employee-overtime").html(data);
//       $("#employee-overtime-table").DataTable();
//     }
//   })
// }
function fetch_admin_overtime(){
  $.ajax({
    url: "get/admin_overtime",
    type: "POST",
    success: function(data){
        $("#admin-overtime").html(data);
        $("#admin-overtime-table").DataTable();
    }
  })
}

$(function(){
$('[data-name="overtime-details"]').click(function(e){
  var id = $(this).attr('data-id');
  $.ajax({
      url:"attendance/get_overtime_details/" + id,
      method: "POST",
      success: function(data){
          var result = JSON.parse(data);
            $("#overtime-date").html(result.overtime_date);
            $("#start").html(result.start);
            $("#end").html(result.end);
            $("#reason").html(result.reason);
      }
		})
		e.preventDefault();
  })
})


$(document).ready(function(){
	$(".form-timesheet").on('submit',function(e){
		$.ajax({
		url: 'add/attendance',
		type: "POST",
		data: $(this).serialize(),
		success: function(data){

			var result = JSON.parse(data);
			var status = result.status;
		
			if(status == 'Work From Home' || status == '8 hours' || status == '4 hours'){

				$("#exist-attendance").html("Your attendance today is <br>" +status+  
											"<br><br> Have a nice day!");
				$(".modal-title").html(date_today);
				$("#attendance-modal").modal('show');
				fetch_attendance();

			}else if(status == 'Sick Leave' || status == 'Vacation Leave') {
				
				$(".modal-title").html(date_today);
				$("#exist-attendance").html("You filed "+status);
				$("#attendance-modal").modal('show');
				fetch_leave();
				
			}else if(status == 'Intern Attendance'){
				
				$("#intern-attendance-modal").modal('hide');
				bs_notify("<strong>Successfully have attendance</strong>","success","top","right");
				
				fetch_intern_attendance();
			
			}else{
				$("#intern-attendance-modal").modal('hide');
				$(".modal-title").html(date_today);
				$("#exist-attendance").html(result);
				$("#attendance-modal").modal('show');
			}
		}

		})
		e.preventDefault();
	})
})

$(document).on('click','.activate-user',function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    $(".modal-title").html("Activate "+name);
    $("#u-a-id").val(id);
    $("#u-a-name").val(name);
    $("#activate-confirm-message").html("Are your sure you want to activate "+name+"?");
})

//overtime
$(document).ready(function(){
	$("#file-overtime-form").on('submit',function(e){
		$.ajax({
			url: 'add/overtime',
			type: "POST",
			data: $(this).serialize(),
			success: function(data){
				fetch_overtime();
				$('#file-overtime-modal').modal('hide');
			}
		})
		e.preventDefault();
	})
})

$(document).ready(function(){
	$("#accept-overtime-form").on('submit',function(e){
		$.ajax({
			url: 'attendance/approve_ot',
			type: "POST",
			data: $(this).serialize(),
			success: function(data){
				$('#accept-overtime-modal').modal('hide');
				bs_notify("<strong>Successfully accepted overtime </strong>","success","top","right");
				fetch_overtime();
				fetch_admin_overtime();
			}
		})
		e.preventDefault();
	})
})

$(document).ready(function(){
	$("#reject-overtime-form").on('submit',function(e){
		$.ajax({
			url: 'attendance/reject_ot',
			type: "POST",
			data: $(this).serialize(),
			success: function(data){
				$('#reject-overtime-modal').modal('hide');
				bs_notify("<strong>Successfully reject overtime </strong>","success","top","right");
				fetch_overtime();
				fetch_admin_overtime();
			}
		})
		e.preventDefault();
	})
})



$(document).on('click','.accept-ot',function() {
	var id = $(this).data('id');
	var name = $(this).data('name');
	var date = $(this).data('date');
	var date_submit = $(this).data('datesubmit');
	var from = $(this).data('start');
	var to = $(this).data('end');
	var reason = $(this).data('reason');

	$("#ot-id").val(id);
	$(".modal-title").html('Overtime Request');
	$("#a-ot-q").html('Are you sure you want to accept?');
	$("#ot-name").html(name);
	$("#ot-date-submit").html("Date Submitted: "+date);
	$("#ot-date").html(date);
	$("#ot-start").html(from);
	$("#ot-end").html(to);
	$("#ot-reason").html(reason);
})




$(document).on('click','.reject-ot',function() {
	var id = $(this).data('id');
	var name = $(this).data('name');
	var date = $(this).data('date');
	var date_submit = $(this).data('datesubmit');
	var from = $(this).data('start');
	var to = $(this).data('end');
	var reason = $(this).data('reason');

	$("#r-ot-id").val(id);
	$(".modal-title").html('Overtime Request');
	$("#r-ot-q").html('Are you sure you want to reject?');
	$("#r-ot-name").html(name);
	$("#r-ot-date-submit").html("Date Submitted: "+date);
	$("#r-ot-date").html(date);
	$("#r-ot-start").html(from);
	$("#r-ot-end").html(to);
	$("#r-ot-reason").html(reason);
})


$(document).on('click','.details-ot',function() {
	var id = $(this).data('id');
	var name = $(this).data('name');
	var date = $(this).data('date');
	var date_submit = $(this).data('datesubmit');
	var from = $(this).data('start');
	var to = $(this).data('end');
	var reason = $(this).data('reason');

	$("#ot-id").val(id);
	$(".modal-title").html('Overtime Request');
	$("#a-ot-q").html('Are you sure you want to accept?');
	$("#ot-name").html(name);
	$("#ot-date-submit").html(date);
	$("#overtime-date").html(date);
	$("#start-ot").html(from);
	$("#end-ot").html(to);
	$("#reason-ot").html(reason);
})


$(document).on('click','#btn-file-leave',function(){
	$.ajax({
		url: 'leaves/leave_request',
		type: "POST",
		data: $('#file-leave-form').serialize(),
		success: function(data){
			var result=JSON.parse(data);
			if(result=='success'){ 	
			$('#file-leave-modal').modal('hide');
			bs_notify("<strong>Successfully File a Leave </strong>","success","top","right");
			}
			else{
				$("#error-message").html(result);
			}
		}
	});
});



$.fn.getmyLeave=function(){
    var $url = "get/leave";
   return $.ajax({
      url:$url,
      type:"GET",
      dataType: 'JSON'
    });
  };

  $.fn.displayMyLeave=function(items){
	$("#tbody-my-leave").html("");

	$.each(items,function(i,item){
				

				$('#tbody-my-leave').append(`
						<tr>    
							<td>${item['leave_name']}</td>
							<td>${item['start_date']}</td>
							<td>${item['end_date']}</td>
							<td>${item['duration']} Days </td>
							<td>${item['status']}</td>
						</tr>`    
				);
	});
	$("#table-my-leave").DataTable();
   
  };





  $(document).getmyLeave().done(function(data){	
	$(document).displayMyLeave(data); 
  });


 



// fetch_leave();
fetch_overtime();
// fetch_employee_overtime();
fetch_admin_overtime();
fetch_attendance();
fetch_employee_attendance();
fetch_intern_attendance();

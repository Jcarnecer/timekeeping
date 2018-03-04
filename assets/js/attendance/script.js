var date_today = $.datepicker.formatDate('DD - MM dd, yy', new Date());

function fetch_attendance(){
  $.ajax({
    url: "get/attendance",
    type: "POST",
    success: function(data){
      $("#timesheet").html(data);
      $("#timesheet-table").DataTable({
		"order": [[ 0, "desc" ],[ 1, "desc" ]],
		"retrieve":true,
		"scrollY":"350px",
        "scrollCollapse": true,
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
		  "order": [[ 0, "desc" ],[ 1, "desc" ]],
		  "retrieve":true,
		  "scrollY":"350px",
		  "scrollCollapse": true,
		});
		// $("#employee-attendance").html(data);
		// $("#employee-attendance-table").DataTable({
		// 	// "order": [[ 0, "desc" ]],
		// 	"order": [[ 0, "desc" ],[ 1, "desc" ]],
		// 	"retrieve":true,
		// 	"scrollY":"350px",
		// 	"scrollCollapse": true,
		// });
		// $("#timesheet").html(data);
		// $("#timesheet-table").DataTable({
		//   "order": [[ 0, "desc" ],[ 1, "desc" ]],
		//   "retrieve":true,
		//   "scrollY":"350px",
		//   "scrollCollapse": true,
		// });

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
				"order": [[ 1, "desc" ]],
				"retrieve":true,
				"scrollY":"350px",
				"scrollCollapse": true,
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
		    console.log(result);
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
				
			}else if(status == 'Employee Attendance'){
				
				$("#intern-attendance-modal").modal('hide');
				bs_notify("<strong>Successfully have attendance</strong>","success","top","right");

				fetch_attendance();
			
			}else{
				$("#intern-attendance-modal").modal('hide');
				$(".modal-title").html(date_today);
				$("#exist-attendance").html(result);
				$("#attendance-modal").modal('show');
			}
		},
		error:function(data){
			bs_notify("<strong>Error</strong>","danger","top","right");
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
			$(document).getMyLeave().done(function(data){	
				$(document).displayMyLeave(data); 
			  });	
			}
			else{
				$("#error-message").html(result);
			}
		}
	});
});

// $(document).ready(function(){
// 	$id=$("#my_leave").attr('data-id');
// 	var $url = "get/leave/"+ $id ;
// 	$.ajax({
// 		url:$url,
// 		type:"GET",
// 		dataType: 'JSON',
// 	 success:function(data){
// 		$("#tbody-my-leave").html("");
// 		$.each(data,function(i,item){
// 					$('#tbody-my-leave').append(`
// 							<tr>    
// 								<td>${item['leave_name']}</td>
// 								<td>${item['start_date']}</td>
// 								<td>${item['end_date']}</td>
// 								<td>${item['duration']} Days </td>
// 								<td>${item['status']}</td>
// 							</tr>`    
// 					);
// 		});
// 		$("#table-my-leave").DataTable();
// 	 } 
// 	});
// });


$.fn.getMyLeave=function(){
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
	$("#table-my-leave").DataTable({
		"retrieve":true,
		"scrollY":"350px",
        "scrollCollapse": true,
	});
   
  };

  
  
$.fn.getEmployeeLeave=function(){
	$id=" ";
	var $url = "get/leave/request";
	
   return $.ajax({
      url:$url,
      type:"GET",
      dataType: 'JSON'
    });
  };

  $.fn.displayEmployeeLeave=function(items){
	$("#tbody-employee-leave").html("");
	$(".dropdown-menu").html("");
	
				$.each(items,function(i,item){
							$('#tbody-employee-leave').append(`
									<tr>    
										<td>${item['leave_name']}</td>
										<td>${item['start_date']}</td>
										<td>${item['end_date']}</td>
										<td>${item['duration']} Days </td>
										<td>${item['last_name']} ${item['first_name']}</td>
										<td>${item['status']}</td>
										
										<td>
										<div class="btn-group">
											<button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Action
										</button>
 
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="dropdown">
													${item['status']=="Pending"?
														`<a class="dropdown-item" data-toggle="modal" data-target="#view-file-leave-modal" id="btn-view" data-id="${item['id']}">View</a>
														 <a class="dropdown-item" data-id="${item['id']}"  id="approve_leave" data-start="${item['start_date']}" data-end="${item['end_date']}">Approve</a>
														 <a class="dropdown-item" data-id="${item['id']}"  id="reject_leave">Reject</a>`
														 :
														`<a class="dropdown-item" data-toggle="modal" data-target="#view-file-leave-modal" id="btn-view" data-id="${item['id']}">View</a>`}
											</div>
										</div>  
								  	 </td>
									</tr>`    
							);
							
						
				});	
				$("#employee-leave-table").DataTable({
					"retrieve":true,
					"scrollY":"350px",
					"scrollCollapse": true,
				});		
  };

  $(document).on('click','#approve_leave',function(){
	  $id=$(this).attr('data-id');
	  $start=$(this).attr('data-start');
	  $end=$(this).attr('data-end');
	  console.log($end + $start);
	$.ajax({
		url: 'leave/approve/'+ $id,
		type: "POST",
		data: {'start_date':$start,
			   'end_date':$end},
		success: function(data){
			var result=JSON.parse(data);
			if(result=='success'){ 	
			bs_notify("<strong>Successfully Updated an Employee Request(Leave) </strong>","success","top","right");
			
					$(document).getEmployeeLeave().done(function(data){	
						$(document).displayEmployeeLeave(data); 
					});
			}
			else{
				bs_notify("<strong>"+ result +"</strong>","danger","top","right");
			}
		}
	});
  });
  $(document).on('click','#reject_leave',function(){
	$id=$(this).attr('data-id');
	$.ajax({
		url: 'leaves/reject_leave/'+ $id,
		type: "POST",
		success: function(data){
			var result=JSON.parse(data);
			if(result=='success'){ 	
			bs_notify("<strong>Successfully Updated an Employee Request(Leave) </strong>","success","top","right");
			
					$(document).getEmployeeLeave().done(function(data){	
						$(document).displayEmployeeLeave(data); 
					});
			}
			else{
				
			}
		}
	});
  });	

 
  $(document).on('click','#btn-view',function(){
	$id=$(this).attr('data-id');
	$.ajax({
		url: 'get/leave/request/'+ $id,
		type: "GET",
		dataType: "JSON",
		success: function(data){
			$("#view-file-leave-modal").find('.modal-title').html("Filed By:" + data.lastname +","+data.firstname);
			$('#leave_name').val(data.leave_name);
			$("#start_date").val(data.start_date);		
			$("#end_date").val(data.end_date);		
			$("#duration").val(data.duration);		
			$("#status").val(data.status);
			$("#reason").val(data.reason);				
		}
	});

  });


  $(document).getMyLeave().done(function(data){	
	$(document).displayMyLeave(data); 
  });

  $(document).getEmployeeLeave().done(function(data){	
	$(document).displayEmployeeLeave(data); 
  });


 

 


// fetch_leave();
fetch_overtime();

// fetch_employee_overtime();
fetch_admin_overtime();
fetch_attendance();
fetch_employee_attendance();
fetch_intern_attendance();

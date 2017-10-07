var date_today = $.datepicker.formatDate('DD - MM dd, yy', new Date());

function fetch_attendance(){
  $.ajax({
    url: base_url + "get/attendance",
    type: "POST",
    success: function(data){
      $("#timesheet").html(data);
      $("#timesheet-table").DataTable({
        "order": [[ 0, "desc" ],[ 1, "desc" ]]
      });
    }
  })
}

function fetch_employee_attendance() {
	$.ajax({
		url: base_url + "get/emp_attendance",
		type: "POST",
		success: function(data){
			$("#employee-attendance").html(data);
			$("#employee-attendance-table").DataTable({
				"order": [[ 1, "desc" ]]
			});
		}
	})
}

function fetch_leave(index,order) {
	$.ajax({
		url: base_url + "get/leave",
		type: "POST",
		success: function(data){
			$("#leave-data").html(data);
			$("#leave-table").DataTable({
				"order": [[ 0, "desc" ]]
			});
		}
	})
}

function fetch_overtime() {
	$.ajax({
		url: base_url + "get/emp_overtime",
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
    url: base_url + "get/admin_overtime",
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
      url: base_url + "attendance/get_overtime_details/" + id,
      method: "GET",
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
		url: base_url + 'add/attendance',
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
				
			}else{

				$(".modal-title").html(date_today);
				$("#exist-attendance").html(result);
				$("#attendance-modal").modal('show');
			
			}
		}

		})
		e.preventDefault();
	})
})

$(document).ready(function(){
	$("#file-overtime-form").on('submit',function(e){
		$.ajax({
			url: base_url + 'add/overtime',
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


$(document).on('click','.activate-user',function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    $(".modal-title").html("Activate "+name);
    $("#u-a-id").val(id);
    $("#u-a-name").val(name);
    $("#activate-confirm-message").html("Are your sure you want to activate "+name+"?");
})
fetch_leave();
fetch_overtime();
// fetch_employee_overtime();
fetch_admin_overtime();
fetch_attendance();
fetch_employee_attendance();
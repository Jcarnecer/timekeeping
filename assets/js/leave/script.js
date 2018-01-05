
$(document).on('click','#btn-add-leave',function(){
    $('#leave-form')[0].reset();
    $("#leave-modal").find(".modal-title").html("Add Leave");
    $("#leave-modal").find("#btn-save").attr("data-function","add_leave");    
});

$(document).on('click','#btn-edit-leave',function(){
             
    var $leave_name=$(this).closest('tr').find('td[data-leave="leave_name"]').html();
    var $days=$(this).closest('tr').find('td[data-leave="days"]').html();
    $("#leave_name").val($leave_name);
    $('#No_of_days').val($days);
    var leaveId=$(this).attr('data-id');
    $("#leave-modal").find("#btn-save").attr("data-id",leaveId);
    $("#leave-modal").find(".modal-title").html("Edit Leave");
    $("#leave-modal").find("#btn-save").attr("data-function","update_leave");  
}); 

$(document).on('click','button[data-function="add_leave"]',function(){
    $.ajax({
        url: 'leaves/add',
        type: "POST",
        data: $("#leave-form").serialize(),
        success: function(data){
            var result = JSON.parse(data);
            if(result=='success'){
                $(document).getLeaveInfo().done(function(data){	
                    $(document).displayLeaveInfo(data); 
                  });  
                
            }
            else{
                $("#error-message").html(result);
            }
            $("#leave-modal").modal('toggle');  
        }
    })
});
$(document).on('click',"button[data-function='update_leave']",function(){
    var leaveId = $(this).attr('data-id');
    var url = "leaves/edit/"+ leaveId
    var form=$('#leave-form').serialize();
        $.ajax({
            "url":url,
            "method":"POST",
             data:form,
            success: function(data){
              var result = JSON.parse(data);
              if(result=='success'){
                $(document).getLeaveInfo().done(function(data){	
                    $(document).displayLeaveInfo(data); 
                  });
                 
                }
                else{
                    $("#error-message").html(result);
                }
                $("#leave-modal").modal('toggle');   
            }
        });
  });




$.fn.getLeaveInfo=function(){
    var $url = "get/leaveInfo";
   return $.ajax({
      url:$url,
      type:"GET",
      dataType: 'JSON'
    });
  };

  $.fn.displayLeaveInfo=function(items){
  
    $("#tbody-leaves").html('');
    
        $.each(items,function(i,item){
            $('#tbody-leaves').append(`
                      
                    <tr class=${item['id']}>
                        <td>${item['id']}</td>
                        <td data-leave="leave_name">${item['leave_name']}</td>
                        <td data-leave="days">${item['No_of_days']}</td>
                        <td>
                             <div class="btn-group">
                                 <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                             </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                     <a class="dropdown-item" id="btn-edit-leave" data-id="${item['id']}" data-target="#leave-modal" data-toggle="modal">Edit</a>
                                     <a class="dropdown-item">Reset Leave</a>
                                 </div>
                             </div>  
                        </td>
                    </tr>`    
            );
		});
		$("#table-leaves").DataTable();
  };

  
  $(document).getLeaveInfo().done(function(data){	
	  $(document).displayLeaveInfo(data); 
	});



$(document).on('click','#btn-add-leave',function(){
    $('#leave-form')[0].reset();
    $("#leave-modal").find(".modal-title").html("Add Leave");
    $("#leave-modal").find("#btn-save").attr("data-function","add_leave");    
});

$(document).on('click','#btn-edit-leave',function(){
             
    var $leave_name=$(this).closest('tr').find('td[data-leave="leave_name"]').html();
    var $days=$(this).closest('tr').find('td[data-leave="days"]').html();
    $("#leave").val($leave_name);
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
                  $("#leave-modal").modal('toggle');      
            }
            else{
                $("#error-message").html(result);
            }
            
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
                  $("#leave-modal").modal('toggle');   
                }
                else{
                    $("#error-message").html(result);
                }   
               
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
                        <td data-leave="leave_name">${item['leave_name']}</td>
                        <td data-leave="days">${item['No_of_days']}</td>
                        <td>
                             <div class="btn-group">
                                 <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                             </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                     <a class="dropdown-item" id="btn-edit-leave" data-id="${item['id']}" data-target="#leave-modal" data-toggle="modal">Edit</a>
                                     <a class="dropdown-item" data-toggle="modal" data-target="#reset-leave-modal" id="btn-reset-leave" data-leave="${item['leave_name']}" data-id="${item['id']}" data-days="${item['No_of_days']}">Reset Leave</a>
                                 </div>
                             </div>  
                        </td>
                    </tr>`    
            );
		});
		$("#table-leaves").DataTable();
  };

  $(document).on('click','#btn-reset-leave ',function(){
    var leave_name = $(this).attr('data-leave');
    var $NoOfDays =  $(this).attr('data-days');
    var id = $(this).data('id');
    $("#id").val(id);

    
})


  $(document).ready(function(){
    $("#r-a-form").on('submit',function(e){
        $.ajax({
            url: 'leaves/approved_reset',
            method: "POST",
            data: $("#r-a-form").serialize(),
            success: function(data){
                $("#reset-leave-modal").modal('hide');
                bs_notify("<strong>Successfully Reset Leave</strong>","success","top","right");
            },
            error: function() {
                alert('error');
            }
        })
        e.preventDefault();
    })
}) 


  $(document).getLeaveInfo().done(function(data){	
	  $(document).displayLeaveInfo(data); 
	});


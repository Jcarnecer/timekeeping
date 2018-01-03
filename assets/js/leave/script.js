$(document).ready(function(){
	$("#leave-form").on('submit',function(e){
		$.ajax({
			url: 'leaves/add',
			type: "POST",
            data: $(this).serialize(),
            datatype:JSON,
			success: function(data){
				if(data=='success'){
                        
                }
			}
		})
		e.preventDefault();
	})

	
})

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
                        <td >${item['id']}</td>
                        <td >${item['leave_name']}</td>
                        <td >${item['No_of_days']}</td>
                        <td>
                             <div class="btn-group">
                                 <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                             </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                     <a class="dropdown-item">Edit</a>
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


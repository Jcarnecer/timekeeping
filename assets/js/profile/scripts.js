function fetch_profile() {
    $.ajax({
        url: base_url + "profile/get_user",
        type: "POST",
        success: function(data) {
            var result = JSON.parse(data);
            $("#firstname").val(result.firstname);
            $("#lastname").val(result.lastname);
            $("#email").val(result.email);
            $("#profile-name").html(result.lastname+', '+result.firstname);
            $("#profile-email").html(result.email);
            $("#profile-position").html(result.position);
			$('#prof_pic').attr('src','assets/uploads/'+result.profile_picture);
			$("#profile-sss").html(result.sss_no);
			$("#profile-tin").html(result.tin_no);
			$("#profile-philhealth").html(result.ph_health);

			//intern
            $("#hrs_remaining").html(result.remaining)
			$("#profile-school").html(result.school);
			$("#profile-course").html(result.course);
			$("#profile-year").html(result.year);
			$("#profile-total-num-hrs").html(result.no_of_hrs);
        }
    })
}

$(document).ready(function(){
    $("#change-profile-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'profile/changeinfo',
            data: $("#change-profile-form").serialize(),
            type: "POST",
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
                    $("#edit-profile-modal").modal('hide');
                    fetch_profile();
                    bs_notify("<strong> Successfully Change Your Profile.</strong>","success","top","right");
                    $(".text-danger").html("");
                    
                }else{
                    perfield_error_message("#fname_err",result.f_error);
                    perfield_error_message("#lname_err",result.l_error);
                    perfield_error_message("#email_err",result.e_error);
                }
            },
            error: function(data)
            {
                alert('Opps! Something went wrong. please contact the administrator. ');
            },
        })
      e.preventDefault();
    });
});

$(document).ready(function(){
    $("#change-picture-form").on('submit',function(e){
        var form = new FormData(document.getElementById("change-picture-form"));
        $.ajax({
            url: base_url + 'profile/changepicture',
            data: form,
            type: "POST",
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
                    $("#profile-picture-modal").modal('hide');
                    $("#error-message-picture").hide();
                    $("#profile_pic").val("");
                    bs_notify("<strong> Successfully Change Your Profile Picture.</strong>","success","top","right");
                    fetch_profile();
                }
                else{
                    error_message("#error-message-picture",result);
                }
            },
            error: function(data)
            {
                alert('Opps! Something went wrong. please contact the administrator. ');
            },
        })
      e.preventDefault();
    });
});

$(document).ready(function(){
    $("#change-pass-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'profile/changepassword',
            data: $(this).serialize(),
            type: "POST",
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
					$("#edit-profile-modal").modal('hide');
                    $("input[type='password']").val("");
                    bs_notify("<strong> Successfully Change Your Password.</strong>","success","top","right");
                    $(".text-danger").html("");
                }
                else{
                    perfield_error_message("#old_err",result.o_err);
                    perfield_error_message("#new_err",result.n_err);
                    perfield_error_message("#confirm_err",result.c_err);
                }
            },
            error: function(data)
            {
                alert('Opps! Something went wrong. please contact the administrator. ');
            },
        })
      e.preventDefault();
    });
  });

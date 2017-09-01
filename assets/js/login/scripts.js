$(document).ready(function(){
    $("#login-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'auth/login',
            data: $(this).serialize(),
            type: "POST",
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
                    $("#alert-login").html("");
                    window.location.href=base_url+"dashboard";
                }
                else{
                    error_message("#alert-login",result)
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
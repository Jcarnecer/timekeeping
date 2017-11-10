$(document).ready(function(){
    $("#login-form").on('submit',function(e){
        $.ajax({
            url: 'auth/login',
            data: $(this).serialize(),
            type: "POST",
            success: function(data)
            {
                var result = JSON.parse(data);
                console.log(result);
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

  $(document).ready(function(){
    $("#reset-form").on('submit',function(e){
      $.ajax({
        url: base_url + 'reset/authreset',
        data: $(this).serialize(),
        type: "POST",
        success: function(data)
        {
          var result = JSON.parse(data);
          if(result === "success"){
            $("#old_err").html("");
            $("#new_err").html("");
            $("#con_err").html("");
            $("input").val("");
            $("#alert-reset").show();
            $("#alert-reset").html("Account is now activated");
            window.setTimeout(function(){location.href=base_url+""},3000);
          }
          else{
            $("#alert-reset").hide();
            $("#old_err").html(result.old_err);
            $("#new_err").html(result.new_err);
            $("#con_err").html(result.con_err);
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
  
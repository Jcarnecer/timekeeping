function fetch_users() {
    $.ajax({
        url: base_url + "get/users",
        type: "POST",
        success: function(data) {
            $("#userdata").html(data);
            $("#tktbl").DataTable();
        }
    })
}

$(document).ready(function(){
    $("#add-user-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'add/user',
            type: "POST",
            data: $("#add-user-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);

                if(result.success === 1) {
                    $("input").val("");
                    $(".fname-error").html("");
                    $(".lname-error").html("");
                    $(".mname-error").html("");
                    $(".email-error").html("");
                    $(".pos-error").html("");
                    $("#add-users-modal").modal("hide");
                    bs_notify("<strong>Successfully added " +result.name + "</strong>","success","top","right");
                    fetch_users();
                    
                }else{
                    $(".fname-error").html(result.fname_error);
                    $(".lname-error").html(result.lname_error);
                    $(".mname-error").html(result.mname_error);
                    $(".email-error").html(result.email_error);
                    $(".pos-error").html(result.pos_error);
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

$(document).ready(function(){
    $("#user-activated-form").on('submit',function(e) {
        $.ajax({
            url: base_url + 'activate/user',
            type: "POST",
            data: $("#user-activated-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $("#u-a-modal").modal('hide');
                bs_notify("<strong>Successfully activated " +result.name + "</strong>","success","top","right");
                fetch_users();
            }
        })
        e.preventDefault();
    }) 
})

$(document).on('click','.deactivate-user',function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    $(".modal-title").html("Deactivate "+name);
    $("#u-d-id").val(id);
    $("#u-d-name").val(name);
    $("#deactivate-confirm-message").html("Are your sure you want to deactivate "+name+"?");
})

$(document).ready(function(){
    $("#user-deactivated-form").on('submit',function(e) {
        $.ajax({
            url: base_url + 'deactivate/user',
            type: "POST",
            data: $("#user-deactivated-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $("#u-d-modal").modal('hide');
                bs_notify("<strong>Successfully deactivated " +result.name + "</strong>","success","top","right");
                fetch_users();
            }
        })
        e.preventDefault();
    }) 
})
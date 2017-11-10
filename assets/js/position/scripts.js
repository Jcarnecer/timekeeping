function fetch_positions() {
    $.ajax({
        url:  "get/position",
        type: "POST",
        success: function(data) {
            $("#positiondata").html(data);
            $("#tktbl").DataTable();
        }
    })
}

$(document).ready(function() {
    $("#add-position-form").on('submit',function(e){
        $.ajax({
            url: "add/position",
            method: "POST",
            data: $(this).serialize(),
            success:function(data){
                var result = JSON.parse(data);
                var name = $(this).data('name');
                var val = $(this).data('value');
                if(result.success === 1){
                    $("input").val("");
                    $("#add-position-error").hide();
                    $('.selectpicker').selectpicker('deselectAll');
                    $("#add-position-modal").modal('hide');
                    bs_notify("<strong>"+result.name+" position has been added .</strong>","success","top","right");
                    fetch_positions();
                }else{
                    error_message('#add-position-error',result);
                }
            },
            error: function(){
                alert('Opps! Something went wrong :( ');
            }
        })
      e.preventDefault();
    })
})


$(document).on('click','.edit-pos-modal',function() {
    var position = $(this).data('position');
    var privileges = $(this).data('privileges');
    var id = $(this).data('id');
    $('#privileges').selectpicker('val', privileges.split(","));
    $(".position").val(position);
    $("#id").val(id);
})


$(document).ready(function() {
    $("#update-position-form").on('submit',function(e){
        $.ajax({
            url: "edit/position",
            type: "POST",
            data: $("#update-position-form").serialize(),
            success:function(data) {
                var result = JSON.parse(data);
                if(result.success === 1) {
                    $("input").val("");
                    $("#u-position-error").hide();
                    $("#e-p-modal").modal('hide');
                    bs_notify("<strong>Updated " +result.name +" Position</strong>","success","top","right");
                    fetch_positions();
                }else{
                    error_message('#u-position-error',result);
                } 
            },
            error: function(data){
                alert('Opps! Something went wrong. please contact the administrator. ');
            }
        })
        e.preventDefault();
    })
})
  
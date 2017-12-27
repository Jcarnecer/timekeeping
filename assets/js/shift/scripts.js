function fetch_shift() {
    $.ajax({
        url: "shift/get_shift",
        type: "POST",
        success: function(data) {
            $("#shiftdata").html(data);
            $("#tktbl").DataTable();
        }
    })
}

$(document).on('click','.edit_shift',function(){
    var shift = $(this).data('shift');
    var start = $(this).data('start');
    var end   = $(this).data('end');
    var id    = $(this).data('id');

    $("#shift-type").val(shift);
    $("#start-time").val(start);
    $("#end-time").val(end);
    $("#id").val(id);
})

$(document).ready(function() {
    $("#update-shift-form").on('submit',function(e){
        $.ajax({
            url: 'shift/edit_shift',
            data: $("#update-shift-form").serialize(),
            type: "POST",
            success: function(data) {
                var result = JSON.parse(data);
                if(result.success === 1){
                    $("h5").html("");
                    $("#e-sh-modal").modal('hide');
                    bs_notify("<strong>"+result.shift+" shift has been updated .</strong>","success","top","right");
                    fetch_shift();
                }else{
                    $("#start-error").html(result.start_error);
                    $("#end-error").html(result.end_error);
                }
            },
            error: function(data){
                alert('Opps! Something went wrong!');
            }
        })

        e.preventDefault();
    })

    $('#shiftDock').on('mouseenter', (e) => {

        $('#shiftDock').addClass('show');
    })

    $('#shiftDock').on('mouseleave', (e) => {

        $('#shiftDock').removeClass('show');
    })
})

function allowDrop(e) {
    e.preventDefault();
}

function drag(e) {
    e.dataTransfer.setData("text", e.target.id);
}

function drop(e) {
    e.preventDefault();
    // var $data = $(`#${e.dataTransfer.getData("text")}`);
    // e.target.appendChild(document.getElementById(e.dataTransfer.getData("text")));
    $(`#${e.target.id}`).append($(`#${e.dataTransfer.getData("text")}`));
}
function error_message(idname,message) {
    $(idname).html('<div class="alert alert-danger" role="alert">'  + message +  
      '</div>');
}

function perfield_error_message(idname,result) {
  $(idname).html(result);
}
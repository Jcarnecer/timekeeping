function error_message(idname,message) {
    $(idname).html('<div class="alert alert-danger" role="alert">'  + message +  
      '</div>');
}
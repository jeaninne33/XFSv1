$('#estado_id').empty();
$('#pais_id').on('change',function(e){
    //alert($('#pais_id').val());
        console.log(e);
        var id=e.target.value;
        $.get('/state/'+id, function(data){
             //console.log(data);
            $('#estado_id').empty();
            $('#estado_id').append('<option value="">Seleccione el Estado</option>');
             $.each(data,function(index,estado){
               $('#estado_id').append('<option value="'+estado.id+'">'+estado.nombre+'</option>');
             });
           });
    });
$('#tipo').on('change',function(e){
      console.log(e);
      var tipo=e.target.value;
       //alert(tipo);
        if(  tipo=="prove"){
           $(".cliente").css("display", "none");
           $(".proveedor").css("display", "block");
        }else{
          if(tipo=="client"){
            $(".cliente").css("display", "block");
            $(".proveedor").css("display", "none");
          }else{
            $(".cliente").css("display", "block");
            $(".proveedor").css("display", "block");
          }//fin si
        }//fin si

    });
    var tipo=  $('#tipo').val();
     //alert(tipo);
      if(  tipo=="prove"){
         $(".cliente").css("display", "none");
         $(".proveedor").css("display", "block");
      }else{
        if(tipo=="client"){
          $(".cliente").css("display", "block");
          $(".proveedor").css("display", "none");
        }else{
          if(tipo=="cp"){
            $(".cliente").css("display", "block");
            $(".proveedor").css("display", "block");
          }//fin si
        }//fin si
      }//fin si


// $('#registro').click(function{
// var dato=$()
//
// });

$("#form1").on("submit", function(e){
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr("method"),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res)
            {
                if(res.message)
                {
                    clearMessages();
                    var html = "<div class='alert alert-success'>";
                    html+="<p>" + res.message + "</p>";
                    html += "</div>";
                    $(".successMessages").html(html);
                    $(this)[0].reset();
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                if(jqXHR)
                {
                    clearMessages();
                    var errors = jqXHR.responseJSON;
                    var html = "<div class='alert alert-danger alert-dismissable'>";
                    html+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    html+='  <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>';
                    html+='<ul>';
                    for(error in errors)
                    {
                        html+="<li> - " + errors[error] + "</li>";
                    }
                      html+='</ul>';
                    html += "</div>";
                    $(".errorMessages").html(html);
                }
            }
        });
});

function clearMessages()
{
    $(".errorMessages").html('');
    $(".successMessages").html('');
}

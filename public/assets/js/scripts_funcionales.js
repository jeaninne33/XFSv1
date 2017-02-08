
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


function createObjectCompany (data) {
  //fields struc Company
  var fields =  ["nombre", 'correo', 'direccion','cargo','website','tipo','estado_id','representante','ciudad','pais_id','codigop','telefono','telefono_admin','certificacion','banco','aba','cuenta','direccion_cuenta','categoria','servicio_disp'];
  var company = {}; //inicializate object
  company = loadObjectData(company, fields, data);
  company["aviones"] = []; // create list airplane
  return company;
}

function createObjectAirplane (data) {
    var fields = ['tipo1', 'matricula', 'licencia1','licencia2','registro','piloto1','piloto2','certificado','seguro'];
    var airplane =  {};
    airplane = loadObjectData(airplane, fields, data);
    airplane=changeProperty(airplane,'tipo1', 'tipo');
    return airplane;
}

function changeProperty(obj, old_name, new_name){
    for (var i = 0; i < obj.length; i++) {
      obj[i].new_name = obj[i].old_name;
      delete obj[i].old_name;
    }
    return obj;
}
function loadObjectData (obj, fields, data)
{
  for (var key in data) { //  loop find field company
    if (fields.indexOf(key)>=0) {
      obj[key] = data[key]; // asing value company
    }
  }
  return obj;
}

function loadCompanyAirplane(company, airplane){
  company.aviones.push(airplane);
  return company;
}

function  prepareCompany(data) {
   var company  =  createObjectCompany(data);
   var airplane  =  createObjectAirplane(data);
   company = loadCompanyAirplane(company, airplane);
   return company;
}

//enviando el formulario con ajax
$("#form1").on("submit", function(e){
  e.preventDefault();
  e.stopPropagation();
  clearMessages();

  var data  =  {};
  var bruteData  =  $(this).serializeArray().map(function(e){data[e.name] =  e.value;});
  var company  =  prepareCompany(data);
  company["_token"] =  data["_token"];
  $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr("method"),
      data: company,
      dataType: 'json',
    /*  beforeSend: function () {
        //  alert('ajaa');
      },*/
      success: function(data)
      {
          if(data.message)
          {
              var html = "<div class='alert alert-success alert-dismissable'>";
              html+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
              html+="<p>" + data.message + "</p>";
              html += "</div>";
              $(".successMessages").html(html);
              $("#form1")[0].reset();
              $("#estado_id").empty();
          }
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          if(jqXHR)
          {
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
//eliminar
$('.btn-delete').click(function(e){
   e.preventDefault();//evita que se envie el formulario
   var row=$(this).parents('tr');
   var id=row.data('id');
//   alert(row);
   //alert(id);
   if (confirm("¿Esta Seguro que desea Eliminar el Registro?") == true) {
       var form =$('#form-delete');
       var url=form.attr('action').replace(':COM_ID',id);
       var data=form.serialize();
       $("#mensaje").css("display", "block");
          $('#mensaje').toggleClass('alert alert alert-success');//cambiar la clase
       $.post(url, data, function(result){
          $('#mensaje').html(result);
        //alert(row);
        // row.fadeOut();
       }).fail(function(){
           $('#mensaje').toggleClass('alert alert alert-danger');
            $('#mensaje').html('Error. La compañia no fue eliminada');
         //alert('La compañia no fue eliminada');
           row.show();
       });

   }

});

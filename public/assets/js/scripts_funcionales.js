
/*$('#pais_id').on('change',function(e){
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
});+*/

$('#tipo').on('change',function(e){
      console.log(e);
      var tipo=e.target.value;
       //alert(tipo);
        if(  tipo=="prove"){
           $(".cliente").css("display", "none");
           $(".proveedor").css("display", "block");
           $(".avion").css("display", "none");
        }else if (tipo=="client") {
            $(".cliente").css("display", "block");
            $(".proveedor").css("display", "none");
            $(".avion").css("display", "block");
       }else{
            $(".cliente").css("display", "block");
            $(".proveedor").css("display", "block");
            $(".avion").css("display", "block");
        }//fin si
    });
/* var num_input = 1; //Número Maximo de aviones
 $("#add").on('click', function(){
      if(num_input <= 7) { //max input airplane
          //agregar campo
          var ac=num_input;
          num_input++;
          $("#avion"+ac).append('  <br/>  <p><b>Datos del Avión #'+num_input+'<b><p/><div class="col-md-2"><label for="tipo">Tipo de Avion *</label><input type="text" class="input-text full-width" ng-model="airplanes.tipo" name="tipo" id="tipo"/></div><div class="col-md-2"><label for="modelo">Modelo</label><input type="text" class="input-text full-width" ng-model="airplanes.modelo" name="modelo" id="modelo"/></div><div class="col-md-2"><label for="fabricante">Fabricante</label><input type="text" class="input-text full-width" name="fabricante" id="fabricante" ng-model="airplanes.fabricante"/></div><div class="col-md-2"><label for="matricula">Matricula *</label><input type="text" class="input-text full-width" ng-model="airplanes.matricula" name="matricula" id="matricula"/></div><div class="col-md-2"><label for="licencia1">Licencia 1 *</label><input type="text" class="input-text full-width" ng-model="airplanes.licencia1" name="licencia1" id="licencia1"/></div><div class="col-md-2"><label for="licencia2">Licencia 2 </label><input type="text" class="input-text full-width" ng-model="airplanes.licencia2" name="licencia2" id="licencia2"/></div><div class="col-md-2"><label for="registro">Registro</label><input type="text" class="input-text full-width" ng-model="airplanes.registro" name="registro" id="registro"/></div><div class="col-md-2"><label for="piloto1">Piloto 1 *</label><input type="text" class="input-text full-width" ng-model="airplanes.piloto1" name="piloto1" id="piloto1"/></div><div class="col-md-2"><label for="piloto2">Piloto 2</label><input type="text" class="input-text full-width" ng-model="airplanes.piloto2" name="piloto2" id="piloto2"/></div><div class="col-md-2"><label for="certificado">Certificado</label><input type="text" class="input-text full-width" ng-model="airplanes.certificado" name="certificado" id="certificado"/></div><div class="col-md-2"><label for="seguro">Seguro</label><input type="text" class="input-text full-width"  ng-model="airplanes.seguro" name="seguro" id="seguro"/></div>');
          $("#campos").append('<div id="avion'+num_input+'" class="row"></div>');
          $('#del').removeAttr('disabled');
      }else{
        $('#add').attr('disabled','disabled');
      }
  });*/

/*  $('#del').on('click', function(){// Elimina un elemento por click
  //  var act=num_input-1;
    if (num_input != 1) {
      $('#avion' + num_input ).remove();
         num_input--;
         $('#add').removeAttr('disabled');
     }else if (num_input == 1) {
      $("#avion1").empty();
      $('#del').attr('disabled','disabled');
      }
});*/
/*
function createObjectCompany (data) {
  //fields struc Company
  var fields =  ["nombre", 'correo', 'direccion','cargo','website','tipo1','estado_id','representante','ciudad','pais_id','codigop','telefono','telefono_admin','certificacion','banco','aba','cuenta','direccion_cuenta','categoria','servicio_disp'];
  var company = {}; //inicializate object
  company = loadObjectData(company, fields, data);
  airplane=changeProperty(company,'tipo1', 'tipo');
  company["aviones"] = []; // create list airplane
  return company;
}

function createObjectAirplane (data) {
    var fields = ['tipo', 'matricula', 'licencia1','licencia2','registro','piloto1','piloto2','certificado','seguro'];
    var airplane =  {};
    airplane = loadObjectData(airplane, fields, data);
    return airplane;
}
function cantAirplane (data) {
  var cant=0;
  for (var key in data) { //  loop find field company
    if (data.indexOf("cant_air")>=0) {

    }
  }
    return airplane;
}

function changeProperty(obj, old_name, new_name){
      obj[new_name] =obj[old_name];
      delete obj[old_name];
      return obj;
}

function validatedataAirplane(obj){
 var   errors=[];
    for (var key in obj) { //  loop find field company
      if (obj.indexOf('tipo')==="") {
          errors[0] = "El campo Tipo de Avion es obligatorio.";
      }else if(obj.indexOf('Matricula')===null){
        errors[1] = "El campo Matricula es obligatorio.";
      }else if(obj.indexOf('licencia1')===null){
        errors[2] = "El campo Licencia es obligatorio.";
      }else if(obj.indexOf('piloto1')===null){
        errors[3] = "El campo Piloto 1 es obligatorio.";
      }//fin  si
  }//fin para
  return errors;
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
      success: function(data)  {
          if(data.message)  {
              var html = "<div class='alert alert-success alert-dismissable'>";
              html+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
              html+="<p>" + data.message + "</p>";
              html += "</div>";
              $(".successMessages").html(html);
              $("#form1")[0].reset();
              $("#estado_id").empty();
          }
      },
      error: function(jqXHR, textStatus, errorThrown){
          if(jqXHR){
              var errors = jqXHR.responseJSON;
              var html = "<div class='alert alert-danger alert-dismissable'>";
              html+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
              html+='  <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>';
              html+='<ul>';
              for(error in errors)  {
                  html+="<li> - " + errors[error] + "</li>";
              }
                html+='</ul>';
              html += "</div>";
              $(".errorMessages").html(html);
          }
      }
  });
});
*/
function clearMessages(){
    $(".errorMessages").html('');
    $(".successMessages").html('');
}
//eliminar
$(document).on('click', '.btn-delete',function (e) {

   e.preventDefault();//evita que se envie el formulario
   var row=$(this).parents('tr');
   var id=row.data('id');
  //alert(id);
   if (confirm("¿Esta Seguro que desea Eliminar el Registro?") == true) {
       var form =$('#form-delete');
       var url=form.attr('action').replace(':COM_ID',id);
       var data=form.serialize();

       $("#mensaje").css("display", "block");
       $('#mensaje').addClass('alert alert alert-success alert-dismissable');//cambiar la clase
       var msj='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
       $.post(url, data, function(result){
           msj+=result;
          $('#mensaje').html(msj);
           $('#example').find('.'+id).fadeOut();
           //row.fadeOut();
       }).fail(function(){
           $('#mensaje').addClass('alert alert alert-danger alert-dismissable');
            msj+="Error. El registro no fue eliminado";
            $('#mensaje').html(msj);
         //alert('La compañia no fue eliminada');
          $('#example').find('.'+id).show();
       });
   }
});
$(document).on('click', '.btn-anular',function (e) {

   e.preventDefault();//evita que se envie el formulario
   var row=$(this).parents('tr');
   var id=row.data('id');
  //alert(id);
   if (confirm("¿Esta Seguro que desea anular la factura?") == true) {
       var form =$('#form-delete');
       var url=form.attr('action').replace(':COM_ID',id);
       var data=form.serialize();
       $("#mensaje").css("display", "block");

       var msj='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
       $.post(url, data, function(result){
         $('#mensaje').addClass('alert alert alert-success alert-dismissable');//cambiar la clase
           msj+=result;
          $('#mensaje').html(msj);
           setTimeout("location.reload()",5000);
       }).fail(function(){
           $('#mensaje').addClass('alert alert alert-danger alert-dismissable');
            msj+="Error. El registro no fue anulado";
            $('#mensaje').html(msj);
         //alert('La compañia no fue eliminada');
          $('#example').find('.'+id).show();
       });
   }
});
$(document).on('click', '#histo',function (e) {
  $(".tabla").css("display", "none");
  $(".historial").css("display", "block");
});
$(document).on('click', '#volver',function (e) {
  $(".tabla").css("display", "block");
  $(".historial").css("display", "none");
});


function saveEstimates(){
    var table = $('#example1').DataTable();
    var idEstimates=$('#idEstimates').val();
    var company_id=$('#company_id').val();
    var prove_id=$('#prove_id').val();
    var estado=$('#estado').val();
    var fecha_soli=$('#fecha_soli').val();
    var resumen=$('#resumen').val();
    var metodo=$('#metodo').val();
    var telefono=$('#telefono').val();
    var celular=$('#celular').val();
    var correo=$('#correo').val();
    var proximo_seguimiento=$('#proximo_seguimiento').val();
    var fbo=$('#nbFBO').val();
    var cantidad_fuel=$('#cantidad_fuel').val();
    var localidad=$('#localidad').val();
    var avion_id=$('#avion_id').val();
    var matricula=$('#matricula').val();
    var num_habitacion=$('#num_habitacion').val();
    var tipo_hab=$('#tipo_hab').val();
    var tipo_cama=$('#tipo_cama').val();
    var tipo_estrellas=$('#tipo_estrellas').val();
    var descuento=$('#descuento').val().replace('%','');
    var subtotal=$('#subtotal').val().replace('$','');
    var totalDescuento=$('#totalDescuento').val().replace('$','');
    var total=$('#total').val().replace('$','');
    var tipoCategoria=$('#tCategoria').val();
    var gananciatotal=$('#gananciatotal').val().replace('$','');
    var token =$('#token').val();
    var Estimado = new Array();
    var tipo,ruta;
    var metodo=$('#metodo').val();
    var ID,Servicio,Descripcion,Cantidad,Precio,Subtotal,Ganancia,Total;
//se recorre la tabla fila por fila y se inserta en un objeto json y se pasa por POST con ajax al controlador
table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
      var data = this.data();
      var lista ={
      'ID':data[0],
      'Servicio':data[1],
      'Descripcion':data[2],
      'Cantidad':data[3],
      'Precio':data[4].replace('$',''),
      'Subtotal':data[5].replace('$',''),
      'Ganancia':data[6].replace('$',''),
      'Total':data[7].replace('$','')
    };
      Estimado.push(lista);
  });
  var ok =true;
  var mjs="";

    if (company_id == "") {
         mjs += "Cliente - "
         ok = false;
     }
     if (prove_id == "") {
         mjs += "Proveedor -"
         ok = false;
     }
     if (fecha_soli == "") {
         mjs += "Fecha Solicitada -"
         ok = false;
     }
     if (metodo == "Telefono" && telefono=="") {
         mjs += "Telefono -"
         ok = false;
     }
     if (metodo == "Celular" && celular=="") {
         mjs += "Celular -"
         ok = false;
     }
     if (metodo == "Correo" && correo=="") {
         mjs += "Correo -"
         ok = false;
     }
     if (proximo_seguimiento=="") {
         mjs += "Proximo Seguimiento - "
         ok = false;
     }
     if (fbo=="") {
         mjs += "FBO - "
         ok = false;
     }
     if (cantidad_fuel=="") {
         mjs += "Cantidad Aproximada - "
         ok = false;
     }
     if (localidad=="") {
         mjs += "Localidad - "
         ok = false;
     }
     if (avion_id=="") {
         mjs += "Tipo de Aeronave - "
         ok = false;
     }
     if (matricula=="") {
         mjs += "Registro de Aeronave - "
         ok = false;
     }
     if (tipoCategoria=="") {
         mjs += "Ganancia - "
         ok = false;
     }
     if (ok == false) {
      // $('#mensaje').toggleClass('alert alert-danger');
        $('#mensaje').css('display','block');
        $('#validar').html(' '+mjs+' ');
         //document.getElementById('error').innerHTML = mjs;
     }
//  $("#mensaje").css("display", "block");
    else if (ok==true) {
      if (metodo=="save") {
        tipo="POST";
        ruta="/estimates";
      }else {
        tipo="PUT";
        ruta="/estimates/update/"+idEstimates;
      }

      $.ajax({
        type: tipo,
        url:ruta,
        dataType:'json',
        headers: {'X-CSRF-TOKEN': token},
      //  data:{DatosEstimado:DatosEstimado,Estimado:Estimado,descuento:descuento,gananciatotal},
        data: { company_id:company_id,prove_id:prove_id,estado:estado,fecha_soli:fecha_soli,
          resumen:resumen,metodo:metodo,proximo_seguimiento:proximo_seguimiento,
          fbo:fbo,cantidad_fuel:cantidad_fuel,localidad:localidad,
          avion_id:avion_id,num_habitacion:num_habitacion,
          tipo_hab:tipo_hab,tipo_cama:tipo_cama,
          tipo_estrellas:tipo_estrellas,
          Estimado:Estimado,
          descuento:descuento,totalDescuento:totalDescuento,
          gananciatotal:gananciatotal,
          total:total,subtotal:subtotal,tipoCategoria:tipoCategoria},
        success: function (estimado) {
          window.location.href ="{{ route('estimates') }}";
          $('#mensaje').toggleClass('alert alert-success');
          $('#mensaje').html(estimado);
          console.log(estimado);
          //  window.location()
        //   location.href ="/estimates/index";
                //Recargar el plugin para que tenga la funcionalidad del componente$("#idMunicipio").select({ placeholder: "Selecciona un Municipio", width: "20%" });
            },
            //Mensaje de error en caso de fallo
            error: function (ex) {
              $('#mensaje').toggleClass('alert alert-danger');
              $('#mensaje').html('Ocurrio un error inesperado: '+ex);
                alert('Failed to retrieve states.' + ex);
            }
      });

    }

}

function ajaxRenderSection(id) {
  var table = $('#example').DataTable();
    table.clear();
        $.ajax({
            type: 'GET',
            url:'/clientes/'+id,
            dataType: 'json',
            success: function (data) {
              //  $('#datos').empty();
              var categoria;

                $.each(data, function(index, value){
              /* Vamos agregando a nuestra tabla las filas necesarias */
            switch (value.categoria) {
              case "0":
                categoria='PostPago';
                break;
              case "1":
                categoria='Prepago';
                break;
              case "2":
                categoria='De 1 a 15 días de crédito';
                break;
              case "3":
                categoria='De 16 a 30 días de crédito'
                break;
            }
              table.row.add( [
                  value.id,
                  value.nombre,
                  value.pais,
                  value.celular,
                  value.telefono,
                  value.correo,
                  value.tipo,
                  categoria
              ] ).draw( false );
          });
            },
            error: function (data) {
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }
    //doble click tabla de cliente y proveedores para cargar en los intut del formulario
    $('#example > tbody').on('dblclick', '>tr', function () {
       var tab=$('#example').DataTable();
       var datos = tab.row( this ).data();
       var categoria=datos[7];
       var tCategoria;
       var porcentaje;
          if (datos[6]=='client') {
            //trae el el listado de aviones de ese cliente mas su matricula
            $.get('/listAvion/'+datos[0], function(data){
                console.log(data);
                $('#avion_id').empty();
                 $.each(data,function(index,value){
                   $('#avion_id').append('<option value="'+value.id+'">'+value.tipo+'</option>');
                });
                $('#matricula').val(data[0].matricula);
               });
            //fin listado aviones clientes
              $('#nombreC').val(datos[1]);
              $('#company_id').val(datos[0]);
              $('#telefono').val(datos[4]);
              $('#celular').val(datos[3]);
              $('#correo').val(datos[5]);

              switch (categoria) {
                case "PostPago":
                    porcentaje="0%";
                    tCategoria=0;
                    break;
                case "Prepago":
                    porcentaje="20%";
                    tCategoria=1;
                    break;
                case "De 1 a 15 días de crédito":
                    porcentaje="25%";
                    tCategoria=2;
                    break;
                case "De 16 a 30 días de crédito":
                    porcentaje="30%";
                    tCategoria=3;
                    break;
              }
              $('#ganancia').val(porcentaje);
              $('#tCategoria').val(tCategoria);
              if (telefono!="") {
                $('select#metodo').val('Telefono')
                metodoSeguimiento();
              }else if(celular!=""){
                $('select#metodo').val('Celular');
                metodoSeguimiento();
              }
              else if(correo!="") {
                  $('select#metodo').val('Correo');
                  metodoSeguimiento();
              }
              else{
                $('select#metodo').val('Telefono')
                metodoSeguimiento();
              }
          }else{
              $('#nombreP').val(datos[1]);
              $('#prove_id').val(datos[0]);
          }

              $('#clientes').modal('toggle');

    });
        // $("td").click(function(event) {
        //    var row = $(this).attr("data-row");
        //    var col = $(this).attr("data-col");
        // alert(row+col);
        //  };
        //FIN DOBLE CLICK
//tabla estimados
function addRows(){
  var estimates=[];
  var table = $('#example1').DataTable();
  var Servicio = $("#servicios").find('option:selected').text();
  var idServicio = $("#servicios").val();
  var Descripcion=$("#descripcion").val();
  var Cantidad= $("#cantidad").val();
  var Precio= $("#precio").val().replace('$','');
  var porcentaje=$('#ganancia').val().replace('%','')/100;
  var Subtotal=Cantidad * Precio;
  var Ganancia=Subtotal*porcentaje;
  var Total=Subtotal+Ganancia;
  var ok =true;
  var mjs="";

    if (Servicio == "Seleccione Servicio") {
         mjs += "Servicios - "
         ok = false;
     }
     if (Descripcion == "") {
         mjs += "Descripcion -"
         ok = false;
     }
     if (Precio == "") {
         mjs += "Precio -"
         ok = false;
     }
     if (Cantidad == "") {
         mjs += "Cantidad"
         ok = false;
     }
     if (ok == false) {
      // $('#mensaje').toggleClass('alert alert-danger');
        $('#mensaje').css('display','block');
        $('#validar').html(mjs);
         //document.getElementById('error').innerHTML = mjs;
     }
     else if (ok==true) {

       table.row.add( [
           idServicio,
           Servicio,
           Descripcion,
           Cantidad,
           '$'+Precio,
           '$'+Subtotal,
           '$'+Ganancia,
           '$'+Total,
           '<a class="btn-edit glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="#"></a>'+' '+
           '<a class="btn-delete" title="Eliminar" aria-hidden="true" href="#"><span class="glyphicon glyphicon-trash"></span></a>'

       ] ).draw( false );


          $("#servicios").val(0);
          $("#descripcion").val('');
          $("#cantidad").val('');
          $("#precio").val('');
          $('#subtotal').val($('#subto').val());
          $('#total').val($('#sumTotal').val());
          $('#gananciatotal').val($('#gtotal').val());

    }


}

$('#descuento').keyup(function(e) {
               var num = $(this).val();
               if (e.which!=8) {
                   num = sortNumber(num);
                  if(isNaN(num)||num<0 ||num>100) {
                      alert("Solo se pueden ingresar numeros de 0 a 100");
                      $(this).val(sortNumber(num.substr(0,num.length-1)) + "%");
                  }
               else
                   $(this).val(sortNumber(num)+"%");
               }
               else {
                   if(num < 2)
                       $(this).val("");
                   else
                       $(this).val(sortNumber(num.substr(0,num.length-1)) + "%");
               }
                 descuento();
           });
           function sortNumber(n){
               var newNumber="";
               for(var i = 0; i<n.length; i++)
                   if(n[i] != "%")
                       newNumber += n[i];
               return newNumber;

}
function descuento(){
var descuento =$('#descuento').val().replace("%"," ")/100;
var subtotal=$('#subtotal').val().replace("$"," ");

//alert(descuento);

var totalDescuento=subtotal*descuento;

$('#totalDescuento').val('$'+totalDescuento);
$('#total').val('$'+(subtotal-totalDescuento));
}

function metodoSeguimiento(){
    //$('#metodo').on('change',function(e){
        //  console.log(e);
          var tipo=$('#metodo').find('option:selected').text();
           //alert(tipo);
            if(  tipo=="Telefono"){
               $(".celular").css("display", "none");
               $(".telefono").css("display", "block");
               $(".correo").css("display", "none");
            }else if(tipo=="Celular"){
                $(".celular").css("display", "block");
                $(".telefono").css("display", "none");
                $(".correo").css("display", "none");
            }else{
              $(".correo").css("display", "block");
              $(".celular").css("display", "none");
              $(".telefono").css("display", "none");
            }//fin si
}
$('#m4').removeClass('');
$('#m4').addClass('active');

$('#avion_id').on('change',function(e){
    //alert($('#pais_id').val());
    console.log(e);
    var id=e.target.value;
    $.get('/changeAvion/'+id, function(data){
        console.log(data);
        $('#matricula').empty();
         $.each(data,function(index,avion){
           $('#matricula').val(avion.matricula);
        });
       });
});
$('#servicios').on('change',function(e){
    //alert($('#pais_id').val());
    console.log(e);
    var id=e.target.value;
    $.get('/services/'+id, function(data){
        console.log(data);
        $('#descripcion').empty();
         $.each(data,function(index,servicio){
           $('#descripcion').val(servicio.descripcion);
        });
       });
});
//sumatoria y total de la tabla de estimados.
$('#example1').DataTable( {

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                gananciaTotal = api
                    .column( 6 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 7 ).footer() ).html(
                '<input hidden type="text" id="subto" value="'+'$'+pageTotal+'"/>'+'<input hidden type="text" id="sumTotal" value="'+'$'+ total+'"/>'+
                '<input hidden type="text" id="gtotal" value="'+'$'+gananciaTotal+'"/>'


            );
        }

    } );
function modal(a){
  if (a==1) {
      $('#titulo').html('Listado de Clientes');
      $('.correo').css('display','none');
      $('.cliente').css('display','block');
  }
  else if (a==0) {
    $('#titulo').html('Listado de Proveedores');
    $('.correo').css('display','none');
    $('.cliente').css('display','block');
  }
  else {
    $('#titulo').html('Correo');
    $('.cliente').css('display','none');
    $('.correo').css('display','block');
  }

}

function enviarCorreo(){
  var email=$('#email').val();
  var subject=$('#subject').val();
  var body=$('#body').val();
  var token =$('#token').val();
  $.ajax({
    type:'POST',
    url:'/mail/store',
    dataType:'json',
    headers: {'X-CSRF-TOKEN': token},
    data:{email:email,subject:subject,body:body},
    success:function(mensaje){
      alert(mensaje);
    },
    erro:function(ex){
      alert('Failed to retrieve states.' + ex);
    }
  });

}
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

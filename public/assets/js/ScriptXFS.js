function ajaxRenderSection(id) {
        $.ajax({
            type: 'GET',
            url:'/clientes/'+id,
            dataType: 'json',
            success: function (data) {
              //  $('#datos').empty();
              var categoria;
              var table = $('#example').DataTable();
                table.clear();
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
                  value.tipo,
                  value.celular,
                  value.telefono,
                  categoria
              ] ).draw( false );

              //$('#avion_id').append('<option value="">Seleccione el Estado</option>');
              //$('#avion_id').append('<option value="'+value.avionID+'">'+value.tipoAvion+'</option>');


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

function addRows(){
var table = $('#example1').DataTable();
var Servicio = $("#servicios").find('option:selected').text();
var Descripcion=$("#descripcion").val();
var Cantidad= $("#cantidad").val();
var Precio= $("#precio").val();
var porcentaje=$('#ganancia').val().replace('%','')/100;
var Subtotal=Cantidad * Precio;
var Ganancia=Subtotal*porcentaje;
var Total=Subtotal+Ganancia;
         table.row.add( [
             Servicio,
             Descripcion,
             Cantidad,
             '$'+Precio,
             '$'+Subtotal,
             '$'+Ganancia,
             '$'+Total
         ] ).draw( false );
$('#subtotal').val($('#subto').val());
$('#total').val($('#sumTotal').val());
         //counter++;

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
//doble click tabla de cliente y proveedores para cargar en los intut del formulario
$('#example > tbody').on('dblclick', '>tr', function () {

  $(this).children("td").each(function (i) {

    				switch (i) {
    						case 0:
    								ID = $(this).text();
    								break;
    						case 1: Nombre = $(this).text();
    								break;
    						case 2: Pais = $(this).text();
    								break;
    						case 3: tipoC = $(this).text();
    								break;
    						case 4: celular = $(this).text();
    										break;
    						case 5: telefono= $(this).text();
    												break;
                case 6: categoria= $(this).text();
                												break;
    				}
   });
var porcentaje;
      if (tipoC=='client') {

        $.get('/listAvion/'+ID, function(data){
            console.log(data);
            $('#avion_id').empty();
             $.each(data,function(index,value){
               $('#avion_id').append('<option value="'+value.id+'">'+value.tipo+'</option>');
            });
            $('#matricula').val(data[0].matricula);
           });
          $('#nombreC').val(Nombre);
          $('#company_id').val(ID);
          $('#telefono').val(telefono);
          $('#celular').val(celular);

          switch (categoria) {
            case "PostPago":
                porcentaje="0%";
                break;
            case "Prepago":
                porcentaje="20%";
                break;
            case "De 1 a 15 días de crédito":
                porcentaje="25%";
                break;
            case "De 16 a 30 días de crédito":
                porcentaje="30%";
                break;
          }
          $('#ganancia').val(porcentaje);

          if (telefono!="" && celular=="") {
            $('select#metodo').val('Telefono')
            metodoSeguimiento();
          }else if(celular!="" && telefono==""){
            $('select#metodo').val('Celular');
            metodoSeguimiento();
          }
          else{
            $('select#metodo').val('Telefono')
            metodoSeguimiento();
          }
      }else{
          $('#nombreP').val(Nombre);
          $('#prove_id').val(ID);
      }

          $('#clientes').modal('toggle');
});
    // $("td").click(function(event) {
    //    var row = $(this).attr("data-row");
    //    var col = $(this).attr("data-col");
    // alert(row+col);
    //  };
    //FIN DOBLE CLICK
function metodoSeguimiento(){
    //$('#metodo').on('change',function(e){
        //  console.log(e);
          var tipo=$('#metodo').find('option:selected').text();
           //alert(tipo);
            if(  tipo=="Telefono"){
               $(".celular").css("display", "none");
               $(".telefono").css("display", "block");
            }else if(tipo=="Celular"){
                $(".celular").css("display", "block");
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
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 6 ).footer() ).html(
                '<input hidden type="text" id="subto" value="'+'$'+pageTotal+'"/>'+'<input hidden type="text" id="sumTotal" value="'+'$'+ total+'"/>'

            );
        }

    } );


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

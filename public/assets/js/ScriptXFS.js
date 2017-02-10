function ajaxRenderSection(id) {
        $.ajax({
            type: 'GET',
            url:'/clientes/'+id,
            dataType: 'json',
            success: function (data) {
                $('#datos').empty();
                $.each(data, function(index, value){
              /* Vamos agregando a nuestra tabla las filas necesarias */
              $("#datos").append("<tr><td>" +
              value.id + "</td><td>" +
              value.nombre + "</td><td>" +
              value.pais + "</td><td>" +
              value.tipo + "</td><td hidden>" +
              value.celular + "</td><td hidden>" +
              value.telefono + "</td></tr>");
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
    //DOBLE CLICK PARA LA TABLA Y QUE SE CARGUEN EN LOS INPUTS
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
    				}
   });

      if (tipoC=='client') {
          $('#nombreC').val(Nombre);
          $('#telefono').val(telefono);
          $('#celular').val(celular);
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

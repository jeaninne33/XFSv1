function irarriba(){
$('html, body').animate({scrollTop:0}, 300);
}

function cargarformulario(arg){
//funcion que carga todos los formularios del sistema

		if(arg==1){ var url = "form_nuevo_usuario"; }
    if(arg==2){ var url = "form_cargar_datos_usuarios";  }
    if(arg==3){ var url = "form_enviar_correo";  }

		$("#contenido_principal").html($("#cargador_empresa").html());
		$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })


}



function cargarlistado(listado){

    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios"; }
if(listado==2){ var url = "listado_publicaciones/0"; }

$("#contenido_principal").html($("#cargador_empresa").html());
$.get(url,function(resul){

        $("#contenido_principal").html(resul);
})

}




 $(document).on("submit",".form_entrada",function(e){

//funcion para atrapar los formularios y enviar los datos

       e.preventDefault();

        $('html, body').animate({scrollTop: '0px'}, 200);

        var formu=$(this);
        var quien=$(this).attr("id");
        var rs=false; //leccion 10
        var seccion_sel=  $("#seccion_seleccionada").val();


        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu";  rs=true;}
        if(quien=="f_editar_usuario"){ var varurl="editar_usuario"; var divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp";  }
        if(quien=="f_agregar_educacion"){ var varurl="agregar_educacion_usuario"; var divresul="notificacion_resul_faedu";  rs=true; }  //leccion 10


        $("#"+divresul+"").html($("#cargador_empresa").html());

              $.ajax({

                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){
                        $("#"+divresul+"").html(resul);
                        if(rs ){
                         $('#'+quien+'').trigger("reset");
                         mostrarseccion(seccion_sel);
                        }
                    }

                });
irarriba();

})


$(document).on("click",".pagination li a",function(e){
//para que la pagina se cargen los elementos
 e.preventDefault();
 var url =$( this).attr("href");
 $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);
 })

})


  //leccion 7
function mostrarficha(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#usuario_seleccionado").val(id_usuario); // leccion10
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
  var url = "form_editar_usuario/"+id_usuario+"";
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());  //leccion 10
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);  //leccion 10
  })
irarriba();
}


$(document).on("click",".div_modal",function(e){
 //funcion para ocultar las capas modales
 $("#capa_modal").hide();
 $("#capa_para_edicion").hide();
 $("#contenido_capa_edicion").html("");  //leccion 10

})


  //leccion 8 y 9
$('#send').on("click",function(e){


        e.preventDefault();
        var formu=$(this);
        var email=$('#destinatario').val();
        var subject=$('#asunto').val();
        var body=$('#contenido_mail').val();
        var rs=false; //leccion 10
        var datos = new FormData();
        datos.append('email',email);
        datos.append('subject',subject);
        datos.append('body',body);
        datos.append('file', $('#file')[0].files[0] );
          var token =$('#token').val();
        //var seccion_sel=  $("#seccion_seleccionada").val();
      //  if(nombreform=="f_enviar_correo" ){ var miurl="/send/";  ;   }

        //información del formulario
        var divresul="contenido_principal"
        var formData = new FormData($("#f_enviar_correo")[0]);

        //hacemos la petición ajax
        $.ajax({
            url: '/send/',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            dataType:'json',
            // Form data
            //datos del formulario
          //  data: {email:email,subject:subject,body:body,file:file},
            data:datos,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
            //  $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );
          //  $('#mensaje').css('display','block');
            $('#validar').html('Correo Enviado Correctamente');               
            //$('#f_enviar_correo')[0].reset();
            document.getElementById("f_enviar_correo").reset();
            },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;

            }
        });

irarriba();

});

//leccion  10

function mostrarseccion(arg){
  var id_usuario=$("#usuario_seleccionado").val();
  $("#seccion_seleccionada").val(arg);
  if(arg==1){ var url = "form_editar_usuario/"+id_usuario+""; }
  if(arg==2){ var url = "form_educacion_usuario/"+id_usuario+""; }
  if(arg==3){ var url = "form_publicaciones_usuario/"+id_usuario+""; } //leccion 11
  if(arg==4){ var url = "form_proyectos_usuario/"+id_usuario+""; } //leccion 11

  $("#contenido_capa_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
  $("#contenido_capa_edicion").html(resul);
  })

}


function borrareducacion(arg){
  var url="borrar_educacion/"+arg+"" ;
  var divresul="notificacion_resul_edu";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    mostrarseccion(2);
  })

}


function mostrardiv_publicaciones(arg){
  $("#info_libro").hide();
  $("#info_revista").hide();
  if(arg==5){ $("#info_libro").show(); $("#info_revista").hide();  }
  if(arg==4){ $("#info_libro").hide(); $("#info_revista").show();  }

}

function borrarpublicacion(arg){
  var url="borrar_publicacion/"+arg+"" ;
  var divresul="notificacion_resul_fapu";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    mostrarseccion(3);

  })


}


function borrarproyecto(arg){
  var url="borrar_proyecto/"+arg+"" ;
  var divresul="notificacion_resul_faprd";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    mostrarseccion(4);
  })

}


function buscarusuario(){

  var pais=$("#select_filtro_pais").val();
  var dato=$("#dato_buscado").val();
      if(dato == "")
    {
      var url="buscar_usuarios/"+pais+"";
    }
    else
    {
      var url="buscar_usuarios/"+pais+"/"+dato+"";
    }

  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);
  })

}

//leccion 13

$(document).on("change",".email_archivo",function(e){

    var miurl="/adjuntar/";
   // var fileup=$("#file").val();
    var divresul="texto_notificacion";
    var token =$('#token').val();
    var data = new FormData();
    data.append('file', $('#file')[0].files[0] );



    console.log(data);


  // $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('#_token').val()
  //       }
  //   });


     $.ajax({
            url: miurl,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            // Form data
            //datos del formulario
            data: data,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());
            },
            //una vez finalizado correctamente
            success: function(data){
              var codigo='<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>'+ data +'</a><span class="mailbox-attachment-size"> </span></div>';
              $("#"+divresul+"").html(codigo);

            },
            //si ha ocurrido un error
            error: function(data){
               $("#"+divresul+"").html(data);

            }
        });



})

$(document).on("change",".imagen_archivo",function(e){

    var miurl="/adjuntar-img/";
   // var fileup=$("#file").val();
    var divresul="texto_notificacion1";
    var token =$('#token').val();
    var data = new FormData();
    data.append('file', $('#fileIMG')[0].files[0] );



    console.log(data);


  // $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('#_token').val()
  //       }
  //   });


     $.ajax({
            url: miurl,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            // Form data
            //datos del formulario
            data: data,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());
            },
            //una vez finalizado correctamente
            success: function(data){
              var codigo='<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>'+ data.nombre +'</a><span class="mailbox-attachment-size"> </span></div>';
              var image='<img src="'+data.imagen+'" alt="'+data.nombre+'"/>';
              $("#"+divresul+"").html(codigo);
              $('#mostrarIMG').html(image);

            },
            //si ha ocurrido un error
            error: function(data){
               $("#"+divresul+"").html(data);

            }
        });



})

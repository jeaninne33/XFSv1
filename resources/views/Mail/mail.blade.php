<div id="mensaje" style="display:none" class="alert alert-success alert-dismissable fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </strong><label id='validar'></label>
</div>
<div class="row">
     <div class="col-md-12">
     <form  id="f_enviar_correo" name="f_enviar_correo"  action="enviar_correo"  class="formarchivo" enctype="multipart/form-data" >

    

           <div class="box box-primary">
             <div class="box-header with-border">
               {{-- <h3 class="box-title">Crear Nuevo Correo</h3> --}}
             </div><!-- /.box-header -->
             <div class="box-body">

               <div class="form-group">
                 <input class="form-control" placeholder="Para:" id="destinatario" name="destinatario">
               </div>
               <div class="form-group">
                 <input class="form-control" placeholder="Asunto:" id="asunto" name="asunto">
               </div>
               <div class="form-group">
                 <textarea id="contenido_mail" name="contenido_mail" class="form-control" style="height: 200px" placeholder="escriba aquí...">

                 </textarea>
               </div>
               <div class="form-group">
                 <div class="btn btn-default btn-file">
                   <i class="fa fa-paperclip"></i> Adjuntar Archivo
                   <input type="file"  id="file" name="file" class="email_archivo" >
                 </div>
                 <p class="help-block"  >Max. 20MB</p>
                 <div id="texto_notificacion">

                 </div>
               </div>



             </div><!-- /.box-body -->
             <div class="box-footer">
               <div class="pull-right">

                 <button type="button" id="send" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ENVIAR</button>
               </div>
            <br/>
             </div><!-- /.box-footer -->
           </div><!-- /. box -->

       </form>
     </div><!-- /.col -->
   </div><!-- /.row -->
   <!-- contenido principal -->
     <section class="content"  id="contenido_principal">

     </section>

   <!-- cargador empresa -->
     <div style="display: none;" id="cargador_empresa" align="center">
         <br>
      <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

      <img src="{{asset("assets/images/icon/cargando.gif")}}" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

       <br>
      <hr style="color:#003" width="50%">
      <br>
    </div>

{{--
   <div class="row form-group">
       <div class="col col-md-6 col-md-offset-3"   >

               [[ Form::open(['route' => 'mail.store', 'method' => 'POST']) ]]
                 <div class="col-sms-6 col-sm-7 col-md-10">
                     [[Form::label('email', 'E-Mail')]]
                     [[Form::email('email', null, ['id'=>'mail','class' => 'input-text full-width' ]) ]]
                 </div>
                <div class="col-sms-6 col-sm-7 col-md-10">
                     [[Form::label('subject', 'Asunto')]]
                     [[Form::text('subject', null, ['id'=>'subject','class' => 'input-text full-width' ])]]
                 </div>
                 <div class="col-sms-6 col-sm-7 col-md-10">
                     [[Form::label('body', 'Mensaje')]]
                     [[Form::textarea('body', null, ['id'=>'body','class' => 'input-text full-width' ])]]
                 </div>
                 <div class="col-sms-6 col-sm-5 col-md-6">
                     [[Form::button('Enviar', ['class' => 'btn btn-primary ','onclick'=>'enviarCorreo()' ] )]]
                 </div>
               [[Form::close()]]

        </div>
   </div> --}}

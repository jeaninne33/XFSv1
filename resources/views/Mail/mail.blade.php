

<div class="row">
       <div id="mensaje" style="display:none" class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </strong><label id='validar'></label>
        </div>
     <div class="col-md-12">
     <form  id="f_enviar_correo" name="f_enviar_correo"  action="enviar_correo"  class="formarchivo" enctype="multipart/form-data" >
           <div class="box box-primary">
             <div class="box-header with-border">
               {{-- <h3 class="box-title">Crear Nuevo Correo</h3>ng-model="mail.asunto" --}}
             </div><!-- /.box-header -->
             <div class="box-body">

               <div class="form-group">
                 Para:
                 <input class="form-control" placeholder="Para:" id="destinatario" name="destinatario" ng-model="mail.to">
               </div>
               <div class="form-group">
                 Asunto:
                 <input class="form-control" placeholder="Asunto" id="asunto" name="asunto" ng-model="mail.asunto">
               </div>
               <div class="form-group">
                 <textarea id="contenido_mail"  name="contenido_mail" ng-model="mail.contenido" class="form-control" style="height: 200px" placeholder="escriba aquí..."></textarea>
               </div>
               <div class="form-group">
                 <div class="btn btn-default btn-file">
                   <i class="fa fa-paperclip"></i> Archivo Adjunto
                     <a class="" target="_blank" href="{{$url}}"> {{$nombre}}</a>
                   {{-- <input type="file"  id="file" name="file" class="email_archivo" > --}}
                 </div>

               </div>
             </div><!-- /.box-body -->
             <div class="box-footer">
               <div class="pull-right">
                 <button type="button" id="send" class="btn btn-primary" ng-click='send($event)'><i class="fa fa-envelope-o"></i> ENVIAR</button>
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

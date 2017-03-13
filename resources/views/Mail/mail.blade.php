
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
   </div>

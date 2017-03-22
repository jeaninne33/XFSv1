<style media="screen">
  .Fuerte   { background-color: #060; border-color: #0F0; font-size: 12;}
  .Media   { background-color: #C60; border-color: #FC0; font-size: 12;}
  .Debil     { background-color: #900; border-color: #F00; font-size: 12;}
  .strength { padding: 1px 10px; border: 2px solid; color: #FFF; font-size: 12;}
</style>
<h3>Datos del Usuario</h3>
<div class="row form-group">
    <div class="col-sms-8 col-sm-8" >
       [[ Form::label('nombre', 'Nombre del Usuario *')]]<!--  -->
       [[Form::text('name', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.name'  ])]]

    </div>

</div>
<div class="row form-group">
    <div class="col-sms-8 col-sm-8" >
       [[ Form::label('nombre', 'Email *')]]<!--  -->
       [[Form::email('email', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.email'  ])]]

    </div>


</div>

<div class="row form-group">
  <div class="col-sms-8 col-sm-8">
    [[Form::label( 'Tipo de Usuario *') ]]
    [[ Form::select('type', array('' => 'Seleccione','admin'=>'Administrador','contador'=>'Contador', 'despacho'=>'Despacho'), null, ['id' => 'type','class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.type'  ]) ]]
  </div>
</div>
<div class="row form-group">
    <div class="col-sms-8 col-sm-8" >
       [[ Form::label('Contraseña *')]]
       [[Form::password('password', ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.password', ' ng-change'=>'pass()' ])]]

    </div>
    <div class="col-sms-4 col-sm-4" >
    </br></br>
      <span class="strength" ng:class="strength"  ng-show="strength">  La Fortaleza de la Contraseña es @{{ strength }} !</span>
    </div>
</div>

<div class="row form-group">
    <div class="col-sms-8 col-sm-8" >
       [[ Form::label('Confirmar Contraseña *')]]<!--  -->
       [[Form::password('password_confirmation', ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.password_confirmation'  ])]]

    </div>

</div>

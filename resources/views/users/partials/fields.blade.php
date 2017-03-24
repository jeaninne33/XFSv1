<style media="screen">
  .Fuerte   { background-color: #060; border-color: #0F0; font: 13px arial, sans-serif;}
  .Media   { background-color: #C60; border-color: #FC0; font: 13px arial, sans-serif;}
  .Debil     { background-color: #900; border-color: #F00; font: 13px arial, sans-serif;}
  .strength { padding: 1px 10px; border: 2px solid; color: #FFF; font: 13px arial, sans-serif;}
</style>
<h3>Datos del Usuario</h3>
<div class="row form-group">
    <div class="col-sms-4 col-sm-4" >
       [[ Form::label('nombre', 'Nombre del Usuario *')]]<!--  -->
       [[Form::text('name', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.name'  ])]]

    </div>
    <div class="col-sms-4 col-sm-4" >
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
       [[ Form::label('Nueva Contraseña ')]]
       <input ng-attr-type="@{{ showPassword ? 'text' : 'password' }}" id="password" class='input-text full-width' ng-model='user.password' ng-change='pass()'>
    </div>
    <div class="col-sms-4 col-sm-4" >
    </br></br>
      <span class="strength" ng:class="strength"  ng-show="strength">  La Fortaleza de la Contraseña es @{{ strength }} !</span>
    </div>
</div>

<div class="row form-group">
    <div class="col-sms-8 col-sm-8" >
       [[ Form::label('Confirmar Nueva Contraseña ')]]<!--  -->
       <input ng-attr-type="@{{ showPassword ? 'text' : 'password' }}" id="password_confirmation" class='input-text full-width' ng-model='user.password_confirmation'>

    </div>

</div>

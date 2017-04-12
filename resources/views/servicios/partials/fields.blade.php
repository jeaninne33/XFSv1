<div class="row form-group">
  <div class="col-sms-6 col-sm-6">
    [[ Form::label('nombre', 'Nombre ')]]
    [[Form::text('nombre', null, ['ng-model'=>'service.nombre','class' => 'input-text full-width' , 'required' => 'required'])]]
  </div>

  <div class="col-sms-6 col-sm-6">
      [[Form::label('descripcion', 'Descripción') ]]
      [[ Form::text('descripcion', null, ['ng-model'=>'service.descripcion','class' => 'input-text full-width' , 'required' => 'required']) ]]
  </div>
</div>
<div class="row form-group">
  <div class="col-sms-6 col-sm-6">
      [[Form::label('descripcion', 'Precio $') ]]
      [[ Form::text('precio', null, ['ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','step'=>"0.01",'id'=>'precio','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00', 'ng-model'=>'service.precio']) ]]
  </div>

  <div class="col-sms-6 col-sm-6">
    [[ Form::label('categoria_id', 'Categoria ')]]
    [[ Form::select('categoria_id',array(), null, array('ng-model'=>'service.categoria_id','ng-options'=>"category.id as category.nombre for category in categorys",'class' => 'input-text full-width','required', 'placeholder'=>'Seleccione')) ]]

  </div>
</div>

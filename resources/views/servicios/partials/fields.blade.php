<div class="row form-group">
  <div class="col-sms-6 col-sm-6">
    [[ Form::label('nombre', 'Nombre')]]
    [[Form::text('nombre', null, ['class' => 'input-text full-width' , 'required' => 'required'])]]
  </div>

  <div class="col-sms-6 col-sm-6">
      [[Form::label('descripcion', 'Descripción') ]]
      [[ Form::text('descripcion', null, ['class' => 'input-text full-width' , 'required' => 'required']) ]]
  </div>
</div>
<div class="row form-group">
  <div class="col-sms-6 col-sm-6">
    [[ Form::label('categoria_id', 'Categoria')]]
    [[ Form::select('categoria_id', $categorias, null, array('class' => 'input-text full-width','required')) ]]

  </div>
</div>

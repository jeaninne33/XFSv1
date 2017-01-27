<div class="form-group">
  [[ Form::label('nombre', 'Nombre')]]
  [[Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required'])]]
</div>

<div class="form-group">
    [[Form::label('descripcion', 'Descripción') ]]
    [[ Form::email('correo', null, ['class' => 'form-control' , 'required' => 'required']) ]]
</div>

<div class="form-group">
  [[ Form::label('categoria_id', 'Categoria')]]
  [[ Form::select('categorias', $categorias, null, array('class' => 'form-control')) ]]

</div>

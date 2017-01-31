<div class="form-group">
  [[ Form::label('nombre', 'Nombre')]]
  [[Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required'])]]
</div>

<div class="form-group">
    [[Form::label('descripcion', 'Descripción') ]]
    [[ Form::text('descripcion', null, ['class' => 'form-control' , 'required' => 'required']) ]]
</div>

<div class="form-group">
  [[ Form::label('categoria_id', 'Categoria')]]
  [[ Form::select('categoria_id', $categorias, null, array('class' => 'form-control')) ]]

</div>

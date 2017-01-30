
<div class="form-group">
  [[ Form::label('nombre', 'Nombre')]]
  [[Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required'])]]
</div>

<div class="form-group">
    [[Form::label('correo', 'Correo') ]]
    [[ Form::email('correo', null, ['class' => 'form-control' , 'required' => 'required']) ]]
</div>
<div class="form-group">
    [[Form::label('direccion', 'Dirección') ]]
    [[ Form::text('direccion', null, ['class' => 'form-control' , 'required' => 'required']) ]]
</div>
<div class="form-group">
    [[Form::label('website', 'Sitio Web') ]]
    [[ Form::text('website', null, ['class' => 'form-control' ]) ]]
</div>
<div class="form-group">
    [[Form::label('representante', 'Representante Legal') ]]
    [[ Form::text('representante', null, ['class' => 'form-control' , 'required' => 'required']) ]]
</div>
<div class="form-group">
  [[ Form::label('ciudad', 'Ciudad')]]
    [[ Form::text('ciudad', null, ['class' => 'form-control' , 'required' => 'required']) ]]
    <!--[[ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) ]]
-->
</div>
<div class="form-group">
    [[Form::label('pais', 'Pais') ]]
    [[ Form::text('pais', null, ['class' => 'form-control' , 'required' => 'required']) ]]
</div>
<div class="form-group">
    [[Form::label('codigop', 'Codigo Postal') ]]
    [[ Form::text('codigop', null, ['class' => 'form-control']) ]]
</div>
<div class="form-group">
    [[Form::label('telefono', 'Teléfono') ]]
    [[ Form::text('telefono', null, ['placeholder' => '0416 999 999','class' => 'form-control' , 'required' => 'required']) ]]
</div>
<div class="form-group">
  [[ Form::label('relacion', 'Tipo de Relacion')]]
  [[ Form::select('relacion', config('options.relacion'), null, array('class' => 'form-control')) ]]

</div>
<div class="form-group">
  [[ Form::label('pais', 'Pais')]]
  [[ Form::select('pais', $paises, null, array('class' => 'form-control')) ]]
</div>
<div class="form-group">
  [[ Form::label('estado', 'Estado')]]
  [[ Form::select('estado', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Seleccione el Estado']) ]]
</div>

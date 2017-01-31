<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Datos de la Compañia</a></li>
  <li><a data-toggle="tab" href="#menu1">Datos Administrativos</a></li>
  <li><a data-toggle="tab" href="#menu2">Datos de Operaciones</a></li>
  <li><a data-toggle="tab" href="#menu3">Aviones</a></li>
  <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Datos Generales</h3>
  <br/>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
           [[ Form::label('nombre', 'Nombre de la Compañia *')]]
           [[Form::text('nombre', null, ['class' => 'input-text full-width' , 'required' => 'required'])]]

        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('website', 'Sitio Web') ]]
          [[ Form::text('website', null, ['class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('direccion', 'Dirección Fisica *') ]]
          [[ Form::text('direccion', null, ['class' => 'input-text full-width' , 'required' => 'required']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('direccion_cuenta', 'Direccion de factura *') ]]
          [[ Form::email('direccion_cuenta', null, ['class' => 'input-text full-width' , 'required' => 'required']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('representante', 'Representante *') ]]
          [[ Form::text('representante', null, ['class' => 'input-text full-width' , 'required' => 'required']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('certificacion', 'Especifique si tiene Certificación y Cuales') ]]
          [[ Form::email('certificacion', null, ['class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('pais', 'Pais *') ]]
          [[ Form::select('pais', $paises, null,['class' => 'selector full-width' , 'required' => 'required']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('estado', 'Estado *') ]]
          [[ Form::select('estado', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'selector full-width','placeholder' => 'Seleccione el Estado', 'required' => 'required']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('codigop', 'Codigo Postal') ]]
          [[ Form::text('codigop', null, ['class' => 'input-text full-width']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('ciudad', 'Ciudad *') ]]
          [[ Form::text('codigop', null, ['class' => 'input-text full-width', 'required' => 'required']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('relacion', 'Tipo de Relacion')]]
          [[ Form::select('relacion', config('options.relacion'), null, array('class' => 'form-control')) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('ciudad', 'Ciudad *') ]]
          [[ Form::text('codigop', null, ['class' => 'input-text full-width', 'required' => 'required']) ]]
        </div>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
  <div id="menu3" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
  <div id="menu4" class="tab-pane fade" style="display:none">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>

        <div class="row form-group">
            <div class="col-sms-6 col-sm-6">
                <label>Select Category</label>
                <div class="selector full-width">
                    <select>
                        <option value="">Adventure, Romance, Beach</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Type Your Story</label>
            <textarea rows="6" class="input-text full-width" placeholder="please tell us about you"></textarea>
        </div>
        <hr>
        <div class="form-group">
            <h4>Do you have photos to share? <small>(Optional)</small> </h4>
            <div class="fileinput col-sm-6 no-float no-padding">
                <input type="file" class="input-text" data-placeholder="select image/s" />
            </div>
        </div>
        <div class="form-group">
            <h4>Share with friends <small>(Optional)</small></h4>
            <p>Share your review with your friends on different social media networks.</p>
            <ul class="social-icons icon-circle clearfix">
                <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-pinterest"></i></a></li>
            </ul>
        </div>
        <br>
        <div class="form-group col-sm-5 col-md-4 no-float no-padding no-margin">
            <button type="submit" class="btn-medium full-width">SUBMIT REVIEW</button>
        </div>




<div class="form-group">
  [[Form::label('correo', 'Correo *') ]]
  [[ Form::email('correo', null, ['class' => 'input-text full-width' , 'required' => 'required']) ]]

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
  [[ Form::label('estado', 'Estado')]]
  [[ Form::select('estado', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Seleccione el Estado']) ]]
</div>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Datos de la Compañia</a></li>
  <li><a data-toggle="tab" href="#menu1">Datos de Operaciones</a></li>
  <li><a data-toggle="tab" href="#menu2">Datos Administrativos</a></li>
  <li><a data-toggle="tab" href="#menu3">Aviones</a></li>
  <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Datos Generales</h3>
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
          [[ Form::label('relacion', 'Tipo de Relacion *')]]
          [[ Form::select('relacion', config('options.relacion'), null, array('class' => 'selector full-width')) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          <div class="cliente" style="display:none;">
          [[Form::label('ciudad', 'Ciudad *') ]]
          [[ Form::text('codigop', null, ['class' => 'input-text full-width', 'required' => 'required']) ]]
          </div>
        </div>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Datos de Operaciones</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
           [[ Form::label('correo', 'Correo *')]]
           [[Form::text('correo', null, ['class' => 'input-text full-width' , 'required' => 'required'])]]

        </div>

    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('telefono', 'Teléfono *') ]]
        [[ Form::text('telefono', null, ['class' => 'input-text full-width' ]) ]]
      </div>
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('celular', 'Celular')]]
        [[ Form::text('celular', null, ['class' => 'input-text full-width']) ]]
        </div>

    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Datos Administrativos</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[ Form::label('contacto_admin', 'Persona de Contacto')]]
        [[ Form::text('contacto_admin', null, ['class' => 'input-text full-width']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('correo_admin', 'Correo')]]
        [[ Form::text('correo_admin', null, ['class' => 'input-text full-width']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">

          [[Form::label('telefono_admin', 'Teléfono') ]]
          [[ Form::text('telefono_admin', null, ['class' => 'input-text full-width']) ]]

        </div>
    </div>
     <h3>Información de Transferencias Bancarias</h3>
     <div class="row form-group">
         <div class="col-sms-6 col-sm-6">
           [[ Form::label('banco', 'Banco')]]
         [[ Form::text('banco', null, ['class' => 'input-text full-width']) ]]
         </div>
         <div class="col-sms-6 col-sm-6">

           [[Form::label('cuenta', 'Cuenta #') ]]
           [[ Form::text('codigop', null, ['class' => 'input-text full-width']) ]]

         </div>
     </div>
     <div class="row form-group">
         <div class="col-sms-6 col-sm-6">
           [[ Form::label('aba', 'ABA')]]
           [[ Form::text('aba', null, ['class' => 'input-text full-width']) ]]
         </div>
         <div class="col-sms-6 col-sm-6">

           [[Form::label('direccion_cuenta', 'Dirección') ]]
           [[ Form::text('direccion_cuenta', null, ['class' => 'input-text full-width']) ]]

         </div>
     </div>
  </div>
  <div id="menu3" class="tab-pane fade">

    <p>Some content in menu 2.</p>
  </div>
  <div id="menu4" class="tab-pane fade" style="display:none">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>

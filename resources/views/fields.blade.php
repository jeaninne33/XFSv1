<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Datos Generales</a></li>
  <li><a data-toggle="tab" href="#menu1">FBO</a></li>
  <li><a data-toggle="tab" href="#menu2">Imagen</a></li>
  {{-- <li><a data-toggle="tab" href="#menu3">Aviones</a></li> --}}
  {{-- <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li> --}}
</ul>
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="clientes" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Listado de Clientes</h4>
        </div>
        <div class="modal-body">
          @include('estimates.partials.tbClientes')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

  </div>
</div>
<!--Modal-->
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Datos Generales</h3>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
           [[ Form::label('id', 'Numero de Estimado *')]]
           [[Form::text('id', null, ['class' => 'input-text full-width',  'required' => 'required' ])]]

        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Cliente', 'Cliente') ]]
          [[Form::text('nombreC', null, ['class' => 'input-text full-width' ]) ]]

        </div>
        <div class="col-sms-6 col-sm-2">
          <br/>
          <a name="btnCliente" class="btn btn-primary glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target="#clientes"></a>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('Proveedor', 'Proveedor *') ]]
          [[ Form::text('nombreP', null, ['class' => 'input-text full-width',  'required' => 'required' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('Estado', 'Estado *') ]]
          {{-- [[ Form::select('estado','estado', null,['class' => 'selector full-width',  'required' => 'required' ]) ]] --}}
        </div>
    </div>
    <div class="row form-group">
      {{-- <div class="col-sms-6 col-sm-6">
        [[Form::label('Estado', 'Estado *') ]]
        [[ Form::select('estado', $estado, null,['class' => 'selector full-width',  'required' => 'required' ]) ]]
      </div> --}}
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fecha', 'Fecha *') ]]
          <div class="datepicker-wrap blue">
              <input type="text" name="fechaActual" class="input-text full-width" placeholder="dd/mm/yyyy" value="<?php echo date("m/d/Y");?>" />
          </div>
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('ganancia', 'Ganancia *') ]]
          [[ Form::text('ganancia', null, ['class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[Form::label('resumen', 'Resumen') ]]
          [[ Form::text('resumen', null, ['class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('metodo', 'Metodo de Seguimiento *') ]]
          [[ Form::text('metodo_segui', null, ['class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
      <div class="datepicker-wrap blue">
          <input type="text" name="fechaActual" class="input-text full-width" placeholder="dd/mm/yyyy" value="<?php echo date("m/d/Y");?>" />
      </div>
    </div>
        {{-- <div class="col-sms-6 col-sm-6">
          [[Form::label('pais', 'Pais *') ]]
          [[ Form::select('pais', $paises, null,['class' => 'selector full-width',  'required' => 'required' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('estado', 'Estado *') ]]
          [[ Form::select('estado_id', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'selector full-width','placeholder' => 'Seleccione el Estado',  'required' => 'required']) ]]
        </div> --}}
    </div>


  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Datos de Gasolina</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-6">
           [[ Form::label('fbo', 'FBO *')]]
           [[Form::text('fbo', null, ['class' => 'input-text full-width' ])]]

        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('cantidad', 'Cantidad aproximada *') ]]
          [[ Form::text('cantidad_fuel', null, ['class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Codigo Aeropuerto *') ]]
        [[ Form::text('localidad', null, ['class' => 'input-text full-width' ]) ]]
      </div>
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('tipo', 'Tipo de Aeronave *')]]
        [[ Form::text('celular', null, ['class' => 'input-text full-width']) ]]
        </div>

    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Registro de Aeronaves *') ]]
        [[ Form::text('placa', null, ['class' => 'input-text full-width' ]) ]]
      </div>
    </div>
    <h3>Datos de Congierge</h3>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Numero de Habitación *') ]]
        [[ Form::text('num_habitacion1', null, ['class' => 'input-text full-width' ]) ]]
      </div>
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Tipo de Habitación *') ]]
        [[ Form::text('tipo_hab', null, ['class' => 'input-text full-width' ]) ]]
      </div>
    </div>
    <div class="col-sms-6 col-sm-6">
      [[Form::label('Tipo de Cama*') ]]
      [[ Form::text('tipo_cama', null, ['class' => 'input-text full-width' ]) ]]
    </div>
    <div class="col-sms-6 col-sm-6">
      [[Form::label('Numero de Estrellas *') ]]
      [[ Form::text('tipo_estrellas', null, ['class' => 'input-text full-width' ]) ]]
    </div>
  </div>
  </div>
  {{-- <div id="menu2" class="tab-pane fade">
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
        [[ Form::email('correo_admin', null, ['class' => 'input-text full-width']) ]]
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
           [[ Form::text('cuenta', null, ['class' => 'input-text full-width']) ]]

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
  </div> --}}
</div>
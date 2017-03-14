<ul class="nav nav-tabs">

  <li class="active"><a data-toggle="tab" href="#home">Datos Generales</a></li>
  <li><a data-toggle="tab" href="#fbo">FBO</a></li>
  <li><a data-toggle="tab" href="#imagen">Imagen</a></li>
  <li><a data-toggle="tab" href="#estimados">Estimados</a></li>
  {{-- <li><a data-toggle="tab" href="#menu3">Aviones</a></li> --}}
  {{-- <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li> --}}
</ul>
<!-- Trigger the modal with a button -->

<input type="hidden" name="_token" id="token" value="{{csrf_token()}}"/>
<!-- Modal -->
<div id="clientes" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><label id="titulo"></label></h4>
        </div>
        <div class="modal-body">
           <div class="cliente" style="display:none">
              @include('estimates.partials.tbClientes')
           </div>
           <div class="correo" style="display:none">
              @include('Mail.mail')
           </div>
           <div class="fuelrelease" style="display:none">
              @include('estimates.partials.fuel-releaseFields')
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

  </div>
</div>
<!--Modal-->
<div class="tab-content">


  {{-- <div id="menu4" class="tab-pane fade " style="display:none">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div> --}}
  <div id="home" class="tab-pane fade  in active">
    <h3>Datos Generales</h3>
    <div class="row form-group">
        {{-- <div id="NroEstimado" style="display:{{$visible}}" class="col-sms-6 col-sm-3">
           [[ Form::label('id', 'Numero de Estimado *')]]
           [[Form::text('id', $estimates->id, ['class' => 'input-text full-width','readonly' ])]]

        </div> --}}
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Cliente', 'Cliente *') ]]
          @if ($indicador==0)
            [[Form::text('nombreC', null, ['id'=>'nombreC','class' => 'input-text full-width','readonly', 'required' => 'required' ]) ]]
            {{-- [[Form::text('company_id',null,['id'=>'company_id','hidden'])]] --}}
          @else
            [[Form::text('nombreC', $cliente->nombreC, ['id'=>'nombreC','class' => 'input-text full-width','readonly', 'required' => 'required' ]) ]]
            {{-- [[Form::text('company_id',$cliente->company_id,['id'=>'company_id','hidden'])]] --}}
          @endif

        </div>
        <div class="col-sms-6 col-sm-2">
          <br/>
          <button type="button" value="1" onclick="ajaxRenderSection(this.value),modal(this.value)" name="btnCliente" id="btnCliente" class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#clientes"></button>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Proveedor', 'Proveedor *') ]]
          @if ($indicador==0)
            [[Form::text('nombreP',null, ['id'=>'nombreP','class' => 'input-text full-width',  'required' => 'required', 'readonly' ]) ]]
            [[Form::text('prove_id',null,['id'=>'prove_id','hidden'])]]
          @else
            [[Form::text('nombreP', $proveedor->nombreP, ['id'=>'nombreP','class' => 'input-text full-width',  'required' => 'required' ]) ]]
            {{-- [[Form::text('prove_id',$proveedor->prove_id,['id'=>'prove_id','hidden'])]] --}}
          @endif

        </div>
        <div class="col-sms-6 col-sm-1">
          <br/>
          <button type="button"  value="0" onclick="ajaxRenderSection(this.value),modal(this.value)" name="btnCliente" id="btnCliente" class=" btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#clientes"></button>
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('Estado', 'Estado *') ]]

          [[ Form::select('estado', array('Pendiente'=>'Pendiente','Aceptado'=>'Aceptado','Rechazado'=>'Rechazado','Cancelado'=>'Cancelado'), null,['id' => 'estado','class' => 'selector full-width',  'required' => 'required']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-3">
          [[Form::label('fecha', 'Fecha Solicitada *') ]]
          [[Form::date('fecha_soli',null,['id'=>'fecha_soli','class'=>'input-text full-width','placeholder'=>'dd/mm/yyyy'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('ganancia', 'Ganancia *') ]]
          [[ Form::text('ganancia', null, ['id'=>'ganancia','class' => 'input-text full-width','readonly' ]) ]]
          <input type="text" id="tCategoria" hidden="hidden"/>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[Form::label('resumen', 'Resumen') ]]
          [[ Form::text('resumen', null, ['id'=>'resumen','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-4">
          [[Form::label('metodo', 'Metodo de Seguimiento *') ]]
          [[ Form::select('metodo', array('Telefono'=>'Telefono','Celular'=>'Celular','Correo'=>'Correo'), null,['id' => 'metodo','class' => 'selector full-width',  'required' => 'required','onChange'=>'metodoSeguimiento()']) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          <div class="telefono" style="display:block;" >
            @if ($indicador==0)
              [[Form::label('telefono', 'Telefono') ]]
              [[ Form::text('telefono', null, ['id'=>'telefono','class' => 'input-text full-width' ]) ]]
            @else
              [[Form::label('telefono', 'Telefono') ]]
              {{-- [[ Form::text('telefono', $cliente->telefono, ['id'=>'telefono','class' => 'input-text full-width' ]) ]] --}}
            @endif

          </div>
          <div class="celular" style="display:none;" >
          @if ($indicador==0)
            [[Form::label('celular', 'Celular') ]]
            {{-- [[ Form::text('celular', null, ['id'=>'celular','class' => 'input-text full-width' ]) ]] --}}
          @else
            [[Form::label('celular', 'Celular') ]]
            {{-- [[ Form::text('celular', $cliente->celular, ['id'=>'celular','class' => 'input-text full-width' ]) ]] --}}
          @endif

          </div>
          <div class="correo" style="display:none;" >
          @if ($indicador==0)
            [[Form::label('correo', 'Correo') ]]
            [[ Form::text('correo', null, ['id'=>'correo','class' => 'input-text full-width' ]) ]]
          @else
            [[Form::label('correo', 'Correo') ]]
            {{-- [[ Form::text('correo', $cliente->correo, ['id'=>'correo','class' => 'input-text full-width' ]) ]] --}}
          @endif

          </div>
        </div>
    </div>
    <div class="row form-group">
          <div class="col-sms-6 col-sm-3">
            [[Form::label('fecha', 'Fecha Seguimiento *') ]]
            [[Form::date('proximo_seguimiento',null,['id'=>'proximo_seguimiento','class'=>'input-text full-width','placeholder'=>'dd/mm/yyyy'])]]


        </div>
    </div>
</div>
  <div id="fbo" class="tab-pane fade">
    <h3>Datos de Gasolina</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-6">
           [[ Form::label('fbo', 'FBO *')]]
           [[Form::text('fbo', null, ['id'=>'nbFBO','class' => 'input-text full-width' ])]]

        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('cantidad', 'Cantidad aproximada *') ]]
          [[ Form::text('cantidad_fuel', null, ['id'=>'cantidad_fuel','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Codigo Aeropuerto *') ]]
        [[ Form::text('localidad', null, ['id'=>'localidad','class' => 'input-text full-width' ]) ]]
      </div>
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('tipo', 'Tipo de Aeronave *')]]
          [[ Form::select('avion_id', array('Seleccione Avion'), null,['id' => 'avion_id','class' => 'selector full-width',  'required' => 'required']) ]]
        </div>

    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Registro de Aeronaves *') ]]
        [[ Form::text('matricula', null, ['readonly','id'=>'matricula','class' => 'input-text full-width' ]) ]]
      </div>
    </div>
    <h3>Datos de Congierge</h3>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Numero de Habitación *') ]]
        [[ Form::select('num_habitacion', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'), null,['id' => 'num_habitacion','class' => 'selector full-width',  'required' => 'required'])]]
      </div>
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Tipo de Habitación *') ]]
        [[ Form::select('tipo_hab', array('Sencilla'=>'Sencilla','Doble'=>'Doble','Triple'=>'Triple','Suite'=>'Suite','Presidencial'=>'Presidencial'), null,['id' => 'tipo_hab','class' => 'selector full-width',  'required' => 'required'])]]
      </div>
    </div>
    <div class="row form-group">
    <div class="col-sms-6 col-sm-6">
      [[Form::label('Tipo de Cama*') ]]
      [[ Form::select('tipo_cama', array('Individual'=>'Individual','Matrimonial'=>'Matrimonial','King Size'=>'King Size','Queen Size'=>'Queen Size'), null,['id' => 'tipo_cama','class' => 'selector full-width',  'required' => 'required']) ]]
    </div>
    <div class="col-sms-6 col-sm-6">
      [[Form::label('Numero de Estrellas *') ]]
      [[ Form::select('tipo_estrellas', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'), null,['id' => 'tipo_estrellas','class' => 'selector full-width',  'required' => 'required'])]]
    </div>
  </div>
</div>
<div id="estimados" class="tab-pane fade">
    <h3>Estimados</h3>
  <div class="row">
      <div class="col-sms-6 col-sm-4">
        [[ Form::label('servicios', 'Servicios')]]
        [[ Form::select('servicio_id', $servicios, null, array('id'=>'servicios','class' => 'input-text full-width')) ]]
      </div>
      <div class="col-sms-6 col-sm-4">
        [[Form::label('descripcion', 'Descripción') ]]
        [[ Form::text('descripcion', null, ['readonly','id'=>'descripcion','class' => 'input-text full-width' , 'required' => 'required']) ]]
      </div>
  </div>
  <div class="row">
    <div class="col-sms-6 col-sm-4">
        [[Form::label('cantidad', 'Cantidad') ]]
        [[ Form::text('cantidad', null, ['id'=>'cantidad','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'0']) ]]
    </div>
    <div class="col-sms-6 col-sm-4">
        [[Form::label('precio', 'Precio') ]]
        [[ Form::text('precio', null, ['id'=>'precio','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00']) ]]
    </div>
    <div class="col-sms-6 col-sm-4">
      </br>
        <div class="plus" style="display:block">
          <button type="button" onclick="addRows()" name="btnCliente" id="btnAdd" class="btn btn-primary glyphicon glyphicon-plus"></button>
        </div>
        <div class="edit" style="display:none">
          <button type="button" name="btnedit" id="btnedit" class="btn-editar btn btn-primary glyphicon glyphicon-pencil"></button>
         {{-- <a class="editar glyphicon glyphicon-pencil btn btn-primary" title="Editar" href="#"></a> --}}
        </div>
    </div>
  </div>
  <div class="row">
      <div class="col-sms-5 col-md-12">
          @include('estimates.partials.tbEstimados')
      </div>
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
  </div>--}}
</div>

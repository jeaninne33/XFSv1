<ul class="nav nav-tabs">

  <li class="active"><a data-toggle="tab" href="#home">Datos Generales</a></li>
  <li><a data-toggle="tab" href="#fbo">Otros Datos</a></li>
  <li><a data-toggle="tab" href="#imagen">Imagen de la Captura del Estimado</a></li>
  <li><a data-toggle="tab" href="#estimados">Items del Estimado</a></li>
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
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
    </div>

  </div>
 </div>
 <!--Modal-->
<div class="tab-content">
  <div id="imagen" class="tab-pane fade">
    <h3>Imagen Estimado</h3>
      <div class="btn btn-default btn-file">
          <i class="fa fa-paperclip"></i> Adjuntar Archivo
          <input type="file"  id="fileIMG" name="fileIMG" class="imagen_archivo" >
      </div>
          <p class="help-block"  >Max. 20MB</p>
                   <!-- cargador empresa -->
      <div style="display: none;" id="cargador_empresa" align="center">
          <br>
        <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

        <img src="{{asset("assets/images/icon/cargando.gif")}}" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

        <br>

        <hr style="color:#003" width="50%">
        <br>
      </div>
      <div id="texto_notificacion1">

      </div>
      <div id="mostrarIMG">

      </div>

  </div>
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

          @else
            [[Form::text('nombreC', $cliente->nombreC, ['id'=>'nombreC','class' => 'input-text full-width','readonly', 'required' => 'required' ]) ]]
            {{-- [[Form::text('company_id',$cliente->company_id,['id'=>'company_id','hidden'])]] --}}
          @endif
            [[Form::text('company_id',null,['id'=>'company_id','hidden','ng-model'=>'estimate.company_id'])]]

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

          @else
            [[Form::text('nombreP', $proveedor->nombreP, ['id'=>'nombreP','class' => 'input-text full-width',  'required' => 'required' ]) ]]
            {{-- [[Form::text('prove_id',$proveedor->prove_id,['id'=>'prove_id','hidden'])]] --}}
          @endif
            [[Form::text('prove_id',null,['id'=>'prove_id','hidden','ng-model'=>'estimate.prove_id'])]]

        </div>
        <div class="col-sms-6 col-sm-1">
          <br/>
          <button type="button"  value="0" onclick="ajaxRenderSection(this.value),modal(this.value)" name="btnCliente" id="btnCliente" class=" btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#clientes"></button>
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('Estado', 'Estado *') ]]

          [[ Form::select('estado', array('Pendiente'=>'Pendiente','Aceptado'=>'Aceptado','Rechazado'=>'Rechazado','Cancelado'=>'Cancelado'), null,['ng-model'=>'estimate.estado','id' => 'estado','class' => 'selector full-width',  'required' => 'required']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-3">
          [[Form::label('fecha', 'Fecha Solicitada *') ]]
          [[Form::date('fecha_soli',null,['ng-model'=>'estimate.fecha_soli','id'=>'fecha_soli','class'=>'input-text full-width','placeholder'=>'dd/mm/yyyy'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('ganancia', 'Ganancia *') ]]
          [[ Form::text('categoria', null, ['ng-model'=>'estimate.categoria','id'=>'categoria','class' => 'input-text full-width','readonly' ]) ]]
          <input type="text" id="tCategoria" hidden="hidden"/>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[Form::label('resumen', 'Resumen') ]]
          [[ Form::text('resumen', null, ['ng-model'=>'estimate.resumen','id'=>'resumen','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-4">
          [[Form::label('metodo', 'Metodo de Seguimiento *') ]]
          [[ Form::select('metodo', array('Telefono'=>'Telefono','Celular'=>'Celular','Correo'=>'Correo'), null,['ng-model'=>'estimate.metodo','id' => 'metodo','class' => 'selector full-width',  'required' => 'required','onChange'=>'metodoSeguimiento()']) ]]
        </div>
        <div class="col-sms-6 col-sm-4">

              {{-- [[Form::label('telefono', 'Telefono') ]] --}}
              [[ Form::text('info_segui', null, ['ng-model'=>'estimate.info_segui','id'=>'telefono','class' => 'input-text full-width' ]) ]]

          </div>

        </div>

    <div class="row form-group">
          <div class="col-sms-6 col-sm-3">
            [[Form::label('fecha', 'Fecha Seguimiento *') ]]
            [[Form::date('proximo_seguimiento',null,['ng-model'=>'estimate.proximo_seguimiento','id'=>'proximo_seguimiento','class'=>'input-text full-width','placeholder'=>'dd/mm/yyyy'])]]


        </div>
    </div>
</div>
  <div id="fbo" class="tab-pane fade">
    <h3>Datos de la Areonave y FBO</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-6">
           [[ Form::label('fbo', 'FBO *')]]
           [[Form::text('fbo', null, ['ng-model'=>'estimate.fbo','id'=>'nbFBO','class' => 'input-text full-width' ])]]

        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('cantidad', 'Cantidad aproximada de Combustible*') ]]
          [[ Form::text('cantidad_fuel', null, ['ng-model'=>'estimate.cantidad_fuel','id'=>'cantidad_fuel','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Codigo Aeropuerto *') ]]
        [[ Form::text('localidad', null, ['ng-model'=>'estimate.localidad','id'=>'localidad','class' => 'input-text full-width' ]) ]]
      </div>
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('tipo', 'Tipo de Aeronave *')]]
          [[ Form::select('avion_id', array('Seleccione Avion'), null,['id' => 'avion_id','class' => 'selector full-width',  'required' => 'required']) ]]
        </div>

    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Matricula del Avión: *') ]]
        [[ Form::text('matricula', null, ['ng-model'=>'estimate.avion_id','readonly','id'=>'matricula','class' => 'input-text full-width' ]) ]]
      </div>
    </div>
    <h3>Datos de Congierge</h3>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Cantidad de Habitaciones ') ]]
        [[ Form::select('num_habitacion', array(0=>'Seleccione','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'), null,['id' => 'num_habitacion','class' => 'selector full-width',  'required' => 'required'])]]
      </div>
      <div class="col-sms-6 col-sm-6">
        [[Form::label('Tipo de Habitación ') ]]
        [[ Form::select('tipo_hab', array(0=>'Seleccione','Sencilla'=>'Sencilla','Doble'=>'Doble','Triple'=>'Triple','Suite'=>'Suite','Presidencial'=>'Presidencial'), null,['id' => 'tipo_hab','class' => 'selector full-width',  'required' => 'required'])]]
      </div>
    </div>
    <div class="row form-group">
    <div class="col-sms-6 col-sm-6">
      [[Form::label('Tipo de Cama') ]]
      [[ Form::select('tipo_cama', array(0=>'Seleccione','Individual'=>'Individual','Matrimonial'=>'Matrimonial','King Size'=>'King Size','Queen Size'=>'Queen Size'), null,['id' => 'tipo_cama','class' => 'selector full-width',  'required' => 'required']) ]]
    </div>
    <div class="col-sms-6 col-sm-6">
      [[Form::label('Numero de Estrellas ') ]]
      [[ Form::select('tipo_estrellas', array(0=>'Seleccione','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'), null,['id' => 'tipo_estrellas','class' => 'selector full-width',  'required' => 'required'])]]
    </div>
  </div>
</div>
<div id="estimados" class="tab-pane fade">
  <h3>Items del Estimado
    <small>
                 Se agregan los datos del Estimado. <b>   Los campos con (*) son obligatorios</b>
        </small>
  </h3>
  <table border="0" style="with:900px;" class="table table-hover">
    <thead>
      <tr>
        <th>Servicio*</th>
        <th>Descripción</th>
        <th>Cantidad *</th>
        <th>$Precio *</th>
        <th>$Subtotal</th>
        <th>$Ganancia</th>
        <th>$Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <tr ng-repeat="dato in data_estimates track by $index">
      <td>
        [[ Form::select('servicio_id', array(''=>'Seleccione'), null, ['ng-options'=>"servicio.id as servicio.nombre for servicio in servicios",'id'=>'servicio_id', 'ng-model'=>'dato.servicio_id',  ' ng-change'=>'inicializar($index)']) ]]
      </td>
      <td>
        [[ Form::text('descripcion', null, ['readonly','id'=>'descripcion','class' => 'input-text full-width' , 'required' => 'required', 'ng-model'=>'dato.descripcion']) ]]
      </td>
      <td>
        [[ Form::text('cantidad', null, ['id'=>'cantidad','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'0', 'ng-model'=>'dato.cantidad',' ng-change'=>'calcular($index)']) ]]
      </td>
      <td>
          [[ Form::text('precio', null, ['ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','step'=>"0.01",'id'=>'precio','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00',' ng-change'=>'calcular($index)','ng-model'=>'dato.precio']) ]]
      </td>
      <td>
        [[ Form::text('subtotal', null, ['id'=>'subtotal','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00','readonly', 'ng-model'=>'dato.subtotal']) ]]
      </td>
      <td>
        [[ Form::text('ganancia', null, ['id'=>'ganancia','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'dato.recarga']) ]]
      </td>
      <td>
        [[ Form::text('total', null, ['id'=>'total','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'dato.total']) ]]
      </td>
      <td>
          [[ Form::hidden('subtotal_recarga', null, ['id'=>'subtotal_recarga','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00', 'ng-model'=>'dato.subtotal_recarga']) ]]
         <a class="btn-delete" title="Eliminar"  ng-click="delete($index)"aria-hidden="true"><i class="glyphicon glyphicon-trash"></i></a>
      </td>

    </tr>
    <tfoot>
      <tr>
        <td colspan="9"><!--<span class="help-block" ng-show="!form1.$pristine && !form1.precio.$valid"><p style="color:rgb(235, 160, 162)">  Precio Invalido! Debe introducir un decimal con 2 caracteres ej: 5.23 (Solo admite el .)</p>
      </span>--></td>
      </tr>
    </tfoot>
      </tbody>
    </table>

     <div class="row">
         <div class="col-sm-6 col-md-4 pull-right" style="text-align:right;">
          Subtotal: $[[ Form::text('subtotal', null, ['id'=>'subtotal','class' => 'input-text' , 'required' => 'required','placeholder'=>'$0.00', 'readonly' ,'ng-model'=>'invoice.subtotal']) ]]
              <br/>Descuento: %[[ Form::text('descuento', null, ['ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','step'=>"0.01", 'id'=>'descuento','class' => 'input-text' , 'required' => 'required','placeholder'=>'0.00%','ng-model'=>'invoice.descuento',' ng-change'=>'total()']) ]]
           <br/>Total Descuento: $ [[ Form::text('subtotal', null, ['id'=>'subtotal','class' => 'input-text' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'invoice.total_descuento']) ]]
        </div>

        <div class=" col-sm-6 col-md-4 pull-left">
          <button   ng-click="data_estimates.push({})" type="button" class="btn btn-info"> <span class="glyphicon glyphicon-plus-sign"></span>Agregar Item Factura</button>
       </div>
     </div>
     <div class="col-sm-6 col-md-8 pull-right" style="text-align:right;">
         [[ Form::hidden('total', null, ['id'=>'total','class' => 'input-text full-width' ,'ng-model'=>'invoice.total']) ]]
         [[ Form::hidden('ganancia', null, ['id'=>'ganancia','class' => 'input-text full-width' ,'ng-model'=>'invoice.ganancia']) ]]
       <h2><span style="color: green;">Total Ganancia: $ @{{estimate.ganancia}}</span>        -    <span style="color: rgb(21, 28, 116);">Total: $ @{{estimate.total}}</span>  <h2>
        </div>

     <br/>

  <div class="row">
      <div class="col-sms-5 col-md-12">
          {{-- @include('estimates.partials.tbEstimados') --}}
      </div>
  </div>
</div>

</div>

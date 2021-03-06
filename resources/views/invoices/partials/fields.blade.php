<ul class="nav nav-tabs" >
  <li class="active"><a data-toggle="tab" href="#home">Datos de la Factura</a></li>
  <li><a data-toggle="tab" href="#menu1">Items de la Factura</a></li>
  <li><a data-toggle="tab" href="#menu2">Datos de la Compañia</a></li>
  <li><a data-toggle="tab" href="#menu3" class="avion" style="display:none;">Aviones</a></li>
  <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Datos Generales de la Factura</h3>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6 ">
          [[Form::label('Número del Estimado') ]]
          [[ Form::text('estimate_id', null, ['readonly','class' => 'input-text full-width' ,'ng-model'=>'invoice.estimate_id']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fbo', 'FBO *') ]]
          [[ Form::text('fbo', null, ['ng-value'=>"@{{ estimate[0].fbo}}",'class' => 'input-text full-width' ,'ng-model'=>'invoice.fbo']) ]]
        </div>
    </div>
    <div class="row form-group">

        <div class="col-sms-6 col-sm-6">
          [[Form::label('Localidad', 'Localidad *') ]]
          [[ Form::text('localidad', null, ['class' => 'input-text full-width' ,'ng-model'=>'invoice.localidad']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fecha', 'Fecha de la Factura *') ]]
          [[ Form::date('fecha', null, ['id'=>'fecha','class' => 'input-text full-width','ng-model'=>'invoice.fecha','placeholder'=>'dd/mm/yyyy',' ng-change'=>'plazo()' ]) ]]
        </div>

    </div>
    <div class="row form-group">

        <div class="col-sms-6 col-sm-6">
          [[Form::label('plazos', 'Plazos de Pago *') ]]
          [[ Form::select('plazo', config('plazo.plazo'), null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'invoice.plazo',' ng-change'=>'plazo()'  ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fecha', 'Fecha de Vencimiento *') ]]
          [[ Form::date('fecha_vencimiento', null, ['id'=>'fecha_vencimiento','class' => 'input-text full-width' ,'placeholder'=>'dd/mm/yyyy','ng-model'=>'invoice.fecha_vencimiento' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('avion_id', 'Matricula del Avion') ]]
          [[ Form::select('avion_id',  array('' => 'Seleccione'), $estimate[0]->avion_id, ['ng-options'=>"air.id as air.nombre for air in avion",'ng-model'=>'invoice.avion_id','id'=>'avion_id','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('estado', 'Estado Factura') ]]
          [[ Form::select('estado',  array('' => 'Seleccione'), '1', ['id' => 'estado', 'ng-options' =>"estado.id as estado.nombre for estado in estados",'ng-model'=>'invoice.estado','class' => 'input-text full-width', 'disabled']) ]]

        </div>

    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('metodo_pago', 'Método de Pago') ]]
          [[ Form::select('metodo_pago', array('' => 'Seleccione'), null, ['id' => 'metodo_pago','ng-options'=>"metodo.nombre as  metodo.nombre for metodo in metodos",'class' => 'input-text full-width',  'required' => 'required','ng-model'=>'invoice.metodo_pago'  ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fecha_pago', 'Fecha de Pago ') ]]
          [[ Form::date('fecha_pago', null, ['class' => 'input-text full-width' , 'ng-model'=>'invoice.fecha_pago','ng-change'=>'estado()' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[Form::label('Resumen', 'Resumen') ]]
          [[ Form::text('resumen', null, ['class' => 'input-text full-width','ng-model'=>'invoice.resumen' ]) ]]  </div>
    </div>

  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Items de la Factura
      <p><small>
               Se agregan los datos de la factura. <b>   Los campos con (*) son obligatorios</b>
          </small></p>
    </h3>
    <table border="0" style="with:900px;" class="table table-hover">
      <thead>
        <tr>
          <th>Servicio*</th>
          <th>Descripción</th>
          <th>Fecha del Servicio *</th>
          <th>Cantidad *</th>
          <th>$Precio *</th>
          <th>$Subtotal</th>
          <th>$Ganancia</th>
          <th>$Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <tr ng-repeat="dato in data_invoices track by $index">
        <td>
          [[ Form::select('servicio_id', array(''=>'Seleccione'), null, ['ng-options'=>"servicio.id as servicio.nombre for servicio in servicios",'id'=>'servicio_id', 'ng-model'=>'dato.servicio_id',  ' ng-change'=>'inicializar($index)']) ]]
        </td>
        <td>
          [[ Form::text('descripcion', null, ['id'=>'descripcion','class' => 'input-text full-width' , 'required' => 'required', 'ng-model'=>'dato.descripcion']) ]]
        </td>
        <td>
          [[ Form::date('fecha_servicio', null, ['class' => 'input-text full-width',  'required' => 'required', 'ng-model'=>'dato.fecha_servicio'] ) ]]
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
            <button   ng-click="data_invoices.push({})" type="button" class="btn btn-info"> <span class="glyphicon glyphicon-plus-sign"></span>Agregar Item Factura</button>
         </div>
       </div>
       <div class="col-sm-6 col-md-8 pull-right" style="text-align:right;">
           [[ Form::hidden('total', null, ['id'=>'total','class' => 'input-text full-width' ,'ng-model'=>'invoice.total']) ]]
           [[ Form::hidden('ganancia', null, ['id'=>'ganancia','class' => 'input-text full-width' ,'ng-model'=>'invoice.ganancia']) ]]
         <h2><span style="color: green;">Total Ganancia: $ @{{invoice.ganancia}}</span>        -    <span style="color: rgb(21, 28, 116);">Total: $ @{{invoice.total}}</span>  <h2>
          </div>

       <br/>

  </div>

  <div id="menu2" class="tab-pane fade">
    <h3>Datos del Cliente</h3>
    <h5>
      [[ Form::hidden('company_id', null, ['id'=>'company_id','class' => 'input-text full-width' ,'ng-model'=>'invoice.company_id']) ]]
    <table border="0" style="with:600px;" class="table">
      <tr>
        <td colspan="2"><strong>Número: </strong> {{ $estimate[0]->company_id}}<br></td>
      </tr>
      <tr>
        <td colspan="2"><strong>Nombre de la Compañia: </strong>{{ $estimate[0]->nombre}}<br></td>
      </tr>
      <tr>
        <td colspan="2"><strong>Dirección: </strong>{{ $estimate[0]->direccion}} </td>
      </tr>
      <tr>
       <td colspan="2"><strong>Teléfono: </strong>{{ $estimate[0]->telefono_admin}}<br></td>
     </tr>
       <tr>
        <td colspan="2"><strong>Ganacia %: </strong>{{  $invoice->categoria($estimate[0]->categoria)}}<br></td>
      </tr>
      </table>
     </h5>

  </div>
  <div id="menu3" class="tab-pane fade">
    <h3>
    Aviones <p><small>
             Se agregan los datos de los Aviones. <b>   Los campos con (*) son obligatorios</b>
        </small></p>
    </h3>
    <div id="aviones" >

      <br/>
        <div class="pull-right">
          <button   ng-click="airplanes.push({})" type="button" class="btn btn-info"> <span class="glyphicon glyphicon-plus-sign"></span>Agregar Avion</button>
          <button  ng-click="airplanesdelete()"  type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span>Eliminar Avion</button>
        </div>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade" style="display:none">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>

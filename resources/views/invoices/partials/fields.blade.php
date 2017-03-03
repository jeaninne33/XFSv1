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
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fbo', 'FBO *') ]]
          [[ Form::text('fbo', null, ['ng-value'=>"@{{ estimate[0].fbo}}",'class' => 'input-text full-width' ,'ng-model'=>'invoice.fbo']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('Localidad', 'Localidad *') ]]
          [[ Form::text('localidad', null, ['class' => 'input-text full-width' ,'ng-model'=>'invoice.localidad']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fecha', 'Fecha de la Factura *') ]]
          [[ Form::date('fecha', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'invoice.fecha' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('plazos', 'Plazos de Pago *') ]]
          [[ Form::select('plazo', config('plazo.plazo'), null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'invoice.plazo'  ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('fecha', 'Fecha de Vencimiento *') ]]
          [[ Form::date('fecha_vencimiento', null, ['class' => 'input-text full-width' , 'required' => 'required','ng-model'=>'invoice.fecha_vencimiento' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('avion_id', 'Matricula del Avion') ]]
          [[ Form::select('avion_id',  array('Seleccione'), $estimate[0]->avion_id, ['ng-options'=>"air.id as air.nombre for air in avion",'ng-model'=>'invoice.avion_id','id'=>'avion_id','class' => 'input-text full-width' ]) ]]
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
      <tr ng-repeat="dato  in data_invoices track by $index">
        <td>
          [[ Form::select('servicio_id', array(''=>'Seleccione'), null, ['ng-options'=>"servicio.id as servicio.nombre for servicio in servicios",'id'=>'servicios', 'ng-model'=>'dato.servicio_id',  ' ng-change'=>'inicializar($index)']) ]]
        </td>
        <td>
          [[ Form::text('descripcion', null, ['id'=>'descripcion','class' => 'input-text full-width' , 'required' => 'required', 'ng-model'=>'dato.descripcion']) ]]
        </td>
        <td>
          [[ Form::date('fecha_servicio', null, ['class' => 'input-text full-width',  'required' => 'required', 'ng-model'=>'dato.fecha_servicio'] ) ]]
        </td>
        <td>
          [[ Form::text('cantidad', null, ['id'=>'cantidad','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'0', 'ng-model'=>'dato.cantidad']) ]]
        </td>
        <td>
            [[ Form::text('precio', null, ['ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','step'=>"0.01",'id'=>'precio','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00',' ng-change'=>'calcular($index)','ng-model'=>'dato.precio']) ]]
        </td>
        <td>
          [[ Form::text('subtotal', null, ['id'=>'subtotal','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00','readonly', 'ng-model'=>'dato.subtotal']) ]]
        </td>
        <td>
          [[ Form::text('ganancia', null, ['id'=>'ganancia','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'dato.ganancia']) ]]
        </td>
        <td>
          [[ Form::text('total', null, ['id'=>'total','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'dato.total']) ]]
        </td>
        <td>
           <a class="btn-delete" title="Eliminar"  ng-click="delete($index)"aria-hidden="true"><i class="glyphicon glyphicon-trash"></i></a>
        </td>
      </tr>
        </tbody>
      </table> <span class="help-block" ng-show="!form1.precio.$valid">
                  <p style="color:rgb(235, 160, 162)">  Precio Invalido! Debe introducir un decimal con 2 caracteres ej: 5.23 (Solo admite el .)</p>
                </span>
       <div class="row">
           <div class="col-sm-6 col-md-4 pull-right">
            Subtotal: $[[ Form::text('subtotal', null, ['id'=>'subtotal','class' => 'input-text' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'invoice.subtotal']) ]]
                <br/>Descuento: %[[ Form::text('descuento', null, ['id'=>'descuento','class' => 'input-text' , 'required' => 'required','placeholder'=>'0.00%', 'readonly','ng-model'=>'invoice.descuento']) ]]
             <br/>Total Descuento: $ [[ Form::text('subtotal', null, ['id'=>'subtotal','class' => 'input-text' , 'required' => 'required','placeholder'=>'$0.00', 'readonly','ng-model'=>'invoice.subtotal']) ]]
          </div>
          <div class=" col-sm-6 col-md-4 pull-left">
            <button   ng-click="data_invoices.push({})" type="button" class="btn btn-info"> <span class="glyphicon glyphicon-plus-sign"></span>Agregar Item Factura</button>
         </div>
       </div>

       <br/>

  </div>

  <div id="menu2" class="tab-pane fade">
    <h3>Datos del Cliente</h3>
    <h5>
    <table border="0" style="with:600px;" class="table">
      <tr>
        <td colspan="2"><strong>id: </strong> {{ $estimate[0]->id}}<br></td>
      </tr>
      <tr>
        <td colspan="2"><strong>Nombre de la Compañia: </strong>{{ $estimate[0]->nombre}}<br></td>
      </tr>
      <tr>
        <td colspan="2"><strong>Direccion de factura: </strong>{{ $estimate[0]->direccion_cuenta}} </td>
      </tr>
      <tr>
       <td colspan="2"><strong>Teléfono: </strong>{{ $estimate[0]->telefono_admin}}<br></td>

     </tr>
       <tr>
        <td colspan="2"><strong>Ganacia %: </strong>{{  '00.'.$estimate[0]->categoria.'0'}}<br></td>

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

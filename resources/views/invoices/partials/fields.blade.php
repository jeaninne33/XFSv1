<ul class="nav nav-tabs" >
  <li class="active"><a data-toggle="tab" href="#home">Datos de la Factura</a></li>
  <li><a data-toggle="tab" href="#menu1">Items de la Factura</a></li>
  <li><a data-toggle="tab" href="#menu2">Datos de la Compañia</a></li>
  <li><a data-toggle="tab" href="#menu3" class="avion" style="display:none;">Aviones</a></li>
  <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li>
</ul>

<div class="tab-content">{{var_dump(json_encode($avion))}}
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
          [[ Form::select('avion_id',  array('Seleccione'), $estimate[0]->avion_id, [ 'ng-options'=>"air.id as air.nombre for air in avion",'ng-model'=>'invoice.avion_id','id'=>'avion_id','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[Form::label('Resumen', 'Resumen') ]]
          [[ Form::text('resumen', null, ['class' => 'input-text full-width','ng-model'=>'invoice.resumen' ]) ]]  </div>
    </div>

  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Items de la Factura</h3>
    <table border="0" style="with:900px;" class="table table-hover">
      <thead>
    <tr>
      <th>Servicio</th>
      <th>Descripción</th>
      <th>Fecha del Servicio</th>
      <th>Cantidad</th>
      <th>$Precio</th>
      <th>$Subtotal</th>
      <th>$Ganancia</th>
      <th>$Total</th>
      <th></th>
    </tr>
  </thead>
   <tbody>
      <tr>
        <td>
          [[ Form::select('servicio_id', array('id'=>'servicios'), null, array('id'=>'servicios', 'ng-model'=>'datos.resumen')) ]]
        </td>
        <td>
          [[ Form::text('descripcion', null, ['id'=>'descripcion','class' => 'input-text full-width' , 'required' => 'required']) ]]
        </td>
        <td>
          [[ Form::date('fecha', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'invoice.fecha' ]) ]]
        </td>
        <td>
          [[ Form::text('cantidad', null, ['id'=>'cantidad','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'0']) ]]
        </td>
        <td>
            [[ Form::text('precio', null, ['id'=>'precio','class' => 'input-text full-width' , 'required' => 'required','placeholder'=>'$0.00']) ]]
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
   </table>


  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Datos del Cliente</h3>
    <h5>
    <table border="0" style="with:600px;" class="table">
      <tr>
        <td colspan="2"><strong>id: </strong> {{ $estimate[0]->id}}<br></td>
      </tr>
      <tr>
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
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Datos de la Compañia</a></li>
  <li><a data-toggle="tab" href="#menu1">Datos de Operaciones</a></li>
  <li><a data-toggle="tab" href="#menu2">Datos Administrativos</a></li>
  <li><a data-toggle="tab" href="#menu3" class="avion" style="display:none;">Aviones</a></li>
  <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Datos Generales</h3>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6" >
           [[ Form::label('nombre', 'Nombre de la Compañia *')]]<!--  -->
           [[Form::text('nombre', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'company.nombre'  ])]]

        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('website', 'Sitio Web') ]]
          [[ Form::text('website', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.website']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('direccion', 'Dirección Fisica *') ]]
          [[ Form::text('direccion', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'company.direccion' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('direccion_cuenta', 'Direccion de factura *') ]]
          [[ Form::text('direccion_cuenta', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'company.direccion_cuenta'  ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('representante', 'Representante *') ]]
          [[ Form::text('representante', null, ['class' => 'input-text full-width' , 'required' => 'required','ng-model'=>'company.representante' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('cargo', 'Cargo que ocupa *') ]]
          [[ Form::text('cargo', null, ['class' => 'input-text full-width','ng-model'=>'company.cargo' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[Form::label('certificacion', 'Especifique si tiene Certificación y Cuales') ]]
          [[ Form::text('certificacion', null, ['class' => 'input-text full-width','ng-model'=>'company.certificacion' ]) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('pais_id', 'Pais *') ]]
          [[ Form::select('pais_id', $paises, null, ['class' => 'selector full-width',  'required' => 'required', 'id' => 'pais_id','ng-model'=>'company.pais_id','ng-change'=>'getStates()']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('estado', 'Estado *') ]]
          [[ Form::select('estado_id', array('' => 'Seleccione el Estado'), null, ['id' => 'estado_id','class' => 'selector full-width',  'required' => 'required','ng-model'=>'company.estado_id', 'ng-options'=>"state.id as state.nombre for state in states"]) ]]

        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[Form::label('codigop', 'Codigo Postal') ]]
          [[ Form::text('codigop', null, ['class' => 'input-text full-width','ng-model'=>'company.codigop']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label('ciudad', 'Ciudad *') ]]
          [[ Form::text('ciudad', null, ['class' => 'input-text full-width',  'required' => 'required' ,'ng-model'=>'company.ciudad']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('tipo', 'Tipo de Relacion *')]]
          [[ Form::select('tipo', config('options.tipo'), null,['id' => 'tipo','class' => 'selector full-width',  'required' => 'required' ,'ng-model'=>'company.tipo']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          <div class="cliente" style="display:none;" >
          [[Form::label('categoria', 'Categoria del Cliente *') ]]
          [[ Form::select('categoria', array('' => 'Seleccione',   0=>'Postpago',   1=>'Prepago',   2=>'De 1 a 15 días de crédito', 3=>'De 16 a 30 días de crédito'), null, ['id' => 'categoria','class' => 'input-text full-width' ,'ng-model'=>'company.categoria']) ]]
          </div>
          <div class="proveedor" style="display:none;" >
          [[Form::label('tipo_prove', 'Tipo de Proveedor *') ]]
          [[ Form::select('tipo_prove', array('' => 'Seleccione', 'Fuel/Handling'=>'Fuel/Handling',  'FBO/Handler'=>'FBO/Handler',  'Broker' =>'Broker','Supplier'=>'Supplier'), null, ['id' => 'tipo_prove','class' => 'input-text full-width' ,'ng-model'=>'company.tipo_prove']) ]]
          </div>
        </div>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Datos de Operaciones</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
           [[ Form::label('correo', 'Correo *')]]
           [[Form::email('correo', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.correo'])]]

        </div>

    </div>
    <div class="row form-group">
      <div class="col-sms-6 col-sm-6">
        [[Form::label('telefono_admin', 'Teléfono *') ]]
        [[ Form::text('telefono_admin', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.telefono_admin']) ]]
      </div>
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('celular', 'Celular')]]
        [[ Form::text('celular', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.celular']) ]]
        </div>


    </div>
    <div class="row form-group">
      <div class="proveedor" style="display:none;" >
        <div class="col-sms-12 col-sm-12">
           [[ Form::label('servicio_disp', 'Tipo de Servicio Disponible *')]]
            [[ Form::select('servicio_disp', array('' => 'Seleccione','Av. General','Commercial','Fuel Release'), null, ['id' => 'servicio_disp','class' => 'selector full-width', 'required' => 'required' ,'ng-model'=>'company.servicio_disp']) ]]
        </div>
      </div>

    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Datos Administrativos</h3>
    <div class="row form-group">
        <div class="col-sms-12 col-sm-12">
          [[ Form::label('contacto_admin', 'Persona de Contacto')]]
        [[ Form::text('contacto_admin', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.contacto_admin']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6">
          [[ Form::label('correo_admin', 'Correo')]]
        [[ Form::email('correo_admin', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.correo_admin']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">

          [[Form::label('telefono', 'Teléfono') ]]
          [[ Form::text('telefono', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.telefono']) ]]

        </div>
    </div>
     <h3>Información de Transferencias Bancarias</h3>
     <div class="row form-group">
         <div class="col-sms-6 col-sm-6">
           [[ Form::label('banco', 'Banco')]]
         [[ Form::text('banco', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.banco']) ]]
         </div>
         <div class="col-sms-6 col-sm-6">

           [[Form::label('cuenta', 'Cuenta #') ]]
           [[ Form::text('cuenta', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.cuenta']) ]]

         </div>
     </div>
     <div class="row form-group">
         <div class="col-sms-6 col-sm-6">
           [[ Form::label('aba', 'ABA')]]
           [[ Form::text('aba', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.aba']) ]]
         </div>
         <div class="col-sms-6 col-sm-6">

           [[Form::label('direccion_cuenta', 'Dirección') ]]
           [[ Form::text('direccion_cuenta', null, ['class' => 'input-text full-width' ,'ng-model'=>'company.direccion_cuenta']) ]]

         </div>
     </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <h3>
    Aviones <p><small>
             Se agregan los datos de los Aviones. <b>   Los campos con (*) son obligatorios</b>
        </small></p>
    </h3>
    <div id="aviones" >
      @include('companys.partials.fields_avion')
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

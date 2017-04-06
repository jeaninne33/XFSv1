
    <div class="row form-group">

        [[Form::hidden('estimate_id',null, ['ng-model'=>'fuel.estimate_id','id'=>'id','class' => 'input-text full-width'])]]</p>

        <div id="NroEstimado" class="col-sms-6 col-sm-3">
           [[ Form::label('id', 'Ref Info # *')]]
           [[Form::text('ref',null, ['ng-model'=>'fuel.ref','id'=>'ref','class' => 'input-text full-width'])]]
        </div>

        <div class="col-sms-6 col-sm-4">
          [[Form::label('to', 'To') ]]
          [[Form::text('to', null, ['ng-model'=>'estimate.nombrec','id'=>'to','class' => 'input-text full-width','readonly', 'required' => 'required' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('from', 'from') ]]
          [[Form::text('from', 'X Flight Support', ['readonly','id'=>'from','class' => 'input-text full-width',  'required' => 'required' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-3">
          [[Form::label('fecha', 'Request Date *') ]]
          [[Form::date('date',null,['ng-model'=>'fuel.date','id'=>'fecha_s','class'=>'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('release', 'Release Ref# *') ]]
          [[Form::text('cf_card',null,['ng-model'=>'fuel.cf_card','id'=>'releaseRef','class'=>'input-text full-width'])]]
        </div>
    </div>
      <div class="row form-group">
        <div class="col-sms-6 col-sm-8">
          [[Form::label('a', 'We hereby confirm the following fuel release, valid for 72 hours') ]]
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Airport Code/Name ') ]]
          [[Form::text('codeairport', null, ['ng-model'=>'estimate.localidad','id'=>'codeAirport','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Supplier') ]]
          [[Form::text('supplier', null, ['ng-model'=>'estimate.nombrep','id'=>'supplier','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-12 col-sm-4">
          [[Form::label('fbo', 'FBO')]]
          [[Form::text('fbo1',null, ['ng-model'=>'estimate.fbo','id'=>'FBO1','class' => 'input-text full-width' ])]]
        </div>
        <div class="col-sms-12 col-sm-4">
          [[Form::label('handling', 'Handling Agent')]]
          [[Form::text('handling',null, ['ng-model'=>'fuel.handling','id'=>'handling','class' => 'input-text full-width' ])]]
        </div>
        <div class="col-sms-12 col-sm-4">
          [[Form::label('into', 'Into Plane *')]]
          [[Form::text('into_plane',null, ['ng-model'=>'fuel.into_plane','id'=>'into_plane','class' => 'input-text full-width' ])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('int', 'Into-Plane Phone Number ') ]]
          [[ Form::text('into_plane_phone', null, ['ng-model'=>'fuel.into_plane_phone','id'=>'phone','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('int', 'Aircraft Registrarion #') ]]
          [[ Form::text('ar',null, ['ng-model'=>'estimate.matricula','id'=>'aircraft','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('int', 'Operator') ]]
          [[ Form::text('operator', null, ['ng-model'=>'fuel.operator','id'=>'operator','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('type', 'Aircraft Type') ]]
          [[ Form::text('type', null, ['ng-model'=>'estimate.tipo','id'=>'type','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('fn', 'Call Sign / Fight Number *') ]]
          [[ Form::text('fight_number', null, ['ng-model'=>'fuel.fight_number','id'=>'fightNumber','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('eta', 'ETA *') ]]
          [[Form::date('eta',null,['ng-model'=>'fuel.eta','id'=>'eta','class'=>'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('etd', 'ETD *') ]]
          [[Form::date('etd',null,['ng-model'=>'fuel.etd','id'=>'etd','class'=>'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Flight Purpose *') ]]
          [[ Form::select('flight_purpose', array('Private'=>'Private','Comercial'=>'Comercial','Medical Evacuation'=>'Medical Evacuation'), null,['placeholder'=>'Seleccione','ng-model'=>'fuel.flight_purpose','id' => 'fp','class' => 'selector full-width',  'required' => 'required'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('quantity', 'Quantity *') ]]
          [[ Form::text('qty',  null, ['ng-model'=>'fuel.qty','id'=>'quantity','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
  

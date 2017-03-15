<input type="hidden" name="_token" id="token" value="{{csrf_token()}}"/>
    <h1 class="text-center">Data of Fuel Release</h1>
<div class="row">
    <div class="pull-right">
       {{-- [[ Form::label('id', 'Estimate Number:$estimates[0]->id')]] --}}
       <label>Estimate Number: {{$estimates[0]->id}}</label>
    </div>
</div>
    <div class="row form-group">
        <div id="NroEstimado" class="col-sms-6 col-sm-3">
           [[ Form::label('id', 'Ref Info #')]]
           [[Form::text('ref',null, ['id'=>'ref','class' => 'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('to', 'To') ]]
          [[Form::text('to', $estimates[0]->nombrec, ['id'=>'to','class' => 'input-text full-width','readonly', 'required' => 'required' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('from', 'from') ]]
          [[Form::text('from', 'X Flight Support', ['readonly','id'=>'from','class' => 'input-text full-width',  'required' => 'required' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-3">
          [[Form::label('fecha', 'Request Date') ]]
          [[Form::date('fecha_s',$estimates[0]->fecha_soli,['id'=>'fecha_s','class'=>'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('release', 'Release Ref#') ]]
          [[Form::text('releaseRef',null,['id'=>'releaseRef','class'=>'input-text full-width'])]]
        </div>
    </div>
      <div class="row form-group">
        <div class="col-sms-6 col-sm-8">
          [[Form::label('a', 'We hereby confirm the following fuel release, valid for 72 hours') ]]
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Airport Code/Name') ]]
          [[Form::text('codeairport', $estimates[0]->localidad, ['id'=>'codeAirport','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Supplier') ]]
          [[Form::text('supplier', $estimates[0]->nombrep, ['id'=>'supplier','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-12 col-sm-4">
          [[Form::label('fbo', 'FBO')]]
          [[Form::text('fbo1',$estimates[0]->fbo, ['id'=>'FBO1','class' => 'input-text full-width' ])]]
        </div>
        <div class="col-sms-12 col-sm-4">
          [[Form::label('handling', 'Handling Agent')]]
          [[Form::text('handling',null, ['id'=>'handling','class' => 'input-text full-width' ])]]
        </div>
        <div class="col-sms-12 col-sm-4">
          [[Form::label('into', 'Into Plane')]]
          [[Form::text('intoPlane',null, ['id'=>'intoPlane','class' => 'input-text full-width' ])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('int', 'Into-Plane Phone Number ') ]]
          [[ Form::text('phone', null, ['id'=>'phone','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('int', 'Aircraft Registrarion #') ]]
          [[ Form::text('ar',$estimates[0]->matricula, ['id'=>'aircraft','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('int', 'Operator') ]]
          [[ Form::text('operator', null, ['id'=>'operator','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('type', 'Aircraft Type') ]]
          [[ Form::text('type',  $estimates[0]->tipo, ['id'=>'type','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('fn', 'Call Sign / Fight Number ') ]]
          [[ Form::text('fn', null, ['id'=>'fightNumber','class' => 'input-text full-width' ]) ]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('eta', 'ETA') ]]
          [[Form::date('eta',null,['id'=>'eta','class'=>'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('etd', 'ETD') ]]
          [[Form::date('etd',null,['id'=>'etd','class'=>'input-text full-width'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('Flight Purpose') ]]
          [[ Form::select('fp', array('Private'=>'Private','Comercial'=>'Comercial','Medical Evacuation'=>'Medical Evacuation'), null,['id' => 'fp','class' => 'selector full-width',  'required' => 'required'])]]
        </div>
        <div class="col-sms-6 col-sm-4">
          [[Form::label('quantity', 'Quantity') ]]
          [[ Form::text('quantity',  $estimates[0]->cantidad_fuel, ['id'=>'quantity','class' => 'input-text full-width' ]) ]]
        </div>
    </div>
    <div class="row">
        <button type="button" name="btnFR" id="btnFR" onclick="fuelRelease()" class="btn btn-primary">Generar Fuel Release</button>
    </div>

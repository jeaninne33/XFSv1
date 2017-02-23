<div class="nested-fields">
        <div class="form-row">
      <div class="form-input col-md-16" id="campos">
          <div class="row" id="airplanes.lenght" ng-repeat="airplane  in airplanes track by $index">
                <p><b>Datos del Avión # @{{ $index+1 }}<b><p/>
              <div class="col-md-2">
              [[ Form::label('tipo', 'Tipo de Avion *')]]
              [[ Form::text('tipo', null, ['class' => 'input-text full-width','ng-model'=>'airplane.tipo',  'ng-required' => 'true']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('nombre', 'Nombre')]]
                [[ Form::text('nombre', null, ['class' => 'input-text full-width' ,'ng-model'=>'airplane.nombre']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('modelo', 'Modelo')]]
                [[ Form::text('modelo', null, ['class' => 'input-text full-width' ,'ng-model'=>'airplane.modelo']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('fabricante', 'Fabricante')]]
                [[ Form::text('fabricante', null, ['class' => 'input-text full-width', 'ng-model'=>'airplane.fabricante']) ]]
              </div>
            <div class="col-md-2">
              [[ Form::label('matricula', 'Matricula *')]]
              [[ Form::text('matricula', null, ['class' => 'input-text full-width', 'ng-model'=>'airplane.matricula',  'ng-required' => 'true']) ]]
            </div>
              <div class="col-md-2">
                [[ Form::label('licencia1', 'Licencia 1 *')]]
              [[ Form::text('licencia1', null, ['class' => 'input-text full-width','ng-model'=>'airplane.licencia1',  'ng-required' => 'true']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('licencia2', 'Licencia 2')]]
              [[ Form::text('licencia2', null, ['class' => 'input-text full-width','ng-model'=>'airplane.licencia2']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('registro', 'Registro')]]
                [[ Form::text('registro', null, ['class' => 'input-text full-width','ng-model'=>'airplane.registro']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('piloto1', 'Piloto 1 *')]]
                [[ Form::text('piloto1', null, ['class' => 'input-text full-width','ng-model'=>'airplane.piloto1',  'ng-required' => 'true']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('piloto2', 'Piloto 2')]]
                [[ Form::text('piloto2', null, ['class' => 'input-text full-width','ng-model'=>'airplane.piloto2']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('certificado', 'Certificado')]]
                [[ Form::text('certificado', null, ['class' => 'input-text full-width' ,'ng-model'=>'airplane.certificado']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('seguro', 'Seguro')]]
                [[ Form::text('seguro', null, ['class' => 'input-text full-width' ,'ng-model'=>'airplane.seguro']) ]]
              </div>
      </div>
  </div>
</div>

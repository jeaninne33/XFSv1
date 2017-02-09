<div class="nested-fields">
        <div class="form-row">
          [[ Form::hidden('cant_air', 1, array('id' => 'cant_air'))]]

      <div class="form-input col-md-16" id="campos">
          <div class="row">
                <p><b>Datos del Avión #1<b><p/>
            <div class="col-md-2">
              [[ Form::label('tipo', 'Tipo de Avion *')]]
            [[ Form::text('tipo', null, ['class' => 'input-text full-width']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('modelo', 'Modelo')]]
                [[ Form::text('modelo', null, ['class' => 'input-text full-width']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('fabricante', 'Fabricante')]]
                [[ Form::text('fabricante', null, ['class' => 'input-text full-width']) ]]
              </div>
            <div class="col-md-2">
              [[ Form::label('matricula', 'Matricula *')]]
              [[ Form::text('matricula', null, ['class' => 'input-text full-width']) ]]
            </div>
              <div class="col-md-2">
                [[ Form::label('licencia1', 'Licencia 1 *')]]
              [[ Form::text('licencia1', null, ['class' => 'input-text full-width']) ]]

              </div>
              <div class="col-md-2">
                [[ Form::label('licencia2', 'Licencia 2')]]
              [[ Form::text('licencia2', null, ['class' => 'input-text full-width']) ]]

              </div>
              <div class="col-md-2">
                [[ Form::label('registro', 'Registro')]]
                [[ Form::text('registro', null, ['class' => 'input-text full-width']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('piloto1', 'Piloto 1 *')]]
                [[ Form::text('piloto1', null, ['class' => 'input-text full-width']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('piloto2', 'Piloto 2')]]
                [[ Form::text('piloto2', null, ['class' => 'input-text full-width']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('certificado', 'Certificado')]]
                [[ Form::text('certificado', null, ['class' => 'input-text full-width']) ]]
              </div>
              <div class="col-md-2">
                [[ Form::label('seguro', 'Seguro')]]
                [[ Form::text('seguro', null, ['class' => 'input-text full-width']) ]]
              </div>
      </div>
      <div id="avion1" class="row"></div>


 </div>
</div>

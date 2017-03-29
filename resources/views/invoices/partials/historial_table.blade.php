<?php date_default_timezone_set('America/Caracas'); ?>
<table id="example2" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>Usuario</td>
            <td>Instrucción</td>
            <td>Factura Número</td>
            <td>Fecha</td>
            <td>Hora</td>

        </tr>
    </thead>
    <tbody>
      @if(!$audit->isEmpty())
       @foreach($audit as $key => $value)
         <tr data-id="{{ $value->id }}" class="{{ $value->id }}">
            <td>{{ $value->user->name }}</td>
             <td>{{ $value->instruccion }}</td>
             <td>{{ $value->id_tabla }}</td>
             <td>{{date_format(date_create( $value->created_at ), 'm/d/Y') }}</td>
            <td>{{date_format(date_create( $value->created_at ), 'H:m:s A') }}</td>

        </tr>
      @endforeach
    @endif
    </tbody>
</table>

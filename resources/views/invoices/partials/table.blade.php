<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Cliente</td>
            <td>Fecha</td>
            <td>Información</td>
            <td>Monto</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
      @if(!$invoices->isEmpty())
       @foreach($invoices as $key => $value)
         <tr data-id="{{ $value->id }}" class="{{ $value->id }}">
            <td>{{ $value->id }}</td>
             <td>{{ $value->company->nombre }}</td>
             <td>{{date_format(date_create( $value->fecha), 'm/d/Y') }}</td>
             <td>{{ $value->informacion }}</td>
             <td>$ {{ $value->total }}</td>

             <!-- we will also add show, edit, and delete buttons -->
             <td>
               <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('invoices/' . $value->id) }}"></a>
                  <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              @if($value->estado!="2" && $value->estado!="4")
               <a class="glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="{{ URL::to('invoices/'. $value->id .'/edit') }}"></a>
              @endif
                 <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
               <a class="glyphicon glyphicon-save"  target="_blank" title="Descargar PDF" aria-hidden="true" href="{{ URL::to('invoices_pdf/' . $value->id) }}"></a>
            @if (Auth::user()->type=='admin')
              @if($value->estado!="4")
               <a class="btn-anular" title="Anular Factura" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></a>
              @endif
            @endif
             </td>
        </tr>
      @endforeach
    @endif
    </tbody>
</table>

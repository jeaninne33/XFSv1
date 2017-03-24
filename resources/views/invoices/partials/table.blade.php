<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Cliente</td>
            <td>Fecha</td>
            <td>Información</td>
            <td>Monto</td>
            <td>Aciones</td>
        </tr>
    </thead>
    <tbody>
      @if(!$invoices->isEmpty())
       @foreach($invoices as $key => $value)
         <tr data-id="{{ $value->id }}" class="{{ $value->id }}">
            <td>{{ $value->id }}</td>
             <td>{{ $value->company->nombre }}</td>
             <td>{{ $value->fecha }}</td>
             <td>{{ $value->informacion }}</td>
             <td>$ {{ $value->total }}</td>

             <!-- we will also add show, edit, and delete buttons -->
             <td>
                <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('invoices/' . $value->id.'/edit') }}"></a>
                 <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
               <a class="glyphicon glyphicon-save"  target="_blank" title="Descargar PDF" aria-hidden="true" href="{{ URL::to('invoices_pdf/' . $value->id) }}"></a>
            @if (Auth::user()->type=='admin')
               <a class="btn-delete" title="Eliminar" aria-hidden="true"><i class="glyphicon glyphicon-trash"></i></a>
             @endif
             </td>
        </tr>
      @endforeach
    @endif
    </tbody>
</table>

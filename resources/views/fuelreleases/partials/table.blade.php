
<table id="example2" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Fecha</td>
            <td>Cliente</td>
            <td>Proveedor</td>
            <td>Galones</td>
            <td>Tipo Areonave</td>
            <td>Aciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($fuel as $key => $value)
        <tr data-id="{{$value->id}}">
            <td>{{ $value->id }}</td>
            <td>{{ date_format(date_create(  $value->date), 'm/d/Y') }}</td>
            <td>{{ $value->cliente }}</td>
            <td>{{ $value->prove }}</td>
            <td>{{ $value->qty }}</td>
            <td>{{ $value->tipo }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-save"  target="_blank" title="Descargar PDF" aria-hidden="true" href="{{ URL::to('printfuelreleases/' . $value->id) }}"></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

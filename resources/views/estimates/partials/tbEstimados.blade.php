  <table id="example1" name="tbEstimates" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
            <td data-field="idServicio">ID</td>
              <td data-field="Servicio">Servicio</td>
              <td data-field="Descripcion">Descripcion</td>
              <td data-field="Cantidad">Cantidad</td>
              <td data-field="Precio">Precio</td>
              <td data-field="Subtotal">SubTotal</td>
              <td data-field="Ganancia">Ganancia</td>
              <td data-field="Total">Total</td>
              <td>Aciones</td>
          </tr>
      </thead>
      <tfoot>
             <tr>
                <th colspan="9" style="text-align:right"><input type="text"></th>
             </tr>
      </tfoot>
  </table>
  {{-- <input type="text" name="estimado[]" id="estimado"/> --}}
  {{-- <input type="button" onclick="saveEstimates()"/> --}}
  <div class="row">
    <div class="col-sm-2 col-md-2 pull-right">
      <label>Subtotal</label>
      <input readonly name="subtotal" id="subtotal" type="text" value="$0.00" class="input-text full-width">
      <label>Descuento</label>
      <input name="descuento" id="descuento" min="0" max="100" value="0%" type="text" class="input-text full-width" required="required">

      <label>Total Descuento</label>
      <input readonly name="totalDescuento" id="totalDescuento" value="$0.00" type="text" class="input-text full-width">
      <label>TOTAL</label>
      <input readonly name="total" id="total" type="text" class="input-text full-width" value="$0.00">
      <label>GANANCIA</label>
      <input readonly name="ganancia_total" id="gananciatotal" type="text" class="input-text full-width" value="$0.00">
    </div>
    </div>

  </div>

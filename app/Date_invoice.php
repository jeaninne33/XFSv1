<?php
namespace XFS;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Date_invoice extends Eloquent
   {
    protected $table ='dates_invoices';
    protected $fillable=['id','fecha_servicio','cantidad','descuento','precio','recarga','subtotal','subtotal_recarga',
'total','invoice_id','servicio_id','date_estimate_id'];

  public function invoice() {
       return $this->belongsTo('XFS\Invoice','id', 'invoice_id');
 }

 public function servicio() {
      return $this->belongsTo('XFS\Servicio', 'servicio_id','id');
}

}//fin clase

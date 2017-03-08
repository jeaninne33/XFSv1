<?php
namespace XFS;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Date_invoice extends Eloquent
   {
    protected $table ='dates_invoices';
    protected $fillable=['id','fecha_servicio','cantidad','descuento','precio','recarga','subtotal','subtotal_recarga',
'total','invoice_id','servicio_id'];

  public function invoice() {
       return $this->belongsTo('XF\Invoice','id', 'invoice_id');
 }
}//fin clase

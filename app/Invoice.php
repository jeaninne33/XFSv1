<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
     protected $table = 'invoices';
    // protected $fillable = ['nombre', 'pais_id'];
    protected $fillable=['id','fecha','plazo',
'fecha_vencimiento','localidad','resumen','fbo','categoria','descuento','ganancia','subtotal',
'total','prove_id','company_id','estimate_id','avion_id', 'informacion','estado'];

    public function company() {
		  return $this->belongsTo('XFS\Company','id', 'company_id');
	  }
    public function avion(){
       return $this->belongsTo('XFS\Avion','id','avion_id');
    }
    public function proveedor() {
      return $this->belongsTo('XFS\Company','id', 'prove_id');
    }
    
    public function estados($estado) {
      if($estado=='1'){
        return 'No pagado';
      }else if($estado=='2'){
          return 'Pagado';
      }else if($estado=='3'){
            return 'Pago Vencido';
      }
    }//fin metodp

}//fin clase

<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    //
     protected $table = 'estimates';
    // protected $fillable = ['nombre', 'pais_id'];
    protected $fillable=['id','fbo','fecha_soli',
'localidad','resumen','metodo_segui','info_segui','estado','proximo_seguimiento','cantidad_fuel','num_habitacion',
'tipo_hab','tipo_cama','tipo_estrellas','imagen','categoria','descuento','ganancia','subtotal','total',
'prove_id','company_id','avion_id'];
     public function company() {
		      return $this->belongsTo('XFS\Company','id', 'company_id');
	  }
}

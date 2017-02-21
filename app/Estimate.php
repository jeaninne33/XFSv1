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
    public function avion(){
      return$this->hasMany('XFS\Avion','id','avion_id');
    }
    public function date_estimates(){
      return $this->belongsTo('XFS\date_estimates','estimates_id','id');
    }
}

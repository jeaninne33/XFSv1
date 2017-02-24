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
		      return $this->belongsTo('XFS\Company', 'id','company_id');
	  }
    public function avion(){
      return$this->hasMany('XFS\Avion','id','avion_id');
    }
    public function date_estimates(){
      return $this->hasMany('XFS\date_estimates','estimate_id','id');
    }
    public function profit($cat) {
      if($cat=='0'){
        return 0.00;
      }else if($cat=='1'){
            return 0.10;
      }else if($cat=='2'){
            return 0.20;
      }else if($cat=='3'){
            return 0.30;
    }//fin metodp
}

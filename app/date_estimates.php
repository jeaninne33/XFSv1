<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class date_estimates extends Model
{
    protected $table ='dates_estimates';
    protected $fillable=['id','cantidad','descuento','precio','recarga','subtotal','subtotal_recarga',
  'total_recarga','total','estimate_id','servicio_id','categoria_id'];

  public function estimate() {
       return $this->belongsTo('XFS\Estimate', 'id','estimate_id');
  }
  public function servicio(){
    return $this->hasMany('XFS\Servicio','id','servicio_id');
  }
}//fin clase

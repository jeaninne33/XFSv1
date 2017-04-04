<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class date_estimates extends Model
{
    protected $table ='dates_estimates';
    protected $fillable=['id','cantidad','descuento','precio','recarga','subtotal','subtotal_recarga',
  'total','estimate_id','servicio_id'];

  public function estimate() {
       return $this->belongsTo('XFS\Estimate','estimate_id', 'id');
  }
 public function servicio() {
      return $this->belongsTo('XFS\Servicio', 'servicio_id','id');
}

}//fin clase

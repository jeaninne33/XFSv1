<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class date_estimates extends Model
{
    protected $table ='data_estimates';
    protected $fillable=['id','cantidad','descuento','precio','recarga','subtotal','subtotal_recarga',
  'total_recarga','total','estimate_id','servicio_id','categoria_id'];
}

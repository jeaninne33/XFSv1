<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
     protected $table = 'paises';
     protected $fillable = ['nombre'];

     public function estado() {
		    return $this->hasMany('XFS\Estado','id','pais_id');
	  }
}

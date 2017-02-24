<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    //
     protected $table = 'aviones';
     protected $fillable = ['tipo', 'matricula', 'licencia1','licencia2','registro','piloto1','piloto2','certificado','seguro'];

     public function company() {
		      return $this->belongsTo('XF\Company','id', 'company_id');
	  }
}

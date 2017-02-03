<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    //
     protected $table = 'estimates';
    // protected $fillable = ['nombre', 'pais_id'];

     public function company() {
		      return $this->belongsTo('XFS\Company','id', 'company_id');
	  }
}

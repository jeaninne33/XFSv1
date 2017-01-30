<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
     protected $table = 'estados';
     protected $fillable = ['nombre', 'pais_id'];

     public function pais() {
		      return $this->belongsTo('Pais', 'pais_id');
	  }
}

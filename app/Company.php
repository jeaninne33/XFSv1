<?php

namespace XFS;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Company extends Eloquent
   {
     protected $table = 'companys';


     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = ['nombre', 'correo', 'direccion','website','representante','ciudad','pais','codigop','telefono'];

   }

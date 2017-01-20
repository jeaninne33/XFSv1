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


     public function scopeBusqueda($query, $busqueda)
     {
      //dd("scope: ". $busqueda);//muestra los datos

        if(trim($busqueda)!=""){
            $query->where(\DB::raw("UPPER(nombre)"),"LIKE", \DB::raw("UPPER('%$busqueda%')"));
            // \DB::raw("UPPER(nombre)"),"LIKE", "UPPER(%$busqueda%)
            //where('nombre',"LIKE", "%$busqueda%");
         }
     }

   }

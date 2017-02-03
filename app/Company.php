<?php

namespace XFS;
use Illuminate\Database\Eloquent\Model as Eloquent;
use XFS/Avion;
use XFS/Pais;
use XFS/Estado;
class Company extends Eloquent
   {
     protected $table = 'companys';


     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = ['nombre', 'correo', 'direccion','website','representante','ciudad','pais','codigop','telefono'];

     public function aviones() {
		     return $this->hasMany('Avion');
	  }

    public function pais() {
        return $this->hasOne('Pais','id','pais_id');
    }
    public function estado() {
        return $this->hasOne('Estado','id','estado_id');
    }

     public function scopeBusqueda($query, $busqueda)
     {
      //dd("scope: ". $busqueda);//muestra los datos

        if(trim($busqueda)!=""){
          $query->where(\DB::raw("UPPER(nombre)"),"LIKE", \DB::raw("UPPER('%$busqueda%')"))->orWhere(\DB::raw("UPPER(direccion)"),"LIKE", \DB::raw("UPPER('%$busqueda%')"));
         }
     }
     public function scopeTipo($query, $relacion)
     {
      //dd("scope: ". $busqueda);//muestra los datos
        $tipo=config('options.relacion');
        if($relacion != "" && isset($tipo[$relacion])){
          $query->where('relacion', $relacion);
        }
     }

   }

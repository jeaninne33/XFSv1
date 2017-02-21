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
     protected $fillable = ['nombre', 'correo','cargo', 'direccion','website','tipo','estado_id','representante','ciudad','pais_id','codigop','telefono','telefono_admin','certificacion','banco','aba','cuenta','direccion_cuenta','categoria','servicio_disp'];

     public function aviones() {
		     return $this->hasMany('XFS\Avion', 'company_id', 'id');

    }
     public function servicios() {
        return $this->belongsToMany('XFS\Servicio', 'company_id', 'id')->withPivot('precio')->withTimestamps();
   }
   //
//'return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
    public function pais() {
        return $this->hasOne('XFS\Pais','id','pais_id');
    }
    public function estado() {
        return $this->hasOne('XFS\Estado','id','estado_id');
    }
    public function tipos($tipo) {
      if($tipo=='client'){
        return 'Cliente';
      }else if($tipo=='prove'){
          return 'Proveedor';
      }else if($tipo=='cp'){
            return 'Cliente/Proveedor';
      }
    }//fin metodp
    /**/
   }//fin clase company

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
     protected $fillable = ['nombre', 'correo','cargo', 'direccion','website','tipo','estado_id','representante','ciudad','pais_id','codigop','telefono','telefono_admin','certificacion','banco','aba','cuenta','direccion_cuenta','categoria','servicio_disp','contacto_admin'];

     public function aviones() {
		     return $this->hasMany('XFS\Avion', 'company_id', 'id');

    }
     public function servicios() {
        return $this->belongsToMany('XFS\Servicio', 'company_id', 'id')->withPivot('precio')->withTimestamps();
   }
   
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
    public static function obj_airplane($air, $avion) {
        $avion->tipo=$air['tipo'];
        $avion->matricula=$air['matricula'];
        $avion->licencia1=$air['licencia1'];
        $avion->piloto1=$air['piloto1'];
        if(isset($air["modelo"])){
            $avion->modelo=$air['modelo'];
        }
        if(isset($air["fabricante"])){
            $avion->fabricante=$air['fabricante'];
        }
        if(isset($air["nombre"])){
            $avion->nombre=$air['nombre'];
        }
        if(isset($air["licencia2"])){
            $avion->licencia2=$air['licencia2'];
        }
        if(isset($air["piloto2"])){
            $avion->piloto2=$air['piloto2'];
        }
        if(isset($air["certificado"])){
            $avion->certificado=$air['certificado'];
        }
        if(isset($air["seguro"])){
            $avion->seguro=$air['seguro'];
        }
        if(isset($air["registro"])){
            $avion->registro=$air['registro'];
        }
        return $avion;
    }//fin metodo añadir avion

    public static function validate_air($air) {
            $error= array();
      foreach ($air as $indice =>$array ) {
         $i=$indice+1;
         if(isset($array["id"])){//si ya  existe el id del avion en BD
           $id=$array["id"];
           if(isset($array["certificado"])){
                 $valid_certificado=Avion::where('certificado' , $array["certificado"])->where('id' ,'<>', $id)->count();
           }
           if(isset($array["matricula"])){
               $valid_matricula=Avion::where('matricula' , $array["matricula"])->where('id' ,'<>', $id)->count();
           }
           if(isset($array["licencia1"])){
            $valid_licencia1=Avion::where('licencia1' , $array["licencia1"])->where('id' ,'<>', $id)->count();
           }

         }else{//si no existe el avion
           if(isset($array["certificado"])){
                $valid_certificado=Avion::where('certificado' , $array["certificado"])->count();
           }
           if(isset($array["matricula"])){
              $valid_matricula=Avion::where('matricula' , $array["matricula"])->count();
           }
           if(isset($array["licencia1"])){
             $valid_licencia1=Avion::where('licencia1' , $array["licencia1"])->count();
           }
         }
          if((isset($array["tipo"]) && empty($array["tipo"])) || !isset($array["tipo"])){
            $error["tipo"]=["El campo Tipo de Avion #".$i." es Obligatorio"];
          }
          if ((isset($array["matricula"]) && empty($array["matricula"])) || !isset($array["matricula"])) {
             $error["matricula"]=["El campo Matricula de Avion #".$i." es Obligatorio"];
         }else if(!empty($valid_matricula)){
                $error["mdupli"]=["Ya existe la matricula del Avion#".$i." en la Base de Datos"];
        }
         if ((isset($array["licencia1"]) && empty($array["licencia1"])) || !isset($array["licencia1"])) {
              $error["licencia1"]=["El campo Licencia 1 de Avion #".$i." es Obligatorio"];
        }else if(!empty($valid_licencia1)){
            $error["lidupli"]=["Ya existe la licencia1 del Avion#".$i." en la Base de Datos"];
        }
        if ((isset($array["piloto1"]) && empty($array["piloto1"])) || !isset($array["piloto1"])) {
             $error["piloto1"]=["El campo Piloto1 de Avion #".$i." es Obligatorio"];
        }
        if (isset($array["certificado"])) {
             if(!empty($valid_certificado)){
                $error["cerdupli"]=["Ya existe el certificado del Avion#".$i." en la Base de Datos"];
             }
        }
      }//fin foreach
         return $error;
    }//fin metodp
   }//fin clase company

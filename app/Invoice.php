<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Invoice extends Model
{
    //
     protected $table = 'invoices';
    // protected $fillable = ['nombre', 'pais_id'];
    protected $fillable=['id','fecha','plazo',
'fecha_vencimiento','localidad','resumen','fbo','categoria','descuento','ganancia','subtotal',
'total','prove_id','company_id','estimate_id','avion_id', 'informacion','estado','metodo_pago','fecha_pago'];

    public function company() {
		  return $this->belongsTo('XFS\Company','id', 'company_id');
	  }
    public function avion(){
       return $this->belongsTo('XFS\Avion','id','avion_id');
    }
    public function proveedor() {
      return $this->belongsTo('XFS\Company','id', 'prove_id');
    }
    public function datos() {
        return $this->hasMany('XFS\Date_invoice', 'invoice_id', 'id');
   }

    public function estados($estado) {
      if($estado=='1'){
        return 'No pagado';
      }else if($estado=='2'){
          return 'Pagado';
      }else if($estado=='3'){
            return 'Pago Vencido';
      }
    }//fin metodp
    public static function validate_items($item) {
      $error= array();
      foreach ($item as $indice =>$array ) {
         $i=$indice+1;
         if((isset($array["servicio_id"]) && empty($array["servicio_id"])) || !isset($array["servicio_id"])){
            $error["servicio"]=["El campo Servicio del item #".$i." es Obligatorio"];
          }
          if ((isset($array["fecha_servicio"]) && empty($array["fecha_servicio"])) || !isset($array["fecha_servicio"])) {
             $error["fecha_servicio"]=["El campo Fecha del Servicio del item #".$i." es Obligatorio"];
         }
         if ((isset($array["cantidad"]) && empty($array["cantidad"])) || !isset($array["cantidad"])) {
              $error["cantidad"]=["El campo Cantidad del item #".$i." es Obligatorio"];
        }
        if ((isset($array["precio"]) && empty($array["precio"])) || !isset($array["precio"])) {
             $error["precio"]=["El campo Precio del item #".$i." es Obligatorio"];
        }
      }//fin foreach
         return $error;

    }
    public static function obj_item($dato, $item) {
        $item->tipo=$dato['fecha_servicio'];
        $item->matricula=$dato['servicio_id'];
        $item->licencia1=$dato['cantidad'];
        $item->piloto1=$dato['precio'];
        if(isset($dato["modelo"])){
            $item->modelo=$dato['modelo'];
        }
        if(isset($dato["fabricante"])){
            $item->fabricante=$dato['fabricante'];
        }
        if(isset($dato["nombre"])){
            $item->nombre=$dato['nombre'];
        }
        if(isset($dato["licencia2"])){
            $item->licencia2=$dato['licencia2'];
        }
        if(isset($dato["piloto2"])){
            $item->piloto2=$dato['piloto2'];
        }
        if(isset($dato["certificado"])){
            $item->certificado=$dato['certificado'];
        }
        if(isset($dato["seguro"])){
            $item->seguro=$dato['seguro'];
        }
        if(isset($dato["registro"])){
            $item->registro=$dato['registro'];
        }
        return $item;
    }//fin metodo añadir avion

}//fin clase

<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DateTime;
class Invoice extends Model
{
    //
     protected $table = 'invoices';
    // protected $fillable = ['nombre', 'pais_id'];
    protected $fillable=['id','fecha','plazo',
'fecha_vencimiento','localidad','resumen','fbo','categoria','descuento','ganancia','subtotal',
'total','prove_id','company_id','estimate_id','avion_id', 'informacion','estado','metodo_pago','fecha_pago', 'total_descuento'];

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
    public function categoria($a) {
      //alert(a);
      if($a=='0'){
        return 0.00;
      }else if($a=='1'){
          return 20;
      }else if($a=='2'){
            return 25;
      }else if($a=='3'){
           return 30;
      }
       //alert($scope.data_invoices[index].cantidad);
    }

    public static function validate_dates($datos) {
      $fecha=date("Y-m-d");
    //  dd(date_format(new DateTime($datos["fecha"]), 'Y-m-d')<$fecha);
      $error= array();
      if((isset($datos["fecha"])) && ((date_format(new DateTime($datos["fecha"]), 'Y-m-d'))>$fecha)){
        $error["fecha"]=["La Fecha de la Factura no puede ser mayor a la fecha actual"];
      }
      if( (isset($datos["fecha_vencimiento"])) && ( (date_format(new DateTime($datos["fecha_vencimiento"]), 'Y-m-d'))< (date_format(new DateTime($datos["fecha"]), 'Y-m-d')))){
       $error["fecha_vencimiento"]=["La Fecha de Vencimiento no puede ser menor a la Fecha de la Factura "];
      }
      if((isset($datos["fecha_pago"])) && ((date_format(new DateTime($datos["fecha_pago"]), 'Y-m-d'))<(date_format(new DateTime($datos["fecha_vencimiento"]), 'Y-m-d')))){
      $error["fecha_pago"]=["La Fecha de Pago no puede ser mayor a la Fecha de Vencimiento"];
      }
      return $error;
    }

    public static function validate_items($item) {
      $fecha=date("Y-m-d");
    // dd($fecha);
      $error= array();
      foreach ($item as $indice =>$array ) {
         $i=$indice+1;
         if((isset($array["servicio_id"]) && empty($array["servicio_id"])) || !isset($array["servicio_id"])){
            $error["servicio"]=["El campo Servicio del item #".$i." es Obligatorio"];
          }
          if ((isset($array["fecha_servicio"]) && empty($array["fecha_servicio"])) || !isset($array["fecha_servicio"])) {
             $error["fecha_servicio"]=["El campo Fecha del Servicio del item #".$i." es Obligatorio"];
         }
         if((isset($array["fecha_servicio"])) && (date_format(new DateTime($array["fecha_servicio"]), 'Y-m-d')>$fecha)){
            $error["fecha_servicio"]=["La Fecha del Servicio del item #".$i." no puede ser mayor a la fecha actual"];
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
        $item->servicio_id=$dato['servicio_id'];
        $item->cantidad=$dato['cantidad'];
        $item->descripcion=$dato['descripcion'];
        $item->precio=$dato['precio'];
        $item->fecha_servicio=$dato['fecha_servicio'];
        $item->recarga=$dato['recarga'];
        $item->subtotal=$dato['subtotal'];
        $item->subtotal_recarga=$dato['subtotal_recarga'];
        $item->total=$dato['total'];
        $item->descuento=0.0;
        return $item;
    }//fin metodo añadir avion

}//fin clase

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
		  return $this->belongsTo('XFS\Company','company_id','id');
	  }
    public function avion(){
       return $this->belongsTo('XFS\Avion','avion_id', 'id');
    }
    public function proveedor() {
      return $this->belongsTo('XFS\Company','prove_id','id' );
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
    public function information_invoice($fecha1, $fecha2, $op,&$inv) {
      $interval=date_diff($fecha1,$fecha2);
      $dias= $interval->format('%R%a');
      //dd($dias);
      $d="";
      if($op=='1'){
        //return 'No pagado';
        $val1="Vencio";
        $val2="Vence";
      }else{
        $val1="Pagado";
        $val2="Pago";
      }
      //  dd($estado);
     if($dias>1){//si aun no se ha vencido
        $d="Vence en ".$interval->format('%a Días');
        $estado=1;
    }else if($dias==0){//si se vence mañana
        $d=$val2." Hoy";
        $estado=1;
     }else  if( $dias<-1){//si tiene mas de un día de vencida
        //$interval=date_diff($fecha_venci, $date);
       $d=$val1." hace ".$interval->format('%a Días');
       $estado=3;
      }else if($dias==1){//si se vence mañana
        $d=$val2." Mañana";
        $estado=1;
      }else if($dias==-1){//si se vencio ayer
         $d=$val1." Ayer";
         $estado=3;
        // dd($d);
      }
      if($op=='2'){
        $estado=2;
      }
       $inv->estado=$estado;
    //  dd($inv->estado);
      return $d;

    }//fin metodp
    public function validate_float($num) {
      $patron="/^0[.]{0,1}[0-9]{0,2}$/";
    //  /^\d{1,2}(\.\d{1,2})?$/ patron con 2 entreros y dos decimales
        if (preg_match($patron, $num)){
         return true;
        }else{
           if ($num==1){
               return true;
           }else{
             return false;
           }
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

    public static function validate_dates($datos,$opc) {
      $fecha=date("Y-m-d");
    //  dd(date_format(new DateTime($datos["fecha"]), 'Y-m-d')<$fecha);
      $error= array();
       $valid_duplicate=Invoice::where('estimate_id' , $datos["estimate_id"])->count();
      if((isset($datos["estimate_id"])) && ((date_format(new DateTime($datos["fecha"]), 'Y-m-d'))>$fecha)){
      }
      if((isset($datos["fecha"])) && (!empty($valid_duplicate) && $opc==1)){
        $error["duplicate"]=["Registro Duplicado! Ya existe la factura para el estimado Numero: ".$datos["estimate_id"]];
      }else{
        if((isset($datos["fecha"])) && ((date_format(new DateTime($datos["fecha"]), 'Y-m-d'))>$fecha)){
          $error["fecha"]=["La Fecha de la Factura no puede ser mayor a la fecha actual"];
        }
        if( (isset($datos["fecha_vencimiento"])) && ( (date_format(new DateTime($datos["fecha_vencimiento"]), 'Y-m-d'))< (date_format(new DateTime($datos["fecha"]), 'Y-m-d')))){
         $error["fecha_vencimiento"]=["La Fecha de Vencimiento no puede ser menor a la Fecha de la Factura "];
        }
        // if((isset($datos["fecha_pago"])) && ((date_format(new DateTime($datos["fecha_pago"]), 'Y-m-d'))>(date_format(new DateTime($datos["fecha_vencimiento"]), 'Y-m-d')))){
        //   $error["fecha_pago"]=["La Fecha de Pago no puede ser mayor a la Fecha de Vencimiento"];
        // }
        if((isset($datos["fecha_pago"])) && ((date_format(new DateTime($datos["fecha_pago"]), 'Y-m-d'))>$fecha)){
          $error["fecha_pago"]=["La Fecha de Pago no puede ser mayor a la Fecha Actual"];
        }
      }
      return $error;
    }

    public static function validate_items($item) {
      $fecha=date("Y-m-d");
    // dd($fecha);
    $error= array();
      foreach ($item as $indice =>$array ) {
         $i=$indice+1;
         $patron="/^[0-9]+(\.[0-9]{1,2})?$/";
       //  /^\d{1,2}(\.\d{1,2})?$/ patron con 2 entreros y dos decimales
       //   /^0[.]{0,1}[0-9]{0,2}$/
         if((isset($array["servicio_id"]) && empty($array["servicio_id"])) || !isset($array["servicio_id"])){
            $error["servicio".$i]=["El campo Servicio del item #".$i." es Obligatorio"];
          }
          if ((isset($array["fecha_servicio"]) && empty($array["fecha_servicio"])) || !isset($array["fecha_servicio"])) {
             $error["fecha_servicio".$i]=["El campo Fecha del Servicio del item #".$i." es Obligatorio"];
         }
         if((isset($array["fecha_servicio"])) && (date_format(new DateTime($array["fecha_servicio"]), 'Y-m-d')>$fecha)){
            $error["fecha_servicio1".$i]=["La Fecha del Servicio del item #".$i." no puede ser mayor a la fecha actual"];
         }
         if (isset($array["cantidad"]) && !preg_match("/^\d+$/",$array["cantidad"])) {
              $error["cantidad".$i]=["El campo Cantidad del item #".$i." debe ser numérico"];
        }
        if ((isset($array["cantidad"]) && empty($array["cantidad"])) || !isset($array["cantidad"])) {
             $error["cantidad1".$i]=["El campo Cantidad del item #".$i." es Obligatorio"];
       }
        if ((isset($array["precio"]) && empty($array["precio"])) || !isset($array["precio"])) {
             $error["precio".$i]=["El campo Precio del item #".$i." es Obligatorio. Debe introducir un decimal con 2 caracteres (Solo admite el .)"];
        }
        if (isset($array["precio"]) && !preg_match($patron,$array["precio"])) {
             $error["precio1".$i]=["El Precio del item #".$i." es Invalido! Debe introducir un decimal con 2 caracteres (Solo admite el .)"];
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

<?php

namespace XFS;

use Illuminate\Database\Eloquent\Model;
use DateTime;
class Estimate extends Model
{
    //
     protected $table = 'estimates';
    // protected $fillable = ['nombre', 'pais_id'];
    protected $fillable=['id','fbo','fecha_soli',
'localidad','resumen','metodo_segui','info_segui','estado','proximo_seguimiento','cantidad_fuel','num_habitacion',
'tipo_hab','tipo_cama','tipo_estrellas','imagen','categoria','descuento','total_descuento','ganancia','subtotal','total',
'prove_id','company_id','avion_id'];

    public function date_estimates(){
      return $this->hasMany('XFS\date_estimates','estimate_id','id');
    }


    public function company() {
      return $this->belongsTo('XFS\Company','company_id','id');
    }
    public function avion(){
       return $this->belongsTo('XFS\Avion','avion_id', 'id');
    }
    public function proveedor() {
      return $this->belongsTo('XFS\Company','prove_id','id' );
    }

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
    public static function validate_file($file){
        $error= array();
      if($file['size']>=2000000){
         $error["size"]=["El tamaño del archivo del estimado no puede ser superior a 2MB"];
      }
      if($file['type']!="application/pdf" && $file['type']!="image/jpeg" && $file['type']!="image/png" && $file['type']!="image/gif"){
           $error["type"]=["Formato invalido en el Archivo del estimado! formatos permitidos: .png, .jpeg, .jpg y .pdf"];
      }
      return $error;
    }
    public static function name_file($file){

    }

    public static function validate_dates($datos,$opc) {
      $fecha=date("Y-m-d");
      $error= array();
       $valid_duplicate=Estimate::where('company_id' , $datos["company_id"])->where('prove_id',$datos["prove_id"])->where('fecha_soli',$datos["fecha_soli"])->where('estado','<>','Cancelado')->count();

      if((!empty($valid_duplicate) && $opc==1)){
        $error["duplicate"]=["Registro Duplicado! Ya existe un estimado para la Fecha Solicitada con el mismo cliente y proveedor"];
      }else{
        if((isset($datos["fecha_soli"])) && ((date_format(new DateTime($datos["fecha_soli"]), 'Y-m-d'))>$fecha)){
          $error["fecha"]=["La Fecha de Solicitud no puede ser mayor a la fecha actual"];
        }
        if( (isset($datos["proximo_seguimiento"])) && ( (date_format(new DateTime($datos["proximo_seguimiento"]), 'Y-m-d'))< (date_format(new DateTime($datos["fecha_soli"]), 'Y-m-d')))){
         $error["fecha_vencimiento"]=["La Fecha del Proximo Seguimiento no puede ser menor a la de Solicitud"];
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
        $item->precio=$dato['precio'];
        $item->recarga=$dato['recarga'];
        $item->subtotal=$dato['subtotal'];
        $item->subtotal_recarga=$dato['subtotal_recarga'];
        $item->total=$dato['total'];
        $item->descuento=0.0;
        return $item;
    }//fin metodo añadir avion

    public static function categoria($a) {
      //alert(a);
      if($a=='0'){
        return '0%';
      }else if($a=='1'){
          return '20 %';
      }else if($a=='2'){
            return '25 %';
      }else if($a=='3'){
           return '30 %';
      }
       //alert($scope.data_invoices[index].cantidad);
    }
    public function estadosEN($estado) {
      if($estado=='Pendiente'){
        return 'Pending';
      }else if($estado=='Aceptado'){
          return 'Accepted';
      }else if($estado=='Rechazado'){
            return 'Rejected';
      }else if($estado=='Cancelado'){
                return 'Canceled';
      }
    }
}//fin clase

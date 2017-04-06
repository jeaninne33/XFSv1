<?php
namespace XFS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DateTime;
use XFS\Audit;
use Auth;

class FuelRelease extends Model
{
  protected $table = 'fuelreleases';
 // protected $fillable = ['nombre', 'pais_id'];
 protected $fillable=['id','flight_purpose','operator','release_ref',
'ref','phone','flight_number','eta','etd','handling','into_plane','into_plane_phone','cf_card','estimate_id'];

 public function estimate() {
   return $this->belongsTo('XFS\Estimate','estimate_id','id');
 }
 public static function validate_dates($datos,$opc) {
   $fecha=date("Y-m-d");
   $error= array();

     if((isset($datos["date"])) && ((date_format(new DateTime($datos["date"]), 'Y-m-d'))>$fecha)){
       $error["date"]=["La Fecha Requested Date no puede ser mayor a la fecha actual"];
     }
    //  if((isset($datos["etd"])) && ((date_format(new DateTime($datos["date"]), 'Y-m-d'))>$fecha)){
    //    $error["etd"]=["La Fecha de etd no puede ser mayor a la fecha actual"];
    //  }
    //  if( (isset($datos["etd"])) && ( (date_format(new DateTime($datos["proximo_seguimiento"]), 'Y-m-d'))< (date_format(new DateTime($datos["fecha_soli"]), 'Y-m-d')))){
    //   $error["fecha_vencimiento"]=["La Fecha del Proximo Seguimiento no puede ser menor a la de Solicitud"];
    //  }

   return $error;
 }

}

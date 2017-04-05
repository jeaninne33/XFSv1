<?php

namespace XFS\Http\Requests;

use XFS\Http\Requests\Request;
use Iluminate\Routing\Route;

class EditEstimateRequest extends Request
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
         'company_id'=> 'required',
         'prove_id'=> 'required',
         'estado'=> 'required|max:250',
          'fecha_soli' => 'required|date',
          'metodo_segui'      => 'required|max:140',
          'info_segui' => 'required|max:140',
          'proximo_seguimiento'=> 'required|date',
          'resumen'=> 'max:500',
          'fbo'=> 'required|max:150',
          'cantidad_fuel'=> 'required|numeric',
          'localidad'=> 'required|max:140',
          'avion_id'=> 'required',
          'num_hab'=> 'numeric',
          'tipo_hab'=> 'max:200',
          'tipo_cama'=> 'max:200',
          'tipo_estrellas'=> 'max:200',
          // 'imagen'=> 'required|max:200',
          'categoria'=> 'required|numeric',
          'descuento'=> 'required|numeric',
          'ganancia'=> 'required|numeric',
          'subtotal'=> 'required|numeric',
          'total'=> 'required|numeric',


        ];
    }
    public function messages()
  {
    return [
        'company_id.required'=> 'El campo Cliente es obligatorio',
        'prove_id.required'=> 'El campo Proveedor es obligatorio',
        'metodo_segui.required'=> 'El campo Metodo de Seguimiento es obligatorio',
        'info_segui.required'=> 'El campo Información de Seguimiento es obligatorio',
        'fecha_soli.required'=> 'El campo Fecha de Solicitud es obligatorio',
        'proximo_seguimiento.required' => 'El campo Fecha del proximo Seguimiento es Obligatorio',
        'avion_id.required' => 'El campo Tipo de Areonave es Obligatorio',
        'cantidad_fuel.required' => 'El campo Cantidad aproximada de Combustible es Obligatorio',
        'cantidad_fuel.numeric'=>' El campo Cantidad aproximada de Combustible debe ser numérico.',
    ];
 }
}

<?php

namespace XFS\Http\Requests;

use XFS\Http\Requests\Request;
use Iluminate\Routing\Route;

class CrearInvoicesRequest extends Request
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
            'fecha' => 'required|date',
            'plazo'      => 'required',
            'fecha_vencimiento'=> 'required|date',
            'localidad'=> 'required|max:140',
            'resumen'=> 'max:500',
            'fbo'=> 'required|max:150',
            'categoria'=> 'required|numeric',
            'descuento'=> 'required|numeric',
            'ganancia'=> 'required|numeric',
            'subtotal'=> 'required|numeric',
            'total'=> 'required|numeric',
            'prove_id'=> 'required',
            'company_id'=> 'required',
            'estimate_id'=> 'required',
            'avion_id'=> 'required',
            'informacion'=> 'max:150',
            'estado'=> 'required|max:250',
            'fecha_pago'=> 'date',
            'metodo_pago'=> 'max:250',
        ];
    }
          public function messages()
        {
          return [
              'fecha.required'=> 'El campo Fecha de la Factura es obligatorio',
              'fecha_vencimiento.required' => 'El campo Fecha de Vencimientos es obligatorio',
              'fecha.date'=> 'La Fecha de la Factura no corresponde con el formato Y-m-d',
          ];
       }
}

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
            'fecha' => 'required|date|date_format:Y-m-d',
            'plazo'      => 'required',
            'fecha_vencimiento'=> 'required|date|date_format:Y-m-d',
            'localidad'=> 'required|max:140',
            'resumen'=> 'required|max:500',
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
        ];
    }
}

<?php

namespace XFS\Http\Requests;

use Illuminate\Http\Request;

class CrearCompanysRequest extends Request
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
            'nombre'       => 'required|unique:companys,nombre',
            'correo' => 'required|email|unique:companys,correo',
            'direccion'      => 'required',
            'representante'=> 'required',
            'telefono'=> 'required|numeric|max:12',
        ];
    }
}

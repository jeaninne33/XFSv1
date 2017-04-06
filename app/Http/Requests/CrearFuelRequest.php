<?php

namespace XFS\Http\Requests;

use XFS\Http\Requests\Request;
use Iluminate\Routing\Route;

class CrearFuelRequest extends Request
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
         'handling'=> 'required|max:70',
         'flight_purpose'=> 'required|max:70',
         'operator'=> 'max:70',
          'ref' => 'required|max:70',
          'flight_number'  => 'required|max:70',
          'cf_card' => 'required|max:140',
          'date'=> 'required|date',
          'eta'=> 'required|date',
          'etd'=> 'required|date',
          'into_plane'=> 'required|max:500',
          'qty'=> 'required|numeric',
          'into_plane_phone'=> 'max:70',
          'estimate_id'=> 'required',
          'company_id'=> 'required',
        ];
    }
    public function messages()
  {
    return [
        'cf_card.required'=> 'El campo Ref Info # es obligatorio',
    ];
 }
}

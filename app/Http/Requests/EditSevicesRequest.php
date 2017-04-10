<?php

namespace XFS\Http\Requests;

use XFS\Http\Requests\Request;
use Iluminate\Routing\Route;

class EditSevicesRequest extends Request
{

  public function _construc(Route $route){
        $this->route=$route;
      //var_dump(($this->route->getParameter('companys')));
  }
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
        'nombre'       => 'required|max:100|unique:servicios,nombre,'.$this->route('servicios'),
        'descripcion' => 'required|max:500',
        'categoria_id'  => 'required',
        ];
    }
    public function messages()
  {
    return [
        'categoria_id.required'=> 'El campo categoria es obligatorio',
    ];
 }
}

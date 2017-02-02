<?php

namespace XFS\Http\Requests;

use XFS\Http\Requests\Request;
use Iluminate\Routing\Route;

class CrearCompanysRequest extends Request
{
  public function _construc(Route $route){
        $this->route=$route;
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
      dd($this->route->getParameter('companys'));
        return [
          'nombre' => 'required||max:100|unique:companys,nombre,'.$this->route->getParameter('companys'),
          'correo' => 'required|email|max:100|unique:companys,correo,'.$this->route->getParameter('companys'),
          'direccion'=> 'required|max:500',
          'website'=> 'max:50',
          'representante'=> 'required|max:100',
          'ciudad'=> 'required|max:50',
          'codigop'=> 'max:7',
          'telefono'=> 'required|numeric|min:6|max:12',
          'tipo_prove'=> 'in:Fuel/Handling,FBO/Handler,Broker,Supplier|required_if:tipo,prove',
          'certificacion'=> 'max:100',
          'contacto_admin'=> 'max:100',
          'celular'=> 'min:6|max:12',
          'correo_admin'=> 'email|max:70',
          'telefono_admin'=> 'min:6|max:70',
          'banco'=> 'max:50',
          'cuenta'=> 'max:50',
          'direccion_cuenta'=> 'max:50',
          'aba'=> 'max:50',
          'tipo'=> 'required|in:client,prove,cp',
          'cargo'=> 'required|max:50',
          'categoria'=> 'required_if:tipo,client',
          'servicio_disp'=> 'max:100',
          'estado_id'=> 'required',

        ];
    }
}

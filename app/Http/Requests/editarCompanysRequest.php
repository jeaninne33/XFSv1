<?php

namespace XFS\Http\Requests;

use XFS\Http\Requests\Request;
use Iluminate\Routing\Route;


class editarCompanysRequest extends Request
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
          'nombre' => 'required||max:100|unique:companys,nombre,'.$this->route('companys'),
          'correo' => 'required|email|max:100|unique:companys,correo,'.$this->route('companys'),
          'direccion'=> 'required|max:500',
          'direccion_factura'=> 'required|max:500',
          'website'=> 'max:50',
          'representante'=> 'required|max:100',
          'pais_id'=> 'required',
          'ciudad'=> 'required|max:50',
          'codigop'=> 'max:7',
          'telefono'=> 'numeric|min:6',
          'tipo_prove'=> 'in:Fuel/Handling,FBO/Handler,Broker,Supplier|required_if:tipo,prove,cp',
          'certificacion'=> 'max:100',
          'contacto_admin'=> 'max:100',
          'celular'=> 'min:6|max:12',
          'correo_admin'=> 'email|max:70',
          'telefono_admin'=> 'required|numeric|min:6',
          'banco'=> 'max:50',
          'cuenta'=> 'max:50',
          'direccion_cuenta'=> 'max:50',
          'aba'=> 'max:50',
          'tipo'=> 'required|in:client,prove,cp',
          'cargo'=> 'required|max:50',
          'categoria'=> 'required_if:tipo,client,cp',
          'servicio_disp'=> 'max:100',
          'estado_id'=> 'required',

        ];
    }
    public function messages()
  {
    return [
      'pais_id.required'=> 'El campo Pais es obligatorio',
      'telefono_admin.required'=> 'El campo Teléfono de los Datos Operacionales es obligatorio',
      'telefono_admin.numeric'=> 'El campo Teléfono de los Datos Operacionales debe ser numérico',
      'telefono_admin.min'=> 'El campo Teléfono de los Datos Operacionales debe tener almenos 6 digitos',
      'codigop.max' => 'El campo Codigo Postal tiene un maximo de 7 caracteres',
      'tipo_prove.in'=> 'El campo Tipo de Provedor no corresponde a las opciones',
      'tipo_prove.required_if'=> 'El campo Tipo de Provedor es obligatorio cuando el Tipo de Relacion es proveedor o cliente/proveedor',
      'categoria.required_if'=> 'El campo Categoria del Cliente es obligatorio cuando el Tipo de Relacion es Cliente o cliente/proveedor',
      'direccion_cuenta.max'=> 'El campo Direccion Cuenta tiene un maximo de 500 caracteres',
      'direccion_factura.required'=> 'El campo Direccion de Factura es obligatorio',
      'direccion_factura.max'=> 'El campo Direccion de Factura tiene un maximo de 500 caracteres',
    ];
 }
}

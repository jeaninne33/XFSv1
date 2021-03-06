<?php

namespace XFS\Http\Controllers\Auth;

use XFS\User;
use Auth;
use Redirect;
use Validator;
use Session;
use XFS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Requests;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    //entre comillas la ruta a la que deseas redireccionar
    //protected $redirectTo = '/';

    public function showLogin()
   {
       // Verificamos si hay sesión activa
       if (Auth::check())
       {
           // Si tenemos sesión activa mostrará la página de inicio
             return Redirect::intended('/principal');
       }
       // Si no hay sesión activa mostramos el formulario

   }
    public function postLogin(Request $request)
    {

      $data=$request->all();
      $band=true;
      $error= array();
      //dd((!isset($data["email"]) && empty($data["email"]));
      if( !isset($data["email"]) || !isset($data["password"]) || (isset($data["email"]) && empty($data["email"]))  || (isset($data["password"]) && empty($data["password"])) ){
        $band=false;
        $error['campos'] =['Debe introducir el correo y la contraseña!'];
      }else{
        $datas = [
              'email' => $data["email"],
              'password' => $data["password"]
          ];
            // Verificamos los datos
          if (!Auth::attempt($datas, Input::get('remember'))) // Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
          {
          // Si nuestros datos no son correctos
            $band=false;
            $error['message'] =['El Correo Electrónico o la Contraseña son invalidos!'];
          }
      }
      if(!$band){

        return response()->json($error,401);
      }
        //Session::flash('flash_message', '');
        // Si los datos no son los correctos volvemos al login y mostramos un error
        //return Redirect::back();
    }
    public function logOut()
    {
        // Cerramos la sesión
        Auth::logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return redirect()->route('/');
        //return Redirect::to('/')->with('error_message', 'Logged out correctly');
    }
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

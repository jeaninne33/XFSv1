<?php

namespace XFS\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     protected $auth;

     /**
      * Create a new middleware instance.
      *
      * @param  Guard  $auth
      * @return void
      */
     public function __construct(Guard $auth)
     {
         $this->auth = $auth;
     }

    public function handle($request, Closure $next)
    {//Auth::user()->type
      // return $next($request);
      //dd($this->auth->guest());
      if ($this->auth->guest()) {
            return redirect()->guest('login');
      }else{
        if ( $this->auth->user()->type === 'admin')
         {
           return $next($request);
         }else{
           //return redirect()->to('principal');
           $msj='
           <div class="alert alert-danger alert-dismissable">
              <strong>¡Vaya!</strong> Hubo algunos problemas con la solicitud.<br><br>
                 <p><strong><h4 > ¡No tienes Permisos para entrar a este modulo! </h4></strong></p>
           </div>
           ';
           return response( $msj, 401);
         }
      }
       //return $next($request);
    }
}

<?php

namespace XFS\Http\Middleware;

use Closure;
use Auth;
class admin_contador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       return $next($request);
    /*  if ( !Auth->user()->type === 'admin' || !Auth->user()->type === 'contador' )
       {
         //$this->auth->logout();
           if ($request->ajax())
           {
               return response('No Autorizado.', 401);
           }
           else
           {
               return redirect()->to('principal');
           }
       }*/
    }
}

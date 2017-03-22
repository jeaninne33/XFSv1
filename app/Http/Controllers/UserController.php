<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XFS\Http\Requests\CrearCompanysRequest;
use XFS\Http\Requests\editarCompanysRequest;
use XFS\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function index()
     {
           $users = User::orderBy('name')->get();
          return  view('users.index', compact('users'));

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    //CrearCompanys
    //Request $request
   public function store(Request $request)
   {
     $this->validate($request, [
       'name' => 'required|max:255|unique:users',
       'email' => 'required|email|max:255|unique:users,email',
       'password' => 'required|confirmed|min:6',
     ]);

     $data=$request->all();
     User::create([
         'name' => $data['name'],
         'email' => $data['email'],
         'password' => bcrypt($data['password']),
         'type' => $data['type'],
        'remember_token' => str_random(100),
     ]);
     $result=['message' => 'bien', 'error'=> 'nada'];
     return response()->json($result);
   }//fin store
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      return  view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|max:255|unique:users,name,'.$id,
        'email' => 'required|email|max:255|unique:users,email,'.$id,
        'password' => 'required|confirmed|min:6',
      ]);

      $data=$request->all();
      User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'type' => $data['type'],
         'remember_token' => str_random(100),
      ]);
      $result=['message' => 'bien', 'error'=> 'nada'];
      return response()->json($result);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
       // abort(500);
        $user=User::findOrFail($id);
        $mensaje='El Usuario: <b>'.$user->name.'</b> fue eliminado Exitosamente';
        if (!is_null($user)) {
            $user->delete();
            if($request->ajax()){
                return $mensaje;
            }
           return redirect()->route('users.index')
                 ->with('success', $mensaje);
       }
    }//fin destroy


}

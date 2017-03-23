<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Mail;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function send(Request $request)
    {
      //dd($request);
      $data=$request->all();
      Mail::send('Mail.mail',$data,function($mjs)use($request)
      {
        $mjs->to('josmer@xflightsupport.com');
        $mjs->subject($request->subject);
        //$mjs->body($request->body);
      });
      //Session:flash('success','Correo Enviado');
      $mensaje="Correo Enviado";

      return response()->json($mensaje);
    }

    public function store(Request $request)
    {
        Mail::send('estimates.create',$request->all(),function($mjs){
          $mjs->to('josmer@xflightsupport.com');
        });
        //Session:flash('success','Correo Enviado');
        $mensaje="Correo Enviado";
        return response()->json($mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

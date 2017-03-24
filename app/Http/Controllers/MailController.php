<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Mail;
use Storage;
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
      //dd($request['formData']);
       dd($request->email('email'));
    //   $d=$request->destinatario('destinatario');
      // dd($d);

        $pathToFile="";
        $containfile=false;
        if($request->hasFile('file') ){
          dd($file->getClientOriginalName());
           $containfile=true;
           $file = $request->file('file');
           $nombre=$file->getClientOriginalName();
           $pathToFile= storage_path('app') ."/". $nombre;
        }


        $destinatario=$request->email;
        $asunto=$request->subject;
        $contenido=$request->body;
    //    dd($destinatario);

        $data = array('contenido' => $contenido);
        $r= Mail::send('Mail.mail', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
          //  $message->from('plusispruebas@gmail.com', 'plusis');
            $message->to($destinatario)->subject($asunto);
           if($containfile){
            $message->attach($pathToFile);
            }

        });

        if($r){
                 if($containfile){ Storage::disk('local')->delete($nombre); }
                 $mjs="Correo Enviado Correctamente";
                return response()->json($mjs);
                  // view("mensajes.msj_correcto")->with("msj","Correo Enviado correctamente");
        }
        else
        {
          $mjs="Correo No Enviado";
          return response()->json($mjs);
             //eturn view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
        }



      //dd($request);
      // $data=$request->all();
      // Mail::send('Mail.mail',$data,function($mjs)use($request)
      // {
      //   $mjs->to('josmer@xflightsupport.com');
      //   $mjs->subject($request->subject);
      //   //$mjs->body($request->body);
      // });
      // //Session:flash('success','Correo Enviado');
      // $mensaje="Correo Enviado";
      //
      // return response()->json($mensaje);
    }

    public function store(Request $request)
    {
      if($request->hasFile('file') ){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $nombre=$file->getClientOriginalName();
            $r= Storage::disk('local')->put($nombre,  \File::get($file));


             }
             else{

                return "no";
             }

            if($r){
                return $nombre ;
            }
            else
            {
                return "error vuelva a intentarlo";
            }

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

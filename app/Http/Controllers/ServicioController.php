<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use XFS\Servicio;
use XFS\Categoria;
use DB;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      /*$servicios = Servicio::busqueda(
        $request->get(''))
      ->tipo($request->get('relacion'))
      ->orderBy('id','DESC')->paginate(5);*/
    $servicio = Servicio::with('categoria')->get();
     /*$servicios = DB::table('servicios')
  	->join('categorias', 'categorias.id', '=', 'servicios.categoria_id', 'inner', true)
  	->select('servicios.id', 'servicios.nombre', 'servicios.descripcion', 'categorias.nombre as nbCategoria')
  	->get();*/
      // load the view and pass the nerds
      return view('servicios.index')->with('servicio',$servicio);
      //return view('principal',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categorias = Categoria::Lists('nombre','id');
      $categorias->prepend('Seleccione ');
      return view('servicios.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre'       => 'required|unique:servicios,nombre',
      'descripcion' => 'required',
      'categoria_id'  => 'required_if:categoria_id,0',
      ]);
  //   Servicio::create($request->all());
     $servicio = new Servicio;
     $servicio->nombre=$request->input('nombre');
     $servicio->descripcion=$request->input('descripcion');
     $servicio->categoria_id=$request->input('categoria_id');
     $servicio->save();
      //
     // Session::flash('message', 'Successfully created nerd!');
      return redirect()->route('servicios.index')->with('success','Servicio Agregada Exitosamente');
     //dd(Input::all());*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios=Servicio::find($id);
        return view('servicios.show')->with('servicios', $servicios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $servicios=Servicio::findOrFail($id);
      $categorias=Categoria::Lists('nombre','id');
    //  $categorias->prepend($id);
      return view('servicios.edit',compact('categorias'))->with('servicios', $servicios);
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
        'nombre'       => 'required',
        'descripcion'  => 'required',
        'categoria_id' => 'required',

        ]);
        $servicio = Servicio::find($id);
            $servicio->nombre       = Input::get('nombre');
            $servicio->descripcion      = Input::get('descripcion');
            $servicio->categoria_id = Input::get('categoria_id');
            $servicio->save();
       //Servicio::find($id)->update($request->all());
      // Session::flash('message', 'Successfully update nerd!');
       return redirect()->route('servicios.index')
                       ->with('success','Servicio Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
      $servicio=Servicio::findOrFail($id);

              $mensaje='El Servicio <b>'.$servicio->nombre.'</b> fue eliminada Exitosamente';
              if (!is_null($servicio)) {
                  $servicio->delete();
                 // Session::flash('message', 'Successfully delete nerd!');

                  if($request->ajax()){
                      return $mensaje;

                  }
                 return redirect()->route('servicios.index')
                       ->with('success', $mensaje);
             }

      //Session::flash('message', 'Successfully delete nerd!');

     }
}

<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use XFS\Estimate;
use XFS\Company;
use XFS\Avion;
use XFS\Servicio;
use XFS\date_estimates;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class EstimatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$estimates=Estimate::all();
      //$cliente=DB::table('company')($estimates->company_id)->get();
    //  $proveedor=Company::find($estimates->prove_id)->get();
      // $proveedor = DB::table('estimates')
      // ->join('companys', 'companys.id', '=', 'estimates.company_id')
      // ->select('estimates.id','companys.nombre','estimates.estado',
      // 'fecha_soli','total','resumen',DB::raw(''));
      $estimates=DB::select(
      DB::raw("SELECT
        e.id,
        c.nombre,
        cp.nombre AS proveedor,
        e.estado,
        e.fecha_soli,
        total,
        resumen
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN companys cp ON cp.id=e.prove_id ") );
      // $estimates = DB::table('estimates')
      //     ->join('companys', 'companys.id', '=', 'estimates.company_id')
      //     ->join('companys','companys.id','=','estimates.prove_id')
      //     ->select(DB::raw("e.id, c.nombre,cp.nombre as proveedor, estado,
      //     fecha_soli,total,resumen"))
      //     // ->union($proveedor)
      //     ->get();
      return view ('estimates.index')->with('estimates',$estimates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $estimates=Estimate::all();
      //$avion=Avion::Lists('tipo','id');
    //  $companys=Company::all();
    //  $indicador=1;
     $indicador=0;
     $servicios=Servicio::Lists('nombre','id');
     $servicios->prepend('Seleccione Servicio');

      return view('estimates.create',compact('estimates','servicios','indicador'));

    }
    // public function cliente($id)
    // {
    //   //$companys=Company::all();
    //    $view = View::make('estimates.create')->with('companys',$companys);
    //    if($request->ajax()){
    //        $sections = $view->renderSections();
    //        return Response::json($sections['tbCliente']);
    //    }else return $view;
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $estimates = new Estimate;
      $date_estimates= new date_estimates;
      $descuento=0;
      $subtotal=0;
      $total=0;
      $ganancia=0;
      $dataE=$request->input('Estimado');

      $estimates->company_id=$request->input('company_id');
      $estimates->prove_id=$request->input('prove_id');
      $estimates->estado=$request->input('estado');
      $estimates->resumen=$request->input('resumen');
      $estimates->metodo_segui=$request->input('metodo');
      $estimates->fecha_soli=$request->input('fecha_soli');
      $estimates->proximo_seguimiento=$request->input('proximo_seguimiento');
      $estimates->fbo=$request->input('fbo');
      $estimates->cantidad_fuel=$request->input('cantidad_fuel');
      $estimates->localidad=$request->input('localidad');
      $estimates->avion_id=$request->input('avion_id');
      $estimates->num_habitacion=$request->input('num_habitacion');
      $estimates->tipo_cama=$request->input('tipo_cama');
      $estimates->tipo_hab=$request->input('tipo_hab');
      $estimates->tipo_estrellas=$request->input('tipo_estrellas');
      $estimates->categoria=$request->input('tipoCategoria');
      $estimates->descuento=$request->input('descuento');
      foreach ($dataE as $key => $value) {
        $subtotal=$subtotal+$value['Subtotal'];
        $total=$total+$value['Total'];
        $ganancia=$ganancia+$value['Ganancia'];
      }
      $estimates->ganancia=$ganancia;
      $estimates->subtotal=$subtotal;
      $estimates->total=$total;
      $estimates->save();

      foreach ($dataE as $i => $datos) {
        $dateEstimates = date_estimates::create(array(
          'servicio_id' => $datos['ID'],
          'cantidad' => $datos['Cantidad'],
          'precio'=> $datos['Precio'],
          'subtotal'=>$datos['Subtotal'],
          'recarga'=>$datos['Ganancia'],
          'total'=>$datos['Total'],
          'estimate_id'=>$estimates->id,
          'descuento'=>$request->input('descuento'),
          'total_recarga'=>$request->input('gananciatotal')

        ));
      }
      // for ($i=0; $i < sizeof($dataE) ; $i++) {
      //     $date_estimates->servicio_id=$dataE[$i]['ID'];
      //     $date_estimates->cantidad=$dataE[$i]['Cantidad'];
      //     $date_estimates->precio=$dataE[$i]['Precio'];
      //     $date_estimates->subtotal=$dataE[$i]['Subtotal'];
      //     $date_estimates->recarga=$dataE[$i]['Ganancia'];
      //     $date_estimates->total=$dataE[$i]['Total'];
      //     $date_estimates->estimate_id=$estimates->id;
      //     $date_estimates->descuento=$request->input('descuento');
      //     $date_estimates->total_recarga=$request->input('gananciatotal');
      //     $date_estimates->save();
      // }

      // foreach ($dataE as $i => $datos) {
      //   $date_estimates->servicio_id=$datos['ID'];
      //   $date_estimates->cantidad=$datos['Cantidad'];
      //   $date_estimates->precio=$datos['Precio'];
      //   $date_estimates->subtotal=$datos['Subtotal'];
      //   $date_estimates->recarga=$datos['Ganancia'];
      //   $date_estimates->total=$datos['Total'];
      //   $date_estimates->estimate_id=$estimates->id;
      //   $date_estimates->descuento=$request->input('descuento');
      //   $date_estimates->total_recarga=$request->input('gananciatotal');
      //   $date_estimates->save();
      // }
      $mjs='El estimado se Agrego Correctamente';
      if ($request->ajax()) {
        return $mjs;
        return redirect()->route('estimates.index')->with('success','Estimado Agredo con Exito');
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
        $estimates=Estimate::findOrFail($id);
        // $estimates = DB::table('estimates')
        // ->join('companys', 'companys.id', '=', 'estimates.company_id')
        // ->select('estimates.*', 'companys.nombre as nombreC ')
        // ->where('estimates.id',$id)
        // ->where('companys.id',$estimates->company_id)
        // ->where('companys.id',$estimates->prove_id)
        // ->get();
        $cliente = DB::table('companys')
                    ->select('nombre as nombreC','id as company_id','celular','telefono','correo')
                    ->where('id', $estimates->prove_id)
                    ->first();
        $proveedor = DB::table('companys')
                    ->select('nombre as nombreP','id as prove_id','celular','telefono')
                    ->where('id', $estimates->company_id)
                    ->first();
        //$cliente=DB::table('company')($estimates->company_id)->get();
        //$proveedor=Company::find($estimates->prove_id)->get();
        // $cliente = DB::table('estimates')
        // ->join('companys', 'companys.id', '=', 'estimates.company_id')
        // ->select('companys.nombre as nombreC')
        // ->whereIn('companys.id',[$estimates->prove_id,$estimates->company_id]);
        // $proveedor = DB::table('estimates')
        //     ->join('companys', 'companys.id', '=', 'estimates.company_id')
        //     ->select('companys.nombre as nombreP')
        //     ->whereIn('companys.id',[$estimates->prove_id,$estimates->company_id])
        //     ->union($cliente)
        //     ->get();
        $indicador=1;
        $servicios=Servicio::Lists('nombre','id');
        return view ('estimates.edit',compact('estimates','servicios','cliente','proveedor','indicador'));
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
      $estimates=Estimate::findOrFail($id);

      $estimates->company_id=$request->input('company_id');
      $estimates->prove_id=$request->input('prove_id');
      $estimates->estado=$request->input('estado');
      $estimates->resumen=$request->input('resumen');
      $estimates->metodo_segui=$request->input('metodo');
      $estimates->fecha_soli=$request->input('fecha_soli');
      $estimates->proximo_seguimiento=$request->input('proximo_seguimiento');
      $estimates->fbo=$request->input('fbo');
      $estimates->cantidad_fuel=$request->input('cantidad_fuel');
      $estimates->localidad=$request->input('localidad');
      $estimates->avion_id=$request->input('avion_id');
      $estimates->num_habitacion=$request->input('num_habitacion');
      $estimates->tipo_cama=$request->input('tipo_cama');
      $estimates->tipo_hab=$request->input('tipo_hab');
      $estimates->tipo_estrellas=$request->input('tipo_estrellas');

      $estimates->save();
      return redirect()->route('estimates.index')->with('success','Estimado Modificado con Exito');
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

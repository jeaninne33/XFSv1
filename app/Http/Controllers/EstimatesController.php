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
use Illuminate\Support\Collection;
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
     $date="";
     //$visible="none";
      return view('estimates.create',compact('date','estimates','servicios','indicador'));

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
      $estimates->total_descuento=$request->input('totalDescuento');
      $estimates->ganancia=$request->input('gananciatotal');
      $estimates->subtotal=$request->input('subtotal');
      $estimates->total=$request->input('total');
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
        return response()->json($estimates->id);
        // return response()->json([
        //                 'redirect' => 'estimates.index',
        //                 'result' => $mjs
        //     ]);
      }
          //return redirect()->route('estimates.index')->with('success','Estimado Agredo con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$indicador=null)
    {

      $estimates=DB::select(
      DB::raw("SELECT
      e.id,
      c.id as company_id,
      c.nombre AS nombrec,
      cp.id AS prove_id,
      cp.nombre AS nombrep,
      estado,
      fecha_soli,
      ganancia,
      resumen,
      metodo_segui,
      c.telefono,
      c.celular,
      c.correo,
      proximo_seguimiento,
      fbo,
      cantidad_fuel,
      localidad,
      a.id as avion_id,
      a.tipo,
      matricula,
      total,
      subtotal,
      descuento,
      total_descuento,
      e.categoria
      FROM estimates e
      INNER JOIN companys c ON c.id=e.company_id
      INNER JOIN companys cp ON cp.id=e.prove_id
      INNER JOIN aviones a ON a.company_id=c.id
      WHERE e.id=$id"));

     $idEstimates=$estimates[0]->id;
      $date=DB::select(
      DB::raw("SELECT
        s.id AS servicioid,
        s.nombre AS nbservicio,
        s.descripcion,
        cantidad,
        precio,
        subtotal,
        recarga,
        total
        FROM dates_estimates de
        INNER JOIN servicios s ON s.id=de.servicio_id
        WHERE estimate_id=$idEstimates "));
      if ($indicador==1) {
        return view('estimates.show',compact('date','estimates'))->with('success','Estimado Agregado con Exito');
      }else {
        return view ('estimates.show',compact('date'))->with('estimates',$estimates);
      }
      // $date=date_estimates::where('estimate_id',$estimates->id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$estimates=Estimate::findOrFail($id);
        $estimates=DB::select(
        DB::raw("SELECT
        e.id,
        c.id as company_id,
        c.nombre AS nombrec,
        cp.id AS prove_id,
        cp.nombre AS nombrep,
        estado,
        fecha_soli,
        ganancia,
        resumen,
        metodo_segui,
        c.telefono,
        c.celular,
        c.correo,
        proximo_seguimiento,
        fbo,
        cantidad_fuel,
        localidad,
        a.id as avion_id,
        a.tipo,
        matricula,
        total
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN companys cp ON cp.id=e.prove_id
        INNER JOIN aviones a ON a.company_id=c.id
        WHERE e.id=$id"));

       $idEstimates=$estimates[0]->id;
        $indicador=0;
        $servicios=Servicio::Lists('nombre','id');
        $servicios->prepend('Seleccione Servicio');
        $date=DB::select(
        DB::raw("SELECT
          s.id AS servicioid,
          s.nombre AS nbservicio,
          s.descripcion,
          cantidad,
          precio,
          subtotal,
          recarga,
          total
          FROM dates_estimates de
          INNER JOIN servicios s ON s.id=de.servicio_id
          WHERE estimate_id=$idEstimates "));
          $visible="block";
        // $date=date_estimates::where('estimate_id',$estimates->id)->get();
        return view ('estimates.edit',compact('date','servicios','indicador','visible'))->with('estimates',$estimates);
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
      $estimates->total_descuento=$request->input('totalDescuento');
      $estimates->ganancia=$request->input('gananciatotal');
      $estimates->subtotal=$request->input('subtotal');
      $estimates->total=$request->input('total');
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
    // public function postfuelrelease(Request $request)
    // {
    //   $estimates=$request->all();
    //  // dd($data);
    //   $data = $this->getData($estimates['id']);
    //   return redirect()->action('EstimatesController@fuelrelease', ['estimates','data']);
    // }
    public function fuelreleaseview($id)
    {
      $estimates=DB::select(
      DB::raw("SELECT
      e.id,
      c.nombre AS nombrec,
      cp.nombre AS nombrep,
      c.representante,
      c.direccion,
      fecha_soli,
      fbo,
      cantidad_fuel,
      localidad,
      a.tipo,
      matricula
      FROM estimates e
      INNER JOIN companys c ON c.id=e.company_id
      INNER JOIN companys cp ON cp.id=e.prove_id
      INNER JOIN aviones a ON a.company_id=c.id
      WHERE e.id=$id"));
        return view('estimates.fuelrelease',compact('estimates'));
    }
    public function fuelrelease(Request $request)
    {
      $estimates=$request->all();
      // $estimates=DB::select(
      // DB::raw("SELECT
      // e.id,
      // c.nombre AS nombrec,
      // cp.nombre AS nombrep,
      // c.representante,
      // c.direccion,
      // fecha_soli,
      // fbo,
      // cantidad_fuel,
      // localidad,
      // a.tipo,
      // matricula
      // FROM estimates e
      // INNER JOIN companys c ON c.id=e.company_id
      // INNER JOIN companys cp ON cp.id=e.prove_id
      // INNER JOIN aviones a ON a.company_id=c.id
      // WHERE e.id=$id"));
      $from="X Flight Support";
       $date = date('Y-m-d');
       //$fuel_release = "1";
       $view =  \View::make('estimates.fuelrelease_pdf', compact('date','estimates'))->render();
       $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
      return $pdf->stream('fuelrelease');
      //  if ($request->ajax()) {
      //    return response()->json($pdf);
       //
      //  }
    }
    public function getData($id)
    {
      $data=DB::select(
      DB::raw("SELECT
        s.id AS servicioid,
        s.nombre AS nbservicio,
        s.descripcion,
        cantidad,
        precio,
        subtotal,
        recarga,
        total
        FROM dates_estimates de
        INNER JOIN servicios s ON s.id=de.servicio_id
        WHERE estimate_id=$id "));
     return $data;
    }
    public function printestimate($id)
    {
      $estimates=DB::select(
      DB::raw("SELECT
      e.id,
      c.id as company_id,
      c.nombre AS nombrec,
      cp.id AS prove_id,
      cp.nombre AS nombrep,
      c.representante,
      c.direccion,
      estado,
      fecha_soli,
      ganancia,
      resumen,
      metodo_segui,
      c.telefono,
      c.celular,
      c.correo,
      proximo_seguimiento,
      fbo,
      cantidad_fuel,
      localidad,
      a.id as avion_id,
      a.tipo,
      matricula,
      total,
      subtotal,
      total_descuento
      FROM estimates e
      INNER JOIN companys c ON c.id=e.company_id
      INNER JOIN companys cp ON cp.id=e.prove_id
      INNER JOIN aviones a ON a.company_id=c.id
      WHERE e.id=$id"));

     $idEstimates=$estimates[0]->id;

      $data=DB::select(
      DB::raw("SELECT
        s.id AS servicioid,
        s.nombre AS nbservicio,
        s.descripcion,
        cantidad,
        precio,
        subtotal,
        recarga,
        total
        FROM dates_estimates de
        INNER JOIN servicios s ON s.id=de.servicio_id
        WHERE estimate_id=$idEstimates "));
      //$data=$request->all();
      $date = date('Y-m-d');
      $fuel_release = "1";
      $view =  \View::make('estimates.estimate_pdf', compact('data', 'date', 'estimates'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('estimate');

    }
}

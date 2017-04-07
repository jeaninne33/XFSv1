<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XFS\Http\Requests\CrearFuelRequest;
use XFS\Http\Requests\EditFuelRequest;
use XFS\Estimate;
use XFS\Company;
use XFS\Avion;
use XFS\Invoice;
use Storage;
use XFS\Servicio;
use XFS\FuelRelease;
use XFS\date_estimates;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class FuelreleaseController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $estimate=$this->getDataEstimate($id);
        $estimates=collect($estimate);
       return view('fuelreleases.create',compact('estimates'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearFuelRequest $request)
    {
      $data  = $request->all();
    //  dd($data)
      $band=true;
      $error= array();
      $error=FuelRelease::validate_dates($data,1);
         if(!empty($error)){
           $band=false;
         }
         if($band){
           DB::beginTransaction();
           try {
              $fuel=FuelRelease::create($data);
              $id=$fuel->id;
              } catch (Exception $e) {
                 DB::rollback();
                 $error[]=[$e->getMessage()];
              }
              // Hacemos los cambios permanentes ya que no han habido errores
              DB::commit();
              $result=['message' => 'bien', 'error'=> $error,'id'=>$id];
         }else{
           $result=['message' => 'mal','error'=> $error];
         }//fin si band
         return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $fuel=$this->getData($id);
      return view('fuelreleases.show',compact('fuel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $fuel=$this->getData($id);
      $estimate=$this->getDataEstimate($fuel[0]->estimate_id);
      $estimates=collect($estimate);
      $fuel=collect($fuel);
      return view('fuelreleases.edit',compact('estimates','fuel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFuelRequest $request, $id)
    {
      $data  = $request->all();
    //  dd($data)+
      $fuel = FuelRelease::findOrFail($id);
      $band=true;
      $error= array();
      $error=FuelRelease::validate_dates($data,2);
         if(!empty($error)){
           $band=false;
         }
         if($band){
           DB::beginTransaction();
           try {
              $fuel->fill($data);
              $id=$fuel->id;
              $fuel->save();
              } catch (Exception $e) {
                 DB::rollback();
                 $error[]=[$e->getMessage()];
              }
              // Hacemos los cambios permanentes ya que no han habido errores
              DB::commit();
              $result=['message' => 'bien', 'error'=> $error,'id'=>$id];
         }else{
           $result=['message' => 'mal','error'=> $error];
         }//fin si band
         return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print_fuel($id)
    {
      $fuel= $this->getData($id);
      $date = date('Y-m-d');
      $view =  \View::make('fuelreleases.fuelrelease_pdf', compact('fuel'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view)->setPaper('letter', 'portrait');
      return $pdf->stream('fuel');
    }

    public function getData($id)
    {
      $data=DB::select(
       DB::raw("SELECT
       f.id, f.qty, f.flight_purpose, f.flight_number, f.operator, f.ref, f.cf_card, f.etd, f.eta, f.handling, f.into_plane, f.into_plane_phone, f.date,
       e.id as estimate_id, e.fbo, e.localidad,
       c.nombre AS cliente,
       cp.nombre AS prove,
       c.id as company_id,
       a.tipo, a.matricula
       FROM fuelreleases f
       INNER JOIN estimates e ON f.estimate_id=e.id
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys cp ON cp.id=e.prove_id
       INNER JOIN aviones a ON a.company_id=c.id
       WHERE f.id=$id"));
      return $data;
    }
    public function getDataEstimate($id)
    {
    $data=DB::select(
     DB::raw("SELECT
     e.id,
     c.nombre AS nombrec,
     cp.nombre AS nombrep,
     c.representante,
     c.direccion,
     c.id as company_id,
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
      return $data;
    }
}

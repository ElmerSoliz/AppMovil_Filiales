<?php

namespace App\Http\Controllers;

use App\Models\AsignacionRoles;
use App\Models\User;
use App\Models\MinisterioAsignacion;
use Illuminate\Http\Request;
use DB;

class AsignacionRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asignacion = AsignacionRoles::all();
        return response()->json([
            "data" => $asignacion,
            "message" => "Se cargo correctamente"
        ], status: 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function consulta()
    {

        // $asig = DB::table('ministerios')
        // ->select('*')
        // ->get();
        // return($asig);
        //
        $asignacion = DB::table('asignacion_roles')
        ->join('ministerios', 'ministerios.idministerio' ,'=' ,'asignacion_roles.idministerio')
        ->join('ministerio_asignacions', 'ministerio_asignacions.idasignacionrol' ,'=' ,'asignacion_roles.idasignacionrol')
        ->join('users' ,'users.id' ,'=' ,'ministerio_asignacions.iduser')
        // ->select('asignacion_roles.idasignacionrol' ,'users.name' ,'asignacion_roles.fechaInicio' ,'asignacion_roles.fechaFinal')
        ->select('ministerio_asignacions.idministerioasignacion' ,'users.name', 'ministerios.nombreRol', 'asignacion_roles.fechaInicio', 'asignacion_roles.fechaFinal')
        //->groupBy('asignacion_roles.idasignacionrol' ,'users.name' ,'asignacion_roles.fechaInicio' ,'asignacion_roles.fechaFinal')
        ->get();

        return($asignacion);
    }

    public function consultaministerioasig($id)
    {

        // $asig = DB::table('ministerios')
        // ->select('*')
        // ->get();
        // return($asig);
        //
        $asignacion = DB::table('asignacion_roles')
        ->join('ministerio_asignacions', 'ministerio_asignacions.idasignacionrol' ,'=' ,'asignacion_roles.idasignacionrol')
        ->join('users' ,'users.id' ,'=' ,'ministerio_asignacions.iduser')
        // ->select('asignacion_roles.idasignacionrol' ,'users.name' ,'asignacion_roles.fechaInicio' ,'asignacion_roles.fechaFinal')
        ->select('asignacion_roles.idasignacionrol' ,'users.name' ,'asignacion_roles.fechaInicio' ,'asignacion_roles.fechaFinal')
        ->where('asignacion_roles.idministerio', '=', $id)
        //->groupBy('asignacion_roles.idasignacionrol' ,'users.name' ,'asignacion_roles.fechaInicio' ,'asignacion_roles.fechaFinal')
        ->get();

        return($asignacion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function listaasigancion($id)
    {
        $ministerio = DB::table('asignacion_roles')
        ->join('ministerios', 'ministerios.idministerio', '=', 'asignacion_roles.idministerio')
        ->join('miembros', 'miembros.idmiembro', '=' , 'asignacion_roles.idmiembro')
        ->join('users', 'users.id', '=', 'miembros.iduser')
        ->where('ministerios.idministerio', '=', $id)
        ->select('asignacion_roles.idasignacionrol','users.name','ministerios.nombrerol','asignacion_roles.fechaInicio','asignacion_roles.fechaFinal')
        ->get();
        return response()->json([
            'data' => $ministerio,
            'mensaje' => 'Datos traidos correctamente',
        ],status: 200);
    }
    public function store(Request $request)
    {
        //
        $asignacion = new AsignacionRoles;
        $asignacion -> idministerio = $request -> input(key: "idministerio");
        $asignacion -> idmiembro = $request -> input(key: "idmiembro");
        $asignacion -> fechaInicio = $request -> input(key: "fechaInicio");
        $asignacion -> fechaFinal = $request -> input(key: "fechaFinal");
        $asignacion -> save();

        return response()->json([
            "data" => $asignacion,
            "message" => "Se agrego correctamente"
        ],status: 200);
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
        $asignacion = AsignacionRoles::all()->find($id);
        return response()->json([
            "data" => $asignacion,
            "message" => "Se hizo correctamente"
        ],status: 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function consultaAsignacion()
    {
        $asignasion = DB::table('asignacion_roles')
        ->join('ministerios', 'ministerios.idministerio', '=', 'asignacion_roles.idministerio')
        ->join('miembros', 'miembros.idmiembro', '=', 'asignacion_roles.idmiembro')
        ->join('users', 'users.id', '=', 'miembros.iduser')
        ->select('asignacion_roles.idasignacionrol', 'ministerios.nombreRol','users.name','asignacion_roles.fechaInicio','asignacion_roles.fechaFinal')
        ->get();

        return response()->json([
            'data' => $asignasion,
            'message' => 'Se trajo los datos correctamente'
        ],status: 200);
    }
     
    public function update(Request $request, $id)
    {
        //
        
        $asignacion = AsignacionRoles::all()->find($id);


        $asignacion->idministerio=$request->idministerio;
        $asignacion->idmiembro=$request->idmiembro;
        $asignacion->fechaInicio=$request->fechaInicio;
        $asignacion->fechaFinal=$request->fechaFinal;
        $asignacion->save();

        return response()->json([
            "data" => $asignacion,
            "message" => "Se cambio correctamente"
        ],status: 200);
        
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
        $asignacion = AsignacionRoles::all()->find($id);
        $asignacion -> delete();
    }
}

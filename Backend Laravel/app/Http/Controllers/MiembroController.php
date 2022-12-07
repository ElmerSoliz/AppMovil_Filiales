<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;

use DB;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miembro = Miembro::all();
        return response()->json([
            "data" => $miembro,
            "message" => "Se hizo correctamente" 
        ], status: 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function miembros()
    {
        //
        $miembro = DB::table('miembros')
        ->join('users' ,'users.id' ,'miembros.iduser')
        ->select('miembros.idmiembro' ,'users.name' ,'miembros.bautizo')
        ->get();
        return ($miembro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function miembroRegistro(){
        $miembro = DB::table('miembros')
        ->join('users' ,'users.id' ,'miembros.iduser')
        ->select('miembros.idmiembro' ,'users.name' ,'miembros.bautizo', 'miembros.iglesia')
        ->get();
        return ($miembro);
    }
    public function store(Request $request)
    {
        //
        $miembro = new Miembro;
        $miembro -> iduser = $request->input( key: 'iduser');
        $miembro -> iglesia = $request->input( key: 'iglesia');
        $miembro -> bautizo = $request->input(key: 'bautizo');
        $miembro -> save();

        return response()->json([
            "data" => $miembro, 
            "message" => "Se a registrado correctamente"
        ], status: 200);
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
        $miembro = Miembro::all()->find($id);
        return response()->json([
            "data" => $miembro,
            "message" => "Se hizo correctamente"
        ], status: 200);

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
        $miembro = Miembro::all()->find($id);
        //$miembro -> iduser = $request->input( key: 'iduser');
        $miembro->iglesia = $request->input( key: 'iglesia');
        $miembro->bautizo = $request->input(key: 'bautizo');
        $miembro->save();
        
        return response()->json([
            "data" => $miembro,
            "message" => "Se hizo correctamente"
        ], status: 200);
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
        $miembro = Miembro::all()->find($id);
        $miembro -> delete();
    }
}

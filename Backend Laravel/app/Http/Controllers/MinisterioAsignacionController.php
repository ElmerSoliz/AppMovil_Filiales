<?php

namespace App\Http\Controllers;

use App\Models\MinisterioAsignacion;
use Illuminate\Http\Request;

class MinisterioAsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ministerio = MinisterioAsignacion::all();
        return response()->json([
            "data" => $ministerio,
            "message" => "Se mostro correctamente"
        ],status: 200);
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
    public function store(Request $request)
    {
        //
        $ministerio = new MinisterioAsignacion;
        $ministerio -> iduser = $request->input( key: "iduser");
        $ministerio -> idasignacionrol = $request->input( key: "idasigancionrol");
        $ministerio -> save();
        return response()->json([
            "data" => $ministerio,
            "message" => "Se inserto Correctamente"
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
        $ministerio = MinisterioAsignacion::all()->find($id);
        return response()->json([
            "data" => $ministerio,
            "message" => "Todo correcto"
        ],status: 200);
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
        $ministerio = MinisterioAsignacion::all()->find($id);
        $ministerio -> iduser = $request->input( key: 'iduser');
        $ministerio -> idasignacionrol = $request->input( key: 'idasigancionrol');
        $ministerio -> save();
        return response()->json([
            'data' => $ministerio,
            'message' => "Se edito correctamente"
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
        $ministerio = MinisterioAsignacion::all()->find($id);
        $ministerio -> delete();
    }
}

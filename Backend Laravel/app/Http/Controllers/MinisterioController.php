<?php

namespace App\Http\Controllers;

use App\Models\Ministerio;
use Illuminate\Http\Request;

class MinisterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ministerio = Ministerio::all();
        return response()->json([
            "data" => $ministerio, 
            "message" => "Se a traido correctamente la infromacion"
        ], status: 200);
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
        $ministerio = new Ministerio;
        $ministerio -> idministerio = $request->input( key: "idministerio");
        $ministerio -> nombreRol = $request->input( key: "nombreRol");
        $ministerio -> save();

        return response()->json([
            "data" => $ministerio,
            "message" => "Se registro correctamente"
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
        $ministerio = Ministerio::all()->find($id);
        return response()->json([
            "data" => $ministerio,
            "message" => "Correcto"
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
        $ministerio = Ministerio::all()->find($id);
        $ministerio -> nombreRol = $request->input( key: "nombreRol");
        $ministerio -> save();

        return response()->json([
            "data" => $ministerio,
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
        $ministerio = Ministerio::all()->find($id);
        $ministerio -> delete();
        return response()->json([
            'data' => $ministerio,
            'message' => "Se elimino correctamente"
        ],status: 200);
    }
}

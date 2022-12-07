<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuario = User::all();
        return response()->json([
            "data" => $usuario, 
            "message" => "Se a traido correctamente la infromacion"
        ], status: 200);
    }
    // public function index(Request $request)
    // {

    //     $nombre = $request->get('name');

    //     $usuario = User::where('name','like',"%$nombre%")->paginate(5);
        
    //     return view('usuario.index', compact('User'));
    // }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $usuario = $request -> usuario;
        // // return User::findOrFail($name);
        // //
        // $user = User::where('name', 'LIKE','%'.$usuario.'%');
        // // return response()->json([
        // //     "data" => $user,
        // //     "message" => "Se hizo correctamente"
        // // ], status: 200);
        $name = $request->get('nombre');

        $usuario = User::where('name','like',"%$name%")->get();
        return response()->json([
            'data' => $usuario,
            'message' => "Se hizo correctamente"
        ],status: 200);
        
        // return (compact('usuario'));
        //return $usuario;
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
        $usuario = User::all()->find($id);
        $usuario -> name = $request -> input (key: 'name');
        return response()->json([
            "data" => $usuario,
            "message" => "Se hizo correctamente"
        ], status: 200);

    }
    public function filtrousers(Request $request )
    {
        $name = $request->get('nombre');

        $usuario = User::where('name','like',"%R%")->get();
        return response()->json([
            'data' => $usuario,
            'message' => "Se hizo correctamente"
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
        $usuario = User::all()->find($id);
        $usuario->delete();
    }
}

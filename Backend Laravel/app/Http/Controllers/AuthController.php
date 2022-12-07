<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use stdClass;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('cliente');


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token, 
            'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request -> only('email', 'password')))
        {
            return response()->json(['message' => 'No esta Autorizado'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail()->assignRole();
        $token = $user->createToken('auth_token')->plainTextToken;
        
        $users = DB::table('users')
        ->join('miembros', 'miembros.iduser', '=', 'users.id')
        ->join('asignacion_roles', 'asignacion_roles.idmiembro', '=', 'miembros.idmiembro')
        ->join('ministerios', 'ministerios.idministerio', '=', 'asignacion_roles.idministerio')
        ->select('ministerios.nombreRol','users.name', 'asignacion_roles.fechaInicio', 'asignacion_roles.fechaFinal')
        ->where('users.name', '=', $user->name)
        ->get();
        
        return response()->json([
            'message' => 'Hola '.$user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'data' => $user,
            'perfil' => $users, 
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        
        return [
            'message' => 'Ha cerrado sesión correctamente y el token se eliminó con éxito'
        ];
    }
}

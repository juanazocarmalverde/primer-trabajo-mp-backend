<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuariosRequest;


class ApiUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json([
            'status' => true,
            'usuarios' => $usuarios
        ]);
    }

    public function login(Request $request)
    {
        // Validar los parámetros
        $validatedData = $request->validate([
            'correo_acceso' => 'required|string',
            'clave_acceso' => 'required|string',
            // Otros parámetros si son necesarios
        ]);

        // Buscar el item en la base de datos
        $usuario = Usuarios::where('correo_acceso', $validatedData['correo_acceso'])
                           ->first();

        // Verificar si el item fue encontrado
        if (!$usuario) {
            $respuesta = ['metadata'=> ['code' => '404', 'message' => 'Usuario no encontrado'], 'data' => ''];
            return response()->json( $respuesta, 404);
        }

        $usuario = Usuarios::where('correo_acceso', $validatedData['correo_acceso'])
                           ->where('clave_acceso', $validatedData['clave_acceso'])
                           ->first();
        
        if (!$usuario) {
            $respuesta = ['metadata'=> ['code' => '404', 'message' => 'Contraseña incorrecta.'], 'data' => ''];
            return response()->json( $respuesta, 404);
        }
                           
        $respuesta = ['metadata'=> ['code' => '200', 'message' => 'Autenticación exitosa'], 'data' => $usuario];
        return response()->json($respuesta, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuariosRequest $request)
    {
        $usuario = Usuarios::create($request->all());
        $respuesta = ['metadata'=> ['code' => '404', 'message' => 'Usuario Creado exitosamente'], 'data' => $usuario];
        return response()->json($respuesta, 200);    
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}

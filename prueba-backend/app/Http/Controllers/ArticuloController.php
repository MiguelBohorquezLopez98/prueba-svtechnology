<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Articulo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $e = Articulo::create($inputs);
        return response()->json([
            'data' => $e,
            'mensaje' => "Articulo registrado con exito",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $e = Articulo::find($id);
        if (isset($e)) {
            return response()->json([
                'data' => $e,
                'mensaje' => "Articulo encontrado con exito",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el articulo",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $e = Articulo::find($id);
        if (isset($e)) {
            $e->name = $request->name;
            $e->description = $request->description;
            $e->price = $request->price;
            if ($e->save()) {
                return response()->json([
                    'data' => $e,
                    'mensaje' => "articulo actualizado con exito",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No se actualizo el articulo",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el articulo",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $e = Articulo::find($id);
        if (isset($e)) {
            $res = Articulo::destroy($id);
            if ($res) {
                return response()->json([
                    'data' => $e,
                    'mensaje' => "Articulo eliminado con exito",
                ]);
            } else {
                return response()->json([
                    'data' => $e,
                    'mensaje' => "No existe el articulo",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el articulo",
            ]);
        }
    }
}

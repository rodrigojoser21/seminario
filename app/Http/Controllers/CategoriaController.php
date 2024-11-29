<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
//use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombreCategoria' => 'required|string|max:30'
        ]);
        Categoria::create([
            'nombreCategoria' => $request->nombreCategoria

        ]);
        return redirect()->route('categorias.index')
                         ->with('success', 'Registro Insertado Correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        // Validar los datos, asegurando que el email sea único, excepto para el alumno actual
        $request->validate([
            'nombreCategoria' => 'required|string|max:255'
        ]);
        // Actualizar los datos del alumno
        $categoria->update($request->all());
        // Redireccionar con mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoria actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy(Categoria $categoria)
    {
        //
    }*/
}

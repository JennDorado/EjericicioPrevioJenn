<?php

namespace App\Http\Controllers;

use  App\Models\Camionero;
use Illuminate\Http\Request;

class CamioneroController extends Controller
{
    public function create()
    {
        return view('camionero.create');
    }

    public function index()
    {
        $camionero = Camionero::orderBy('id', 'desc')->get();
        return view('camionero.listar', compact('camionero'));
    }

    public function store(Request $request)
    {
        $camionero = new Camionero();
        $camionero->dni = $request->dni;
        $camionero->Nombre = $request->Nombre;
        $camionero->Poblacion = $request->Poblacion;
        $camionero->telefono = $request->telefono;
        $camionero->Direccion = $request->Direccion;
        $camionero->salario = $request->salario;
        $camionero->save();

        return redirect()->route('camionero.index');
    }

    public function show(Camionero $camionero)
    {
        return view('camionero.show', compact('camionero'));
    }

    public function destroy(Camionero $camionero)
    {
        $camionero->delete();
        return redirect()->route('camionero.index');
    }

    public function edit(Camionero $camionero)
    {
        return view('camionero.edit', compact('camionero'));
    }

    public function update(Request $request, Camionero $camionero)
    {
        $camionero->dni = $request->dni;
        $camionero->Nombre = $request->Nombre;
        $camionero->Poblacion = $request->Poblacion;
        $camionero->telefono = $request->telefono;
        $camionero->Direccion = $request->Direccion;
        $camionero->salario = $request->salario;
        $camionero->save();

        return redirect()->route('camionero.index');
    }
}

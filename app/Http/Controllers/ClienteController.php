<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request) //StoreClienteRequest $request
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo = $request->correo;
        //$cliente->save();


        //return redirect()->route('cliente.show', $cliente);
        if ($cliente->save()) {
            Alert::success('Cliente creado con exito');
            return redirect()->route('cliente.show', $cliente)->with('success', 'Cliente actualizado con exito');
        }
        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $clientes = Cliente::all();
        return view('cliente', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('form_edit_cliente', compact('cliente'));
        //return $cliente;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo = $request->correo;
        //$cliente->save();

        //return redirect()->route('cliente.show', $cliente);
        // return redirect()
        //     ->back()
        //     ->with('success', 'Actualizado con éxito');

        if ($cliente->save()) {
            Alert::success('Datos actualizados');
            return redirect()->back()->with('success', 'Cliente actualizado con exito');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        if ($cliente->delete()) {
            Alert::success('Registro eliminado', 'Cliente eliminado con exito');
            return redirect()->back()->with('success', 'Cliente eliminado con exito');
        }
    }
}

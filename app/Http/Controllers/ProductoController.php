<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
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
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->descripcion = $request->descripcion;

        // Verificar el estado del producto
        $producto->estado_producto = ($request->stock <= $request->stock_minimo) ? 'Bajo stock' : 'Disponible';

        if ($producto->save()) {
            Alert::success('Producto creado con éxito');
            return redirect()->route('producto.show', $producto)->with('success', 'Producto creado con éxito');
        }
        // En caso de que no se pueda guardar el producto
        return back()->withInput()->with('error', 'No se pudo crear el producto.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        $productos = Producto::all();
        return view('producto', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('form_edit_producto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->descripcion = $request->descripcion;

        // Verificar el estado del producto
        $producto->estado_producto = ($request->stock <= $request->stock_minimo) ? 'Bajo stock' : 'Disponible';

        if ($producto->save()) {
            Alert::success('Producto actualizado con éxito');
            return redirect()->route('producto.show', $producto)->with('success', 'Producto actualizado con éxito');
        }
        // En caso de que no se pueda guardar el producto
        return back()->withInput()->with('error', 'No se pudo actualizar el producto.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        if ($producto->delete()) {
            Alert::success('Producto eliminado con éxito');
            // return redirect()->route('producto.show', $producto)->with('success', 'Producto eliminado con éxito');
            return redirect()->back()->with('success', 'Cliente eliminado con exito');
        }
        // En caso de que no se pueda guardar el producto
        return back()->withInput()->with('error', 'No se pudo eliminar el producto.');
    }
}

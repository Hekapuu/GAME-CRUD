<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Http\Requests\StorePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Pedido_detalle;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedidos::all();
        $productos = Producto::all();
        $clientes = Cliente::all();
        $pedido_detalles = Pedido_detalle::all();

        confirmDelete('Eliminar pedido', 'Estas seguro de eliminar un pedido');

        return view('pedidos', compact('pedidos', 'productos', 'clientes', 'pedido_detalles'));
        // dd($pedidos);


    }

    public function cambiarEstado(Request $request, Pedidos $pedido)
    {
        $estados = ['Pendiente', 'En proceso', 'Concluido'];
        $estadoActual = $pedido->estado;
        $nuevoEstado = $estados[(array_search($estadoActual, $estados) + 1) % count($estados)];

        $pedido->update(['estado' => $nuevoEstado]);

        return redirect()->back()->with('success', 'Estado actualizado con éxito');
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
    // public function store(StorePedidosRequest $request)
    public function store(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'cliente' => ['required', 'exists:cliente,id_cliente'],
        //     'fecha_pedido' => 'required|date',
        //     'productos' => 'required|array',
        //     'productos.*.id' => 'required|exists:producto,id_producto',
        //     'productos.*.cantidad' => 'required|integer|min:1',
        // ]);
        ///////-----------------------------------
        // Crear un nuevo pedido
        $nuevo_pedido = new Pedidos();
        $nuevo_pedido->cliente_id = $request->cliente;
        $nuevo_pedido->fecha = $request->fecha;
        $nuevo_pedido->estado = 'Pendiente';
        $nuevo_pedido->save();

        // Adjuntar productos al pedido
        //return $request->producto;
        if (is_array($request->producto)) {
            // Iterar sobre productos y cantidades
            $true = false;
            for ($i = 0; $i < count($request->producto); $i++) {
                $producto_id = $request->producto[$i];
                $cantidad = $request->cantidad[$i];

                // Crear un nuevo pedido_detalle para cada producto
                $detalle = new Pedido_detalle();
                $detalle->cantidad = $cantidad;
                $detalle->pedido_id = $nuevo_pedido->id_pedido;
                $detalle->producto_id = $producto_id;
                $detalle->save();
                $true = true;
            }
            if ($true) {
                Alert::success('Pedido creado', 'con exito');
                return redirect()->route('pedidos.index')->with('success', 'Pedido creado con éxito');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Pedidos $pedido, Producto $producto)
    // {
    //     //return $pedido->cliente->nombre;
    //     //return $clientes->nombre;

    //     //return $pedido;
    //     $clientes = Cliente::all();
    //     return view('form_edit_pedido', compact('pedido', 'clientes'));
    // }

    public function edit(Pedidos $pedido, Producto $producto)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();

        // Obtén los detalles del pedido (productos y cantidades)
        $detallesPedido = Pedido_detalle::where('pedido_id', $pedido->id_pedido)->get();

        return view('form_edit_pedido', compact('pedido', 'clientes', 'productos', 'detallesPedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedido)
    {
        // Validación de campos, si es necesario
        $request->validate([
            'cliente' => 'required', // Asegúrate de agregar las reglas de validación necesarias
            'fecha' => 'required|date', // Ejemplo de validación para la fecha
            'producto' => 'required|array', // Asegúrate de agregar las reglas de validación necesarias
        ]);


        // Verifica si el campo 'producto' está presente y es un array con al menos un elemento
        if ($request->has('producto') && is_array($request->producto) && count($request->producto) > 0) {
            // Actualiza los datos del pedido
            $pedido->cliente_id = $request->cliente;
            $pedido->fecha = $request->fecha;
            $pedido->save();

            // Elimina los detalles de pedido existentes para este pedido
            Pedido_detalle::where('pedido_id', $pedido->id_pedido)->delete();

            // Adjunta productos al pedido con las cantidades proporcionadas
            foreach ($request->producto as $key => $productoId) {
                $detalle = new Pedido_detalle();
                $detalle->cantidad = $request->cantidad[$key];
                $detalle->pedido_id = $pedido->id_pedido;
                $detalle->producto_id = $productoId;
                $detalle->save();
            }

            // Puedes agregar lógica adicional si es necesario

            return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado con éxito');
        } else {
            // No se cumplieron las condiciones, no se hace ningún cambio
            return redirect()->route('pedidos.index')->with('warning', 'No se realizaron cambios en el pedido.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();

        Alert::success('Delete', 'Pedido eliminado!');

        return redirect()->back();
    }
}

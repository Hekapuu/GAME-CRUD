<?php

namespace App\Livewire;

use Livewire\Component;

class CrearPedidos extends Component
{

    public $productos;
    public $clientes;
    public $pedidos;
    public  $selected_id;


    public function render()
    {
        return view('livewire.crear-pedidos');
    }
}

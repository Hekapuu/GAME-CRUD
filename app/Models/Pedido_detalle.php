<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Pedido_detalle extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'pedido_detalle';

    protected $primaryKey = 'id_pedidoDetalle';

    protected $fillable = [
        'cantidad',
    ];

    protected $casts = [
        'created_at' => 'datetime:H:i:s d-M-Y',
        'updated_at' => 'datetime:H:i:s d-M-Y'
    ];

    public function pedido(): HasOne
    {
        return $this->hasOne(Pedidos::class, 'pedido_id', 'id_pedido');
    }

    public function producto(): HasOne
    {
        return $this->hasOne(Producto::class, 'producto_id', 'id_producto');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'producto';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre_producto',
        'precio',
        'stock',
        'stock_minimo',
        'estado_producto',
        'descripcion',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
        'precio' => 'string'
    ];

    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(Pedidos::class, 'pedido_detalle', 'producto_id', 'pedido_id');
    }
}

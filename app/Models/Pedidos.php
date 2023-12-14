<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasOne;

class Pedidos extends Model
{
    use SoftDeletes, HasFactory, HasUlids;

    protected $table = 'pedidos';

    protected $primaryKey = 'id_pedido';

    protected $fillable = [
        'fecha',
        'fecha_final',
        'estado'
    ];

    protected $casts = [
        'fecha' => 'datetime:d-m-Y H:i:s',
        'created_at' => 'datetime:d-m-Y H:i:s'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class,  'cliente_id', 'id_cliente'); //'aula_id' <-- en tabla experimento, 'id_aula' <-- en tabla aula
    }

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'pedido_detalle', 'pedido_id', 'producto_id')->withPivot('cantidad');
    }
    // En el modelo Pedido
    public function detalles()
    {
        return $this->hasMany(pedido_detalle::class, 'pedido_id', 'id_pedido');
    }
}

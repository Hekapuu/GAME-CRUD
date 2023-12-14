<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{

    use HasFactory, HasUlids;

    protected $table = "cliente";
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s'
    ];

    // Definición de la relación con el modelo pedidos
    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedidos::class, 'cliente_id', 'id_cliente');
    }
}

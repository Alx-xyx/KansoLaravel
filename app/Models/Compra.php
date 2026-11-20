<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'compra_id';
    protected $fillable = ['usuario_fk', 'producto_fk', 'cantidad', 'precio_unitario', 'estado'];

    public function usuario(): BelongsTo{
        return $this->belongsTo(User::class, 'usuario_fk', 'usuario_id');
    }

    public function producto(): BelongsTo{
        return $this->belongsTo(Producto::class, 'producto_fk', 'producto_id');
    }
}

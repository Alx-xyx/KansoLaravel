<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';
    protected $fillable = ['nombre','descripcion','precio','stock','imagen','imagen_descripcion', 'categoria_fk'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_fk', 'categoria_id');
    }

    public function etiqueta()
    {
        return $this->belongstoMany(
            Etiqueta::class, 
            'productos_tienen_etiquetas',
            'producto_fk',
            'etiqueta_fk',
            'producto_id',
            'etiqueta_id',
        );
    }
}

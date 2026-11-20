<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    protected $fillable = ['titulo','contenido','imagen','imagen_descripcion'];

    protected function imagenUrl() :Attribute{
        return Attribute::make(
            get: function(){
                if(!$this->imagen){
                    return null;
                }
                return Storage::disk('public')->exists($this->imagen)
                    ? Storage::disk('public')->url($this->imagen)
                    : asset('img/'.$this->imagen);
            }
        );
    }
}

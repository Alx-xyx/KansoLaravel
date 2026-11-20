<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::where('email', 'usuario@kanso.com')->firstOrFail();
        $productos = Producto::orderBy('producto_id')->take(2)->get();

        foreach($productos as $producto){
            $usuario->compras()->create([
                'producto_fk' => $producto->producto_id,
                'cantidad' => 1,
                'precio_unitario' => $producto->precio,
                'estado' => 'reservada',
            ]);
        }
    }
}

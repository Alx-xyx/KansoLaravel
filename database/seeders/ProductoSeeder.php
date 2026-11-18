<?php

namespace Database\Seeders;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Cuaderno Tomoe River',
            'categoria_fk' => 3,
            'descripcion' => 'Cuaderno de papel ultrafino japones, ideal para tinta de pluma',
            'precio' => '8500.00',
            'stock' => 25,
            'imagen' => 'cuaderno-tomoe.jpg',
            'imagen_descripcion' => 'Cuaderno marca tomoe'
        ]);
            Producto::create([
            'nombre' => 'Lapicera Pilot Juice Up',
            'categoria_fk' => 1,
            'descripcion' => 'Gel de secado rapido con punta fina',
            'precio' => '2300.00',
            'stock' => 60,
            'imagen' => 'pilot-juice-up.jpg',
            'imagen_descripcion' => 'Lapicera de gel marca pilot de secado rapido'
        ]);
    }
}

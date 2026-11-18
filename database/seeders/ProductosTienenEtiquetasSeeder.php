<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTienenEtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos_tienen_etiquetas')->insert([
            [
                'producto_fk' => 1,
                'etiqueta_fk' => 3
            ],
            [
                'producto_fk' => 1,
                'etiqueta_fk' => 4
            ],
            [
                'producto_fk' => 2,
                'etiqueta_fk' => 1
            ],            
            [
                'producto_fk' => 2,
                'etiqueta_fk' => 2
            ],
        ]);
    }
}

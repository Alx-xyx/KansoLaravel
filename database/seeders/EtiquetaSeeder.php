<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquetas')->insert([
            [
                'etiqueta_id' => 1,
                'nombre' => 'Oferta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 2,
                'nombre' => 'Ecologico',
                'created_at' => now(),
                'updated_at' => now(),
            ],            
            [
                'etiqueta_id' => 3,
                'nombre' => 'Importado',
                'created_at' => now(),
                'updated_at' => now(),
            ],            
            [
                'etiqueta_id' => 4,
                'nombre' => 'Vuelta a clases',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

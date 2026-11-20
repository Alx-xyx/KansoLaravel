<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'categoria_id' => 1,
                'nombre' => 'Lapicera',
                'abreviacion' => 'LAP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Pluma',
                'abbreviation' => 'PLU',
                'created_at' => now(),
                'updated_at' => now()
            ],
                        [
                'categoria_id' => 3,
                'nombre' => 'Cuaderno',
                'abreviacion' => 'CUA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 4,
                'nombre' => 'Goma de borrar',
                'abbreviation' => 'GDB',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 5,
                'nombre' => 'Cutters',
                'abbreviation' => 'Cut',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

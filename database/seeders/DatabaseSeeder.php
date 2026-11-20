<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            EtiquetaSeeder::class,
            CategoriaSeeder::class,
            BlogSeeder::class,
            ProductoSeeder::class,
            ProductosTienenEtiquetasSeeder::class,
            CompraSeeder::class,
        ]);
    }
}

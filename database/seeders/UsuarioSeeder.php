<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'email'=>'admin@kanso.com',
            'password'=>Hash::make('admin1234'),
            'rol'=>User::ROL_ADMIN,
        ]);

        User::create([
            'email'=>'usuario@kanso.com',
            'password'=>Hash::make('usuario1234'),
            'rol'=>User::ROL_USUARIO,
        ]);
    }
}

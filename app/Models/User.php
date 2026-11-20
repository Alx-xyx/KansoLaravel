<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['email', 'password', 'rol'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public const ROL_ADMIN = 'administrador';
    public const ROL_USUARIO = 'usuario';

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function esAdministrador(): bool{
        return $this->rol === self::ROL_ADMIN;
    }

    public function compras(): HasMany{
        return $this->hasMany(Compra::class, 'usuario_fk', 'usuario_id');
    }
}

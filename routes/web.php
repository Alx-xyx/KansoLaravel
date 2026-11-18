<?php

use Illuminate\Support\Facades\Route;

//? RUTAS PARA TODOS LOS USUARIOS 

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/nosotros', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

//* BLOG
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])
    ->name('blog.index');

 //* PRODUCTOS
Route::get('/productos', [\App\Http\Controllers\ProductoController::class, 'index'])
    ->name('productos.index');

//? RUTAS PARA INICIAR Y CERRAR SESION
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form')
    ->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
    ->name('auth.login.process')
    ->middleware('guest');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');


//? RUTAS ABM DE BLOGS
    Route::get('/blog/crear', [\App\Http\Controllers\BlogController::class, 'create'])
        ->name('blog.create')
        ->middleware('auth');
    Route::post('/blog/crear', [\App\Http\Controllers\BlogController::class, 'store'])
        ->name('blog.store')
        ->middleware('auth');
    Route::get('/blog/{id}', [\App\Http\Controllers\BlogController::class, 'show'])
        ->name('blog.show');
    Route::get('/blog/{id}/editar', [\App\Http\Controllers\BlogController::class, 'edit'])
        ->name('blog.edit')
        ->middleware('auth');
    Route::post('/blog/{id}/editar', [\App\Http\Controllers\BlogController::class, 'update'])
        ->name('blog.edit')
        ->middleware('auth');
    Route::get('/blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'delete'])
        ->name('blog.delete')
        ->middleware('auth');
    Route::post('/blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'destroy'])
        ->name('blog.destroy')
        ->middleware('auth');

//? RUTAS ABM DE PRODUCTOS
    Route::get('/productos/crear', [\App\Http\Controllers\ProductoController::class, 'create'])
        ->name('productos.create')
        ->middleware('auth');
    Route::post('/productos/crear', [\App\Http\Controllers\ProductoController::class, 'store'])
        ->name('productos.store')
        ->middleware('auth');
    Route::get('/productos/{id}', [\App\Http\Controllers\ProductoController::class, 'show'])
        ->name('productos.show');
    Route::get('/productos/{id}/editar', [\App\Http\Controllers\ProductoController::class, 'edit'])
        ->name('productos.edit')
        ->middleware('auth');
    Route::post('/productos/{id}/editar', [\App\Http\Controllers\ProductoController::class, 'update'])
        ->name('productos.update')
        ->middleware('auth');
    Route::get('/productos/{id}/eliminar', [\App\Http\Controllers\ProductoController::class, 'delete'])
        ->name('productos.delete')
        ->middleware('auth');
    Route::post('/productos/{id}/eliminar', [\App\Http\Controllers\ProductoController::class, 'destroy'])
        ->name('productos.destroy')
        ->middleware('auth');


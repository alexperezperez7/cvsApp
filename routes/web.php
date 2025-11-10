<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', [MainController::class, 'index'])->name('main.index');

// Rutas Main
Route::get('/main/copy', [MainController::class, 'copy'])->name('main.copy');
Route::get('/main/prueba', [MainController::class, 'prueba'])->name('main.prueba');
Route::post('/main/prueba', [MainController::class, 'postprueba'])->name('main.postprueba');

// Rutas de Imágenes
Route::get('/image/{id}', [ImageController::class, 'view'])->name('image.view');

// Rutas Alumno (Resource - incluye todas las operaciones CRUD)
Route::resource('alumno', AlumnoController::class);
<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//RUTA DEL CRUD PRINCIPAL DEL PROGRAMA
Route::get("/", [CrudController::class, "index"])->name("crud.index");

//RUTA PARA AÑADIR UN NUEVO PRODUCTO
Route::post("/registrar-producto", [CrudController::class, "Crear"])->name("crud.crear");


//RUTA PARA MODIFICAR UN PRODUCTO
Route::post("/Modificar-producto", [CrudController::class, "Modificar"])->name("crud.modificar");



//RUTA PARA MODIFICAR UN PRODUCTO
Route::get("/eliminar-producto--{id}", [CrudController::class, "Eliminar"])->name("crud.eliminar");
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Actividad;
use App\Models\Cliente;
use App\Models\Categoria;
use App\Models\Registro;
use App\Models\User;
use App\Mail\CPIMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ActividadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/../auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/ntf', function () {
    $correo = new CPIMAilable;
    Mail::to('webqsc@gmail.com')->send($correo);
    return "Mensaje enviado";
});
Route::get('/actividades/{id}/{act_cli_id}/{act_cat_id}/edit', [ActividadController::class,'edit']);
Route::get('/dashboard', [ActividadController::class,'board']);

Route::resource('/actividades','App\Http\Controllers\ActividadController');
Route::resource('/categorias','App\Http\Controllers\CategoriaController');
Route::resource('/clientes','App\Http\Controllers\ClienteController');
Route::resource('/registros','App\Http\Controllers\RegistroController');
Route::resource('/slas','App\Http\Controllers\SlaController');
Route::resource('/areas','App\Http\Controllers\AreaController');



Route::middleware(['auth:sanctum', 'verified'])->get('/actividades', [ActividadController::class,'index'])->name('actividades');


/**/

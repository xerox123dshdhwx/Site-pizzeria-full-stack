<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('modele');
});Route::get('/', function () {
    return view('modele');
});

$route = Route::get('/noms','App\Http\Controllers\UserController@index')->name('noms');
$route = Route::get('/pizza','App\Http\Controllers\PizzaController@print')->name('pizza');
Route::view('/admin','admin.admin_home')->middleware('auth')->name('admin')
    ->middleware('is_admin');
Route::get('/login', [AuthenticatedSessionController::class,'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store']);

Route::get('/logout', [AuthenticatedSessionController::class,'logout'])->name('logout');;

Route::get('/register', [RegisterController::class,'create'])->name('register');;
Route::post('/register', [RegisterController::class,'store']);


Route::get('/pizza/create', [\App\Http\Controllers\PizzaController::class, 'createForm_pizza'])->name('create');
Route::post('/pizza/create', [\App\Http\Controllers\PizzaController::class, 'create_pizza']);

//edit
Route::get('/pizza/{id}/edit', [\App\Http\Controllers\PizzaController::class, 'showEditForm']
)->name('nomEditForm')->middleware('auth')->middleware('is_admin');

Route::post('/pizza/{id}/edit', [\App\Http\Controllers\PizzaController::class, 'edit']
)->name('editNom')->middleware('auth')->middleware('is_admin');
//del
Route::get('/pizza/{id}/delete', [\App\Http\Controllers\PizzaController::class, 'nomDeleteForm']
)->name('nomDeleteForm')->middleware('auth')->middleware('is_admin');

Route::post('/pizza/{id}/delete', [\App\Http\Controllers\PizzaController::class, 'delete']
)->name('DeleteNom')->middleware('auth')->middleware('is_admin');

Route::get('/commande/paginate',[\App\Http\Controllers\CommandeController::class, 'produitsListPaginare'])->name('commande');

Route::get('/user/{id}/edit', [\App\Http\Controllers\UserController::class, 'editform']
)->name('editUser');

Route::post('/user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit']
)->name('edit');

Route::get('/pizza/{id}/add_panier', [\App\Http\Controllers\PizzaController::class, 'add_panier_form']
)->name('add_panier');

Route::post('/pizza/add_panier', [\App\Http\Controllers\PizzaController::class,'store'])->name('panier');
Route::get('/pizza/add_panier_modif/{id}', [\App\Http\Controllers\PizzaController::class,'panier_modif'])->name('panier_modif');
Route::get('/pizza/add_panier', [\App\Http\Controllers\PizzaController::class,'vue_panier'])->name('panier_get');
//delee pizza
Route::get('/pizza/delete_pizza/{id}', [\App\Http\Controllers\PizzaController::class,'delete_pizza'])->name('delete_pizza');

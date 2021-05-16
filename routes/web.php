<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\controllerTurma;

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

// ['as' => 'admin.listar', 'uses' => 'Admin\CandidaturaController@index']


// Route::get('/', function () {
//     return view('site.index');
// });
//Tela Inicial
Route::get('/   ', ['as' => 'site', 'uses' => 'Site\HomeController@index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//site inicial inicio
Route::get('/', ['as' => 'site.site', 'uses' => 'SiteController@index']);
//site inicial fim

//User-Start
Route::get('site/users/cadastrar/', ['as' => 'matriculas.cadastrar', 'uses' => 'Site\UserController@create']);
Route::post('site/users/salvar', ['as' => 'users.salvar', 'uses' => 'Site\UserController@salvar']);
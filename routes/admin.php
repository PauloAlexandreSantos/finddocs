<?php

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

/*Route::get('/', ['as' => 'raiz', 'uses' => 'Admin\HomeController@raiz']);*/

Route::get('/home', ['as' => 'home', 'uses' => 'Admin\HomeController@raiz']);
Route::get('users/cadastrar', ['as' => 'encarregado', 'uses' => 'Site\UserController@create']);
Route::post('users/salvar', ['as' => 'encarregado.salvar', 'uses' => 'Site\UserController@salvar']);
// Route::get('admin/users/cadastrar', ['as' => 'admin.users.cadastrar', 'uses' => 'Admin\UserController@create']);


Route::middleware('auth:sanctum')->group(function () {
    //User-Start
    Route::get('admin/users/cadastrar', ['as' => 'admin.users.encarregado', 'uses' => 'Site\UserController@create']);
    Route::get('admin/users/cadastrar', ['as' => 'admin.users.cadastrar', 'uses' => 'Admin\UserController@create']);
    Route::get('admin/users/listar', ['as' => 'admin.users', 'uses' => 'Admin\UserController@index']);
    Route::get('admin/users/listar/imprimir', ['as' => 'admin.users.listar.imprimir', 'uses' => 'Admin\UserController@imprimir_lista']);
    Route::post('admin/users/salvar', ['as' => 'admin.users.salvar', 'uses' => 'Admin\UserController@salvar']);
    Route::get('admin/users/excluir/{id}', ['as' => 'admin.users.excluir', 'uses' => 'Admin\UserController@excluir']);
    Route::put('admin/users/atualizar/{id}', ['as' => 'admin.users.atualizar', 'uses' => 'Admin\UserController@atualizar']);
    Route::get('admin/users/ver/{id}', ['as' => 'users', 'uses' => 'Admin\UserController@ver']);
    Route::get('admin/users/editar/{id}', ['as' => 'admin.users.editar', 'uses' => 'Admin\UserController@editar']);
    //User-End

    


    Route::group(['prefix' => 'classes'], function () {
        Route::get('', ['as' => 'classes', 'uses' => 'Admin\ClasseController@listar']);
        Route::get('criar', ['as' => 'classes.criar', 'uses' => 'Admin\ClasseController@criar']);
        Route::post('cadastrar', ['as' => 'classes.cadastrar', 'uses' => 'Admin\ClasseController@cadastrar']);
        Route::get('{id}/eliminar', ['as' => 'classes.eliminar', 'uses' => 'Admin\ClasseController@eliminar']);
        Route::get('{id}/editar', ['as' => 'classes.editar', 'uses' => 'Admin\ClasseController@editar']);
        Route::put('{id}/actualizar', ['as' => 'classes.actualizar', 'uses' => 'Admin\ClasseController@actualizar']);
    });


});

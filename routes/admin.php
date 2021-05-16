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




    Route::group(['prefix' => 'admin.category'], function () {
        Route::get('', ['as' => 'admin.category', 'uses' => 'Admin\CategoryController@index']);
        Route::get('create', ['as' => 'admin.category.create', 'uses' => 'Admin\CategoryController@create']);
        Route::post('store', ['as' => 'admin.category.store', 'uses' => 'Admin\CategoryController@store']);
        Route::get('{id}/destroy', ['as' => 'admin.category.destroy', 'uses' => 'Admin\CategoryController@destroy']);
        Route::get('{id}/edit', ['as' => 'admin.category.edit', 'uses' => 'Admin\CategoryController@edit']);
        Route::put('{id}/update', ['as' => 'admin.category.update', 'uses' => 'Admin\CategoryController@update']);
    });

    Route::group(['prefix' => 'admin.citizen'], function () {
        Route::get('', ['as' => 'admin.citizen', 'uses' => 'Admin\CitizenController@index']);
        Route::get('create', ['as' => 'admin.citizen.create', 'uses' => 'Admin\CitizenController@create']);
        Route::post('store', ['as' => 'admin.citizen.store', 'uses' => 'Admin\CitizenController@store']);
        Route::get('{id}/destroy', ['as' => 'admin.citizen.destroy', 'uses' => 'Admin\CitizenController@de']);
        Route::get('{id}/edit', ['as' => 'admin.citizen.edit', 'uses' => 'Admin\CitizenController@edit']);
        Route::put('{id}/update', ['as' => 'admin.citizen.update', 'uses' => 'Admin\CitizenController@update']);
    });
});

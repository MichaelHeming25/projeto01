<?php

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


Route::prefix('/')->group(function () {

    Auth::routes();
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('tip.usuario');
    Route::post('/login', 'Auth\LoginController@login')->name('tip.acessar');
    Route::get('/logout', 'Auth\LoginController@logout')->name('tip.sair');
    Route::get('/recuperarsenha', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('tip.recuperar.senha');

    Route::get('/home', 'Controller@index')->name('index');

    //busca
    Route::post('/busca', 'Controller@busca');

    // --------- // -------- // --------- USUARIOS --------- // -------- // ---------

    // Usuarios
    Route::get('/usuarios', 'admin\UsuariosController@usuarios')->name('index.usuarios');

    //Cadastrar usuarios
    Route::get('/cadastrar', 'admin\UsuariosController@cadastrar')->name('cadastrar.usuarios');
    Route::POST('/cadastrar/salvar', 'admin\UsuariosController@novoCadastro')->name('cadastrar.usuarios.salvar');

    //editar usuarios
    Route::get('/usuarios/editar/{id}', 'admin\UsuariosController@editar')->name('editar.usuarios');
    Route::post('/usuarios/editar/salvar/{id}', 'admin\UsuariosController@editarFinalizado')->name('editar.usuarios.salvar');

    //Remover usuarios
    Route::get('/usuarios/remover/{id}', 'admin\UsuariosController@remover')->name('remover.usuarios');;

    // --------- // -------- // --------- CLIENTES --------- // -------- // ---------

    // Clientes
    Route::get('/clientes', 'admin\clientesController@index')->name('index.clientes');

    //Cadastrar clientes
    Route::get('/cadastrarClientes', 'admin\clientesController@cadastrar')->name('cadastrar.clientes');
    Route::POST('/cadastrarClientes/salvar', 'admin\clientesController@novoCadastro')->name('cadastrar.clientes.salvar');

    //editar clientes
    Route::get('/clientes/editar/{id}', 'admin\clientesController@editar')->name('editar.clientes');
    Route::post('/clientes/editar/salvar/{id}', 'admin\clientesController@editarFinalizado')->name('editar.clientes.salvar');

    // vermais
    Route::get('/clientes/vermais/{id}', 'admin\clientesController@vermais')->name('vermais.clientes');

    //Remover clientes
    Route::get('/clientes/remover/{id}', 'admin\clientesController@remover')->name('remover.clientes');

    // --------- // -------- // --------- CLIENTES --------- // -------- // ---------

});
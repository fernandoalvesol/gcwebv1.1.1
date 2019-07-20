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

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function () {
   
     //Routes Users
    Route::any('usuarios/pesquisar', 'Painel\UserController@search')->name('usuarios.search');
    Route::resource('usuarios', 'Painel\UserController');
    
    Route::get('/', 'Painel\PainelController@first');
        
    //Rota Tomadores
    Route::resource('tomador', 'Painel\TomadorController');
    Route::any('tomadores/pesquisar', 'Painel\TomadorController@search')->name('tomadores.search');
    
     //Rota Setores
    Route::resource('setor', 'Painel\SetoresController');
    Route::any('setor/pesquisar', 'Painel\SetoresController@search')->name('setor.search');
      
        
     //Rota Não conformidades
    Route::resource('conformidades', 'Painel\ConformidadesController');
    Route::any('conformidades/pesquisar', 'Painel\ConformidadesController@search')->name('conformidades.search');
   
     /* Rota de Imprimir Conformidades */
    Route::get('conformidades/imprimir/{id}', 'Painel\ConformidadesController@imprimir')->name('conformidades.imprimir');
    
    /*Rota de Delete*/
    
    Route::get('conformidades/destroy/{id}', 'Painel\ConformidadesController@destroy')->name('conformidades.destroy');
    
    //Rota de Usuarios
    Route::resource('/usuarios', 'Painel\UserController');
    
});



/* * ***********************************************************
 * Rotas de Autenticação de Login
 */
//Autenticação de Rotas
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Password e Resetes de Senhas

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/', 'Painel\PainelController@index');

Route::get('acessar', 'Painel\PainelController@acessar')->name('acessar');
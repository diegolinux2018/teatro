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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Declaraciones de los routers para el teatro
Route::get('/teatro', 'TeatroController@listar')->name('teatro.listar');
Route::get('/teatro_get', 'TeatroController@get_teatros')->name('teatro.get_teatros');
Route::post('/teatro_guardar', 'TeatroController@guardar')->name('teatro.guardar');
Route::get('/teatro_editar', 'TeatroController@editar')->name('teatro.editar');
Route::post('/teatro_eliminar', 'TeatroController@eliminar')->name('teatro.eliminar');

//Declaraciones de los routers para las zonas del teatro
Route::get('/zona', 'ZonaController@listar')->name('zona.listar');
Route::get('/zona_get', 'ZonaController@get_zonas')->name('zona.get_zonas');
Route::post('/zona_guardar', 'ZonaController@guardar')->name('zona.guardar');
Route::get('/zona_editar', 'ZonaController@editar')->name('zona.editar');
Route::post('/zona_eliminar', 'ZonaController@eliminar')->name('zona.eliminar');

//Declaraciones de los routers para las reservas
Route::get('/reserva/index', 'ReservaController@index')->name('reserva.index');
Route::get('/reserva', 'ReservaController@listar')->name('reserva.listar');
Route::post('/reserva_guardar', 'ReservaController@guardar')->name('reserva.guardar');
Route::get('/reserva_editar', 'ReservaController@editar')->name('reserva.editar');
Route::post('/reserva_eliminar', 'ReservaController@eliminar')->name('reserva.eliminar');

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

//Rutas de prueba
Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/pruebas/{nombre?}', function($nombre=null){
    $text = $nombre;
    
    return view('pruebas', array(
        'texto' => $text
    ));

});


Route::get('/test-orm','App\Http\Controllers\PruebasController@testOrm');


//Rutas del API
Route::get('/usuario/pruebas','App\Http\Controllers\UserController@pruebas');
Route::get('/categoria/pruebas','App\Http\Controllers\CategoryController@pruebas');
Route::get('/libro/pruebas','App\Http\Controllers\BookController@pruebas');
Route::get('/borrow/pruebas','App\Http\Controllers\BorrowController@pruebas');


//Rutas controlador usuario
Route::post('/api/register', 'App\Http\Controllers\UserController@register');
Route::post('/api/login', 'App\Http\Controllers\UserController@login');


//Ruta de controlador de categoria
Route::resource('/api/category', 'App\Http\Controllers\CategoryController');

//Ruta de controlador de book
Route::resource('/api/book', 'App\Http\Controllers\BookController');
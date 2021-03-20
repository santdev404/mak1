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





//Ruta de controlador de categoria
Route::resource('/api/category', 'App\Http\Controllers\CategoryController');

//Ruta de controlador de book
Route::put('/api/book/status/{id}', 'App\Http\Controllers\BookController@bookStatus');
Route::resource('/api/book', 'App\Http\Controllers\BookController');


//Ruta de controllador book-user
Route::get('/api/borrow/{id}','App\Http\Controllers\BorrowController@getUserByBookId');
Route::put('/api/borrow/assign/{id}','App\Http\Controllers\BorrowController@updateAssignedTo');
Route::put('/api/borrow/unassign/{id}','App\Http\Controllers\BorrowController@updateUnassignedTo');


//Ruta de controlador user
Route::get('/api/users','App\Http\Controllers\UserController@getUsers');

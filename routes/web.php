<?php

use Illuminate\Support\Facades\Auth;
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

//**********AUTENTICACION**********//
Auth::routes();
Route::view('/', 'welcome' )->name('welcome');
Route::view('/admin', 'index' )->middleware('auth')->name('admin');

//**********CATEGORIAS**********//
Route::resource('/categorias', 'CategoryController')->names('category');

//**********PRODUCTOS**********//
Route::resource('/productos', 'ProductController')->names('product');

//**********ARBOL DE CARPETAS**********//
Route::resource('/carpetas', 'FolderController')->names('folder');



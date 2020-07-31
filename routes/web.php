<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


Route::middleware('auth')
    ->group(function (){
    

    Route::view('/admin', 'index' )->name('admin');

    //**********CATEGORIAS**********//
    Route::resource('/categorias', 'CategoryController')->names('category');

    //**********PRODUCTOS**********//
    Route::resource('/productos', 'ProductController')->names('product');

    //**********ARBOL DE CARPETAS**********//
    Route::resource('/carpetas', 'FolderController')->names('folder');

    //**********COTIZACIÓNES**********//
    Route::resource('/cotizaciones', 'EstimateController')->names('estimate');
    Route::post('/agregarproducto', 'EstimateController@addCotizacion')->name('estimateadd');

    //**********PDF**********//
    Route::get('/pdf/{id?}', 'EstimateController@reporte')->name('pdf');

    //**********EMAIL**********//
    Route::get('/email/{id?}', 'EstimateController@email')->name('email');

});




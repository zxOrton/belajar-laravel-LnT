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

Route::get('/',  function () {
    return view('welcome');
});

// HTTP Method
// GET => nampilin data
// POST => kirim data
// PATCH atau PUT => update data
// DELETE => delete data
Route::get('/articles', 'ArticleController@index');

Route::prefix('/article')->group(function() {
    Route::get('/create', 'ArticleController@create')->name('article.create');
    Route::post('/create', 'ArticleController@store')->name('article.store');

    Route::get('/{id}', 'ArticleController@show')->name('article.show');

    Route::get('/edit/{id}', 'ArticleController@edit')->name('article.edit');
    Route::patch('/edit/{id}', 'ArticleController@update')->name('article.update');

    Route::delete('/delete/{id}', 'ArticleController@delete')->name('article.delete');
});

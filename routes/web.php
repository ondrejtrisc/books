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

Route::get('/api/books', 'APIBookController@index');

Route::get('/books', 'BookController@index');

Route::get('/books-orm', 'BookORMController@index');
Route::get('/books-orm/create', 'BookORMController@create');
Route::get('/books-orm/{id}', 'BookORMController@show');
Route::get('/books-orm/{id}/edit', 'BookORMController@edit');
Route::get('/books-orm/{id}/delete', 'BookORMController@delete');

Route::get('/publishers', 'PublisherController@index');
Route::get('/publishers/create', 'PublisherController@create');
Route::get('/publishers/{publisher_id}', 'PublisherController@show');

Route::get('/cart', 'CartController@index');
Route::get('/cart/{book_id}', 'CartController@add');

Route::post('/publishers', 'PublisherController@store');
Route::post ('/books-orm', 'BookORMController@store');
Route::post('/books-orm/{id}/edit', 'BookORMController@update');

Route::post('/review/{book_id}', 'ReviewController@store')->middleware('auth');
Route::delete('/review/{id}', 'ReviewController@delete')->middleware('can:admin');

Route::get('/books-qb', 'BookQueryBuilderController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

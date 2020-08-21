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


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('home');
    });
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('home');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/authors', 'AuthorController@index')->name('author.index');
    Route::get('/books', 'BookController@index')->name('books.index');
    Route::get('/books/borrow/{id}', 'BookController@borrow');
    Route::post('/books/create', 'BookController@create')->name('books.create');
    Route::get('/books/edit/{id}', 'BookController@edit')->name('books.edit');
    Route::get('/books/delete/{id}', 'BookController@delete')->name('books.delete');
    Route::post('/books/update/{id}', 'BookController@update')->name('book.update');
    Route::get('/authors/edit/{id}', 'AuthorController@edit')->name('author.edit');
    Route::get('/authors/delete/{id}', 'AuthorController@delete')->name('author.delete');
    Route::post('/authors/create', 'AuthorController@create')->name('author.create');
    Route::post('/authors/update/{id}', 'AuthorController@update')->name('author.update');
});

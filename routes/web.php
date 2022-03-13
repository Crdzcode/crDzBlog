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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@listar')->name('listarPosts')->middleware('admin.check');
Route::get('/posts/create', 'PostsController@criar')->name('criarPost');
Route::post('/posts/store', 'PostsController@salvar')->name('salvarPost');
Route::get('/posts/edit/{id}', 'PostsController@editar')->name('editarPost');
Route::post('/posts/update/{id}', 'PostsController@atualizar')->name('atualizarPost');
Route::get('/posts/destroy/{id}', 'PostsController@deletar')->name('deletarPost');

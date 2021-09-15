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



Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
    Route::get('/todos', 'TodoController@index')->name('todos');
    Route::get('todos/create', 'TodoController@create')->name("todos.create");
    Route::post('todos/store', 'TodoController@store')->name("todos.store");
    Route::get('todos/edit/{id}', 'TodoController@edit')->name("todos.edit");
    Route::post('todos/update', 'TodoController@update')->name("todos.update");
    Route::get('todos/show/{id}', 'TodoController@show')->name("todos.show");
    Route::get('todos/destroy/{id}', 'TodoController@destroy')->name("todos.destroy");


});



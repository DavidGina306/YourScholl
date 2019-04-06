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

Route::get('/home', 'HomeController@index')->name('home');


//professores
Route::get('/professores', 'ProfessorController@index')->name('home');
Route::get('professores/create', 'ProfessorController@create');
Route::post('professores', 'ProfessorController@store');
Route::get('professores/show', 'ProfessorController@show')->name('professores.show');
Route::get('professores/editar/{id}', 'ProfessorController@edit');
Route::post('professores/editar', 'ProfessorController@update');
Route::get('professores/status/{id}/{status}', 'ProfessorController@editStatus');
Route::post('professores/status/{id}/{status}', 'ProfessorController@editStatus');
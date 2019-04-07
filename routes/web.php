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

Route::get('/', 'HomeController@index')->name('home');


//professores
Route::get('/professores', 'ProfessorController@index')->name('home');
Route::get('professores/create', 'ProfessorController@create');
Route::post('professores', 'ProfessorController@store');
Route::get('professores/show', 'ProfessorController@show')->name('professores.show');
Route::get('professores/editar/{id}', 'ProfessorController@edit');
Route::post('professores/editar', 'ProfessorController@update');
Route::get('professores/status/{id}/{status}', 'ProfessorController@editStatus');
Route::post('professores/status/{id}/{status}', 'ProfessorController@editStatus');


//cursos
Route::get('/cursos', 'CursoController@index')->name('index');
Route::get('cursos/create', 'CursoController@create');
Route::post('cursos', 'CursoController@store');
Route::get('cursos/show', 'CursoController@show')->name('cursos.show');
Route::get('cursos/editar/{id}', 'CursoController@edit');
Route::post('cursos/editar', 'CursoController@update');
Route::get('cursos/status/{id}/{status}', 'CursoController@editStatus');
Route::post('cursos/status/{id}/{status}', 'CursoController@editStatus');


//cursos
Route::get('/alunos', 'AlunoController@index')->name('index');
Route::get('alunos/create', 'AlunoController@create');
Route::post('alunos', 'AlunoController@store');
Route::get('alunos/show', 'AlunoController@show')->name('aluno.show');
Route::get('alunos/editar/{id}', 'AlunoController@edit');
Route::post('alunos/editar', 'AlunoController@update');
Route::get('alunos/status/{id}/{status}', 'AlunoController@editStatus');
Route::post('alunos/status/{id}/{status}', 'AlunoController@editStatus');
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

//Certificados

Route::get('/certificado/models', 'CertificadoController@models');
Route::get('/find/findue/{ue}/{select}', 'CertificadoController@findue');
Route::get('/find/findgast/{gast}', 'CertificadoController@findgast');
Route::get('/findnombre/{da}/{ue}/{prog}/{act}/{proy}', 'CertificadoController@findnombre');
Route::get('/getcertifi/{year}', 'CertificadoController@getcertifi');
Route::post('/new', 'CertificadoController@new');
Route::get('/cert2/{id}', 'CertificadoController@getcert2');
Route::post('/cert2/create', 'CertificadoController@addcert2');
Route::delete('/cert2/delete/{id}', 'CertificadoController@destroy2');
Route::resource('certificado', 'CertificadoController');
Route::resource('registro', 'RegistroController');
Route::get('/getregistro/{year}', 'RegistroController@getregistro');


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

Route::get('/teste', function () {
    return view('teste');
});

/*Route::get('/email/{id}', function ($id) {
    $user = \App\User::findOrFail($id);
    \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\UserRegistered($user));
});*/


Route::get('/', 'site\homeController@index');
Route::post('/contato', 'site\homeController@contato');
Route::get('/service', 'site\serviceController@index');
Route::get('/service/{id}', 'site\serviceController@detalhes');
Route::get('/sobre', 'site\sobreController@index');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'admin\HomeController@index')->name('home');
    Route::get('/usuarios', 'admin\UsuarioController@index')->name('usuarios');
    Route::get('/servicos', 'admin\ServicoController@index')->name('servicos');
    Route::get('/mensagens', 'admin\MensagemController@index')->name('mensagens');
});



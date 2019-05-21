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

/*Route::get('/email/{id}', function ($id) {
    $user = \App\User::findOrFail($id);
    \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\UserRegistered($user));
});*/


Route::get('/', 'site\homeController@index');
Route::post('/contato', 'site\homeController@contato');
Route::get('/service', 'site\serviceController@index');
Route::get('/service/{id}', 'site\serviceController@detalhes');
Route::get('/sobre', 'site\sobreController@index');
Route::get('/term/{type}', 'site\TermController@index');

//rota para definir que tipo de usuário esta se cadastrando: 1 consultor 2 empresa
//servirá para definir os termos do contrato a serem exibidos
Route::get('/registerTipo/{tipo}', 'Auth\RegisterController@definirUsuario');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/home', 'admin\HomeController@index')->name('home');

    Route::get('/usuarios', 'admin\UsuarioController@index')->name('usuarios');
    Route::get('/usuarios/create', 'admin\UsuarioController@create')->name('usuarios.create');
    Route::post('/usuarios/store', 'admin\UsuarioController@store')->name('usuarios.store');
    Route::get('/usuarios/{id}', 'admin\UsuarioController@edit')->name('usuarios.edit');
    Route::post('/usuarios/update/{id}', 'admin\UsuarioController@update')->name('usuarios.update');
    Route::get('/usuarios/detail/{id}', 'admin\UsuarioController@detail')->name('usuarios.detail');
    Route::get('/usuarios/delete/{id}', 'admin\UsuarioController@delete')->name('usuarios.delete');

    Route::get('/profile', 'admin\ProfileController@index')->name('profile');
    Route::post('/profile/update/{id}', 'admin\ProfileController@update')->name('profile.update');

    //Route::post('/formation/store', 'admin\FormationController@store')->name('formation.store');
    //Route::post('/formation/update/{id}', 'admin\FormationController@update')->name('formation.update');
    //Route::post('/formation/delete/{id}', 'admin\FormationController@delete')->name('formation.delete');

    Route::get('/servicos', 'admin\ServicoController@index')->name('servicos');
    Route::get('/servicos/create', 'admin\ServicoController@create')->name('servicos.create');
    Route::post('/servicos/store', 'admin\ServicoController@store')->name('servicos.store');
    Route::get('/servicos/{id}', 'admin\ServicoController@edit')->name('servicos.edit');
    Route::post('/servicos/update/{id}', 'admin\ServicoController@update')->name('servicos.update');
    Route::get('/servicos/detail/{id}', 'admin\ServicoController@detail')->name('servicos.detail');
    Route::get('/servicos/delete/{id}', 'admin\ServicoController@delete')->name('servicos.delete');

    Route::get('/servicosContent', 'admin\ServicoController@contentIndex')->name('servicosContent');
    Route::get('/servicosContent/create', 'admin\ServicoController@contentCreate')->name('servicosContent.create');
    Route::post('/servicosContent/store', 'admin\ServicoController@contentStore')->name('servicosContent.store');
    Route::get('/servicosContent/{id}', 'admin\ServicoController@contentEdit')->name('servicosContent.edit');
    Route::post('/servicosContent/update/{id}', 'admin\ServicoController@contentUpdate')->name('servicosContent.update');
    Route::get('/servicosContent/detail/{id}', 'admin\ServicoController@contentDetail')->name('servicosContent.detail');
    Route::get('/servicosContent/delete/{id}', 'admin\ServicoController@contentDelete')->name('servicosContent.delete');

    Route::get('/comofunciona', 'admin\ComoFuncionaController@index')->name('comofunciona');
    Route::get('/comofunciona/create', 'admin\ComoFuncionaController@create')->name('comofunciona.create');
    Route::post('/comofunciona/store', 'admin\ComoFuncionaController@store')->name('comofunciona.store');
    Route::get('/comofunciona/{id}', 'admin\ComoFuncionaController@edit')->name('comofunciona.edit');
    Route::post('/comofunciona/update/{id}', 'admin\ComoFuncionaController@update')->name('comofunciona.update');
    Route::get('/comofunciona/detail/{id}', 'admin\ComoFuncionaController@detail')->name('comofunciona.detail');
    Route::get('/comofunciona/delete/{id}', 'admin\ComoFuncionaController@delete')->name('comofunciona.delete');

    Route::get('/mensagens', 'admin\MensagemController@index')->name('mensagens');

    Route::get('/formation', 'admin\FormationController@index');
    Route::get('/formation/edit/{id}', 'admin\FormationController@edit');
    Route::post('/formation/update/{id}', 'admin\FormationController@update');
    Route::post('/formation/store', 'admin\FormationController@store');
    Route::get('/formation/delete/{id}', 'admin\FormationController@delete');

    Route::get('/experience', 'admin\ExperienceController@index');
    Route::get('/experience/edit/{id}', 'admin\ExperienceController@edit');
    Route::post('/experience/update/{id}', 'admin\ExperienceController@update');
    Route::post('/experience/store', 'admin\ExperienceController@store');
    Route::get('/experience/delete/{id}', 'admin\ExperienceController@delete');

    Route::get('/terms', 'admin\TermController@index')->name('terms');
    Route::get('/terms/create', 'admin\TermController@create')->name('terms.create');
    Route::post('/terms/store', 'admin\TermController@store')->name('terms.store');
    Route::get('/terms/{id}', 'admin\TermController@edit')->name('terms.edit');
    Route::post('/terms/update/{id}', 'admin\TermController@update')->name('terms.update');
    Route::get('/terms/detail/{id}', 'admin\TermController@detail')->name('terms.detail');
    Route::get('/terms/delete/{id}', 'admin\TermController@delete')->name('terms.delete');
    
});



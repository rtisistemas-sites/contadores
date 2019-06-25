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


Route::get('/', function () {
    return view('principal');
});
*/


Route::any('/', 'WebsiteController@index') ;
Route::get('/principal', 'WebsiteController@index') ;
Route::get('/quemsomos', 'WebsiteController@quemsomos') ;
Route::get('/servicos', 'WebsiteController@servicos') ;
Route::get('/areas_atuacao/{id}', 'WebsiteController@areas_atuacao') ;
Route::get('/noticias/{id}', 'WebsiteController@noticias') ;
Route::get('/noticiasapresenta/{id}', 'WebsiteController@noticiasapresenta') ;
Route::get('/artigos/{id}', 'WebsiteController@artigos') ;
Route::get('/artigosapresenta/{id}', 'WebsiteController@artigosapresenta') ;
Route::get('/downloads', 'WebsiteController@downloads') ;
Route::get('/informativos', 'WebsiteController@informativos') ;
Route::get('/link_uteis', 'WebsiteController@link_uteis') ;
Route::get('/contato', 'WebsiteController@contato') ;
Route::post('/contatoemail', 'WebsiteController@contatoemail');
Route::post('/newsletter', 'WebsiteController@newsletter');
Route::post('/newsletter', 'WebsiteController@newsletter2');
Route::any('/buscasite', 'WebsiteController@buscasite') ;

Route::get('/econlex', 'WebsiteController@arearestrita') ;
Route::any('/acessar_ar', 'WebsiteController@acessar_ar') ;

Route::get('/consulte/conteudo/{id}', 'ConsulteController@conteudo') ;


Route::any('/id/{id}', 'WebsiteController@cliente_setado') ;

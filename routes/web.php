<?php
use App\Artigo;

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
    $lista = Artigo::listaArtigosSite(3);
    return view('site', compact('lista'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    
    if($artigo){
        return view('artigo', compact('artigo'));
    }

    return redirect()->route('site');   
    
})->name('artigo');

Auth::routes();

Route::get('admin', 'AdminController@index')->name('admin');

Route::group(
    [
        'middleware' => ['auth'], 
        'prefix' => 'admin', 
        'namespace' => 'Admin'
    ], 
    function () {
        Route::resource('artigos', 'ArtigoController');
        Route::resource('usuarios', 'UsuarioController');
        Route::resource('autores', 'AutorController');
        Route::resource('adm', 'AdminController');
    }
);

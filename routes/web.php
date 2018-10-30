<?php
use App\Artigo;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    

    if(isset($request->busca) && $request->busca != ""){
        $busca = $request->busca;
        $lista = Artigo::listaArtigosSite(3, $busca);
    }else{
        $lista = Artigo::listaArtigosSite(3);
        $busca = "";
    }

    
    return view('site', compact('lista', 'busca'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    
    if($artigo){
        return view('artigo', compact('artigo'));
    }

    return redirect()->route('site');   
    
})->name('artigo');

Auth::routes();

Route::get('admin', 'AdminController@index')->name('admin')->middleware('can:autor');

Route::group(
    [
        'middleware' => ['auth'], 
        'prefix' => 'admin', 
        'namespace' => 'Admin'
    ], 
    function () {
        Route::resource('artigos', 'ArtigoController')->middleware('can:autor');
        Route::resource('usuarios', 'UsuarioController')->middleware('can:eAdmin');
        Route::resource('autores', 'AutorController')->middleware('can:eAdmin');
        Route::resource('adm', 'AdminController')->middleware('can:eAdmin');
    }
);

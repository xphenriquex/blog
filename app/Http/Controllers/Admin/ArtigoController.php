<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artigo;
use App\User;
use Validator;
class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPaginas = json_encode([
            ["titulo" => "Admin", "url" => route('admin')],
            ["titulo" => "Lista de Artigos", "url" => ''],
        ]);
        
        $artigos = new Artigo();

        $listaArtigos = $artigos->listaArtigos(5);

        return view('admin.artigos.index', compact('listaPaginas', 'listaArtigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $dados = $request->all();
        $validacao = Validator::make($dados, [
            'titulo' => 'required',
            'descricao' => 'required',
            'conteudo' => 'required',
            'data' => 'required'
        ]);

        if($validacao->fails()){
            return redirect()
                ->back()
                ->withErrors($validacao)
                ->withInput();
        }
        
        $user = auth()->user();
        // $artigos = Artigo::find($user->id);
        

        // dd($user);
        // Artigo::create(['user_id' => $user->id]);

        $user->artigos()->create($dados);
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Artigo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $validacao = Validator::make($dados, [
            'titulo' => 'required',
            'descricao' => 'required',
            'conteudo' => 'required',
            'data' => 'required'
        ]);

        if($validacao->fails()){
            return redirect()
                ->back()
                ->withErrors($validacao)
                ->withInput();
        }
        $artigos = new Artigo();
        $user = auth()->user();
        
        $user->artigos()->find($id)->update($dados);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artigo::find($id)->delete();
        return redirect()->back();
    }
}

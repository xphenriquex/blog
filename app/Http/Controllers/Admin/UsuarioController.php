<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;
use Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPaginas = json_encode([
            ["titulo" => "Home", "url" => route('home')],
            ["titulo" => "Lista de Usuários", "url" => ''],
        ]);

        $listaModelo = User::select('id', 'name','email')->paginate(5);

        return view('admin.usuarios.index', compact('listaPaginas', 'listaModelo'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
        ]);

        if($validacao->fails()){
            return redirect()
                ->back()
                ->withErrors($validacao)
                ->withInput();
        }

        $dados['password'] = Hash::make($dados['password']);

        User::create($dados);
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
        return User::find($id);
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

        if(isset($dados['password']) && $dados['password'] != ""){
            $validacao = Validator::make($dados, [
                'name' => 'required|string|max:255',
                'email' => [
                    'required','string','email','max:255',
                    Rule::unique('users')->ignore($id)
                ],
                'password' => 'required|string|min:6|',
            ]);

            $dados['password'] = Hash::make($dados['password']);
        }else{

            $validacao = Validator::make($dados, [
                'name' => 'required|string|max:255',
                'email' => [
                    'required','string','email','max:255',
                    Rule::unique('users')->ignore($id)
                ],
            ]);
            unset($dados["password"]);
        }

        

        if($validacao->fails()){
            return redirect()
                ->back()
                ->withErrors($validacao)
                ->withInput();
        }

        User::find($id)->update($dados);
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
        User::find($id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPaginas = json_encode([
            ["titulo" => "Admin", "url" => ''],
        ]);

        $qtdArtigos = Artigo::count();
        $qtdUsuarios = User::count();
        $qtdAutores = User::where('autor','=','S')->count();
        $qtdAdmins = User::where('admin','=','S')->count();
        

        return view('admin', compact('listaPaginas', 'qtdArtigos', 'qtdUsuarios', 'qtdAutores', 'qtdAdmins'));
    }
}

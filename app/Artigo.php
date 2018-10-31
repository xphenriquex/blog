<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo', 'descricao', 'conteudo', 'data'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function listaArtigos($paginate)
    {   
        $user = auth()->user();
        
        if($user->admin == "S"){
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id', 'artigos.titulo','artigos.descricao',
                    'users.name','artigos.user_id','artigos.data'
                )
                ->whereNull('deleted_at')
                ->orderBy('artigos.id', 'DESC')
                ->paginate($paginate);
        }else{
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id', 'artigos.titulo','artigos.descricao',
                    'users.name','artigos.user_id','artigos.data'
                )
                ->whereNull('deleted_at')
                ->where('artigos.user_id', '=', $user->id)
                ->orderBy('artigos.id', 'DESC')
                ->paginate($paginate);
        }

        

        return $listaArtigos;
    }

    public static function listaArtigosSite($paginate, $busca = null)
    {

        if($busca){
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id', 'artigos.titulo','artigos.descricao',
                    'users.name as autor','artigos.user_id','artigos.data'
                )
                ->whereNull('deleted_at')
                ->whereDate('data', '<=', date('Y-m-d'))
                ->where(function($query) use ($busca){
                    $query
                    ->orWhere('titulo', 'like', '%' .$busca. '%')
                    ->orWhere('descricao', 'like', '%' .$busca. '%');
                })
                ->orderBy('data', 'asc')
                ->paginate($paginate);
        }else{
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id', 'artigos.titulo','artigos.descricao',
                    'users.name as autor','artigos.user_id','artigos.data'
                )
                ->whereNull('deleted_at')
                ->whereDate('data', '<=', date('Y-m-d'))
                ->orderBy('data', 'asc')
                ->paginate($paginate);
        }

        

        return $listaArtigos;
    }

}

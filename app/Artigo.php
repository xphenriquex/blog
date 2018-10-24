<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo', 'descricao', 'conteudo', 'data',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function listaArtigos()
    {
        $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select(
                    'artigos.id', 'artigos.titulo','artigos.descricao',
                    'users.name','artigos.user_id','artigos.data'
                )
                ->whereNull('deleted_at')
                ->paginate(5);

        return $listaArtigos;
    }
}

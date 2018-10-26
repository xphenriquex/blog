@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">
            
            <div class="card-deck">
                @foreach ($lista as $item)
                    <artigo-card
                        autor="{{ $item->autor }}"
                        data="{{ $item->data }}"
                        titulo="{{ $item->titulo }}"
                        descricao="{{ $item->descricao }}"
                        link="#leia-mais"
                        largura="18"
                        >
                    </artigo-card>
                @endforeach
            </div>
        </painel>
        
        <div class="center">
            {{ $lista }}
        </div>

    </pagina>


@endsection

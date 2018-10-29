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
                        link="{{ route('artigo', [$item->id, str_slug($item->titulo)] )}}"
                        largura="18"
                        >
                    </artigo-card>
                @endforeach
            </div>

            <div align="center">
                {{ $lista }}
            </div>

        </painel>
    </pagina>


@endsection

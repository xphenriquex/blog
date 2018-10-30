@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" 
                        type="search" 
                        name="busca"
                        placeholder="Buscar" 
                        aria-label="Search"
                        value="{{ isset($busca) ? $busca : '' }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" 
                    type="submit">Buscar</button>
                </form>
            </nav>

            <div class="card-deck">
                @foreach ($lista as $item)
                    <artigo-card
                        autor="{{ $item->autor }}"
                        data="{{ $item->data }}"
                        titulo="{{ str_limit($item->titulo, 30, "...") }}"
                        descricao="{{ str_limit($item->descricao, 40, "...") }}"
                        link="{{ route('artigo', [$item->id, str_slug($item->titulo)] )}}"
                        largura="18"
                        >
                    </artigo-card>
                @endforeach
            </div>
            <br>
            <div class="mx-auto" style="width: 200px;">
                {{ $lista }}
            </div>

        </painel>
    </pagina>


@endsection

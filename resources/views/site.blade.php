@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">
            
            {{-- <div class="card-deck"> --}}
                <artigo-card
                    autor="Paulo Henrique"
                    data="26/10/2018"
                    titulo="Desevolvimento web"
                    descricao="Aprenda tudo que gostaria de saber sobre desenvolvimento web e muito mais."
                    link="#leia-mais"
                    largura="18"
                    >
                </artigo-card>
            {{-- </div> --}}
        </painel>
    </pagina>
@endsection

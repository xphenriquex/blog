@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel>
            <h2 align="center">{{$artigo->titulo}}</h2>
            <h5 align="center">{{ $artigo->descricao }}</h5>
            <p>
                {!!$artigo->conteudo!!}
            </p>
            <p align="center">
                <small>Por: {{ $artigo->user->name }} - {{ date('d/m/Y', strtotime($artigo->data)) }}</small>
            </p>
        </painel>
    </pagina>


@endsection

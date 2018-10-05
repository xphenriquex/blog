@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição']"
                v-bind:itens="[[1, 'PHP OO', 'Curso de PHP OO'], [2, 'VUE JS', 'Curso de VUE JS']]"    
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="87869876876"
                ordem="asc" ordemColum="2"

            ></tabela-lista>
        </painel>

    </pagina>
@endsection


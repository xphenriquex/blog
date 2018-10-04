@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição']"
                v-bind:itens="[['PHP OO', 'Curso de PHP OO'], ['VUE JS', 'Curso de VUE JS']]"    
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="87869876876"

            ></tabela-lista>
        </painel>

    </pagina>
@endsection


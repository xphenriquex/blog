@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição']"
                v-bind:itens="[[1, 'PHP OO', 'Curso de PHP OO'], [2, 'VUE JS', 'Curso de VUE JS']]"    
                
            ></tabela-lista>
        </painel>

    </pagina>
@endsection


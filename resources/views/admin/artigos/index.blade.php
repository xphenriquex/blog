@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <breadcrumb v-bind:lista="{{ $listaPaginas }}"></breadcrumb>
            <modal-link nome="MeuModalTeste" tipo="link" conteudo="Criar" css=""></modal-link>
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição']"
                v-bind:itens="{{ $listaArtigos }}"    
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="87869876876"
                ordem="asc" ordemColum="2"

            ></tabela-lista>
        </painel>
    </pagina>

    <modal nome="MeuModalTeste">
        <painel titulo="Adcionar">
            <formulario css="aa" method="put" action="#add" enctype="multipart/form-data" token="123218544">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite um título">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite uma descrição">
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
            </formulario>
        </painel>
    </modal>
@endsection


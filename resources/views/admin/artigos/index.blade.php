@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <breadcrumb v-bind:lista="{{ $listaPaginas }}"></breadcrumb>
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição']"
                v-bind:itens="{{ $listaArtigos }}"    
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="87869876876"
                ordem="asc" ordemColum="2"
                modal="sim"
            ></tabela-lista>
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adcionar">
        <formulario id="formAdcionar" css="" method="put" action="#add" enctype="multipart/form-data" token="123218544">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite um título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite uma descrição">
            </div>
        </formulario>
        <span slot="botoes">
                <button form="formAdcionar" type="submit" class="btn btn-primary">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Adcionar">
        <formulario id="formEditar" css="" method="put" action="#edit" enctype="multipart/form-data" token="123218544">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Digite um título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Digite uma descrição">
            </div>
        </formulario>
        <span slot="botoes">
                <button form="formEditar" type="submit" class="btn btn-primary">Atualizar</button>
        </span>
        
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        <p>
            @{{ $store.state.item.descricao }}
        </p>
    </modal>
@endsection


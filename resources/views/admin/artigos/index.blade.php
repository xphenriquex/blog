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

    <modal nome="adicionar">
        <painel titulo="Adcionar">
            <formulario css="" method="put" action="#add" enctype="multipart/form-data" token="123218544">
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

    <modal nome="editar">
        <painel titulo="Editar">
            <formulario css="" method="put" action="#add" enctype="multipart/form-data" token="123218544">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Digite um título">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Digite uma descrição">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
            </formulario>
        </painel>
    </modal>
    <modal nome="detalhe">
        <painel v-bind:titulo="$store.state.item.titulo">
            <p>
                @{{ $store.state.item.descricao }}
            </p>
        </painel>
    </modal>
@endsection


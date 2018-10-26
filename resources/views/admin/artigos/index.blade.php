@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $error }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif

        <painel titulo="Lista de Artigos">
            <breadcrumb v-bind:lista="{{ $listaPaginas }}"></breadcrumb>
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição', 'Autor', 'Data']"
                v-bind:itens="{{ json_encode($listaArtigos) }}"    
                criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
                ordem="asc" ordemcolum="2"
                modal="sim"
            >
            </tabela-lista>
            <div align="center">
                {{ $listaArtigos }}
            </div>
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adcionar">
        <formulario id="formAdcionar" css="" method="post"
            action="{{ route('artigos.store') }}" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" 
                    name="titulo" placeholder="Digite um título"
                    value="{{ old('titulo') }}"
                >
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" 
                    name="descricao" placeholder="Digite uma descrição"
                    value="{{ old('descricao') }}"
                >
            </div>
            <div class="form-group">
                <label for="addConteudo">Conteúdo</label>
                <ckeditor 
                    name="conteudo"
                    id="addConteudo"
                    types=""
                    value="{{ old('conteudo') }}"
                ></ckeditor> 
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control"
                    id="data" name="data"
                    value="{{ old('data') }}"
                >
            </div>
        </formulario>
        <span slot="botoes">
                <button form="formAdcionar" type="submit" class="btn btn-primary">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" method="put" 
            v-bind:action="'/admin/artigos/' + $store.state.item.id"  
            enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" 
                    name="titulo" v-model="$store.state.item.titulo" 
                    placeholder="Digite um título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" 
                    name="descricao" v-model="$store.state.item.descricao" 
                >
            </div>
            <div class="form-group">
                <label for="editConteudo">Conteúdo</label>
                <ckeditor 
                    name="conteudo"
                    id="editConteudo"
                    types=""
                    v-model="$store.state.item.conteudo"
                    ></ckeditor>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control"
                    id="data" name="data" v-model="$store.state.item.data"
                >
            </div>
        </formulario>
        <span slot="botoes">
                <button form="formEditar" type="submit" class="btn btn-primary">Atualizar</button>
        </span>
        
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        <p> @{{ $store.state.item.descricao }} </p>
        <p> @{{ $store.state.item.conteudo }} </p>
    </modal>
@endsection


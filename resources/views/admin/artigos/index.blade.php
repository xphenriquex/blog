@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <breadcrumb v-bind:lista="{{ $listaPaginas }}"></breadcrumb>
            <modal-link nome="MeuModalTeste" tipo="link" conteudo="Criar" css=""></modal-link>
            <tabela-lista 
                v-bind:titulos="['#', 'Título', 'Descrição']"
                v-bind:itens="[[1, 'PHP OO', 'Curso de PHP OO'], [2, 'VUE JS', 'Curso de VUE JS']]"    
                criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="87869876876"
                ordem="asc" ordemColum="2"

            ></tabela-lista>
        </painel>
    </pagina>

    <modal nome="MeuModalTeste">
        <painel titulo="Adcionar">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </painel>
    </modal>
@endsection


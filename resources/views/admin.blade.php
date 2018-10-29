@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        
        <painel titulo="Dashboard">
            
            <breadcrumb v-bind:lista="{{ $listaPaginas }}"></breadcrumb>
            <div class="row">
                <div class="col-md-4">
                    <caixa qtd="{{ $qtdArtigos }}" titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="ion ion-pie-graph" ></caixa>      
                </div>

                <div class="col-md-4">
                    <caixa qtd="{{ $qtdUsuarios }}" titulo="Usuários" url="{{ route('usuarios.index') }}" cor="blue" icone="ion ion-person-stalker" ></caixa>      
                </div>

                <div class="col-md-4">
                    <caixa qtd="{{ $qtdAutores }}" titulo="Autores" url="{{ route('autores.index') }}" cor="green" icone="ion ion-person" ></caixa>      
                </div>

                <div class="col-md-4">
                    <caixa qtd="{{ $qtdAdmins }}" titulo="Administradores" url="{{ route('adm.index') }}" cor="red" icone="ion ion-person" ></caixa>      
                </div>
            </div>
        </painel>

    </pagina>
@endsection

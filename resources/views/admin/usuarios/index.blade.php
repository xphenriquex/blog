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

        <painel titulo="Lista de Usuários">
            <breadcrumb v-bind:lista="{{ $listaPaginas }}"></breadcrumb>
            <tabela-lista 
                v-bind:titulos="['#', 'Nome', 'E-mail']"
                v-bind:itens="{{ json_encode($listaModelo) }}"    
                criar="#criar" detalhe="/admin/usuarios/" editar="/admin/usuarios/" deletar="/admin/usuarios/" token="{{ csrf_token() }}"
                ordem="asc" ordemcolum="2"
                modal="sim"
            >
            </tabela-lista>
            <div align="center">
                {{ $listaModelo }}
            </div>
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adcionar">
        <formulario id="formAdcionar" css="" method="post"
            action="{{ route('usuarios.store') }}" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" 
                    name="name" placeholder="Digite seu Nome"
                    value="{{ old('name') }}"
                />
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" 
                    name="email" placeholder="Digite seu E-mail"
                    value="{{ old('email') }}"
                />
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <select class="form-control" id="autor" name="autor" >
                    <option value="">Selecione</option>    
                    <option {{ ( old('autor') && old('autor') == 'S' ? 'selected' : '' ) }} 
                        value="S">Sim</option>    
                    <option {{ ( old('autor') && old('autor') == 'N' ? 'selected' : '' ) }} 
                        value="N">Não</option>    
                </select>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" 
                    name="password" placeholder="Digite sua Senha"
                    value="{{ old('password') }}"
                />
            </div>
            
        </formulario>
        <span slot="botoes">
                <button form="formAdcionar" type="submit" class="btn btn-primary">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" method="put" 
            v-bind:action="'/admin/usuarios/' + $store.state.item.id"  
            enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" 
                    name="name" v-model="$store.state.item.name" 
                    placeholder="Digite seu Nome"
                />
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" 
                    name="email"  placeholder="Digite seu E-mail"
                    v-model="$store.state.item.email" 
                />
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <select class="form-control" id="autor" name="autor" v-model="$store.state.item.autor" >
                    <option value="">Selecione</option>    
                    <option  
                        value="S">Sim</option>    
                    <option 
                        value="N">Não</option>    
                </select>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" 
                    name="password" 
                />
            </div>
        </formulario>
        <span slot="botoes">
                <button form="formEditar" type="submit" class="btn btn-primary">Atualizar</button>
        </span>
        
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
        <p> @{{ $store.state.item.email }} </p>
    </modal>
@endsection


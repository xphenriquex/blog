@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <painel titulo="Dashboard">
                    Teste de conteúdo..

                    <div class="row">
                        <div class="col-md-4">
                            <caixa></caixa>      
                        </div>

                        <div class="col-md-4">
                            <painel titulo="Conteúdo 2" cor="bg-blue" borda="border-blue">
                                Teste de conteúdo..
                            </painel>        
                        </div>

                        <div class="col-md-4">
                            <painel titulo="Conteúdo 3" cor="bg-orange" borda="border-orange">
                                Teste de conteúdo..
                            </painel>        
                        </div>
                    </div>



                </painel>
            </div>
        </div>
    </div>

@endsection

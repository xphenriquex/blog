@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <a href="#criar">Criar</a>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>01/10/2018</td>
                            <td>
                                <a href="#">Editar</a> |
                                <a href="#">Excluir</a> 
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>02/10/2018</td>
                            <td>
                                <a href="#">Editar</a> |
                                <a href="#">Excluir</a> 
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>03/10/2018</td>
                            <td>
                                <a href="#">Editar</a> |
                                <a href="#">Excluir</a> 
                            </td>
                        </tr>
                </tbody>
            </table>

        </painel>

    </pagina>
@endsection


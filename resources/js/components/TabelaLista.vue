<template>
    
    <div>
        <a href="#criar">Criar</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="titulo in titulos">{{ titulo }}</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="(item, index) in itens">
                        <th scope="row">{{ (index + 1) }}</th>
                        <td v-for="i in item">{{ i }}</td>
                        <td>
                            <a href="#">Editar</a> |
                            <a href="#">Excluir</a> 
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    
</template>

<script>
    export default {
        props:['titulos', 'itens']
    }
</script>

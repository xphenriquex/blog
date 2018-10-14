<template>
    <div>
        
        <div class="form-group">
            <a 
                v-if="criar && !modal" v-bind:href="criar" 
                >
                Criar
            </a>
            <modal-link 
                v-if="criar && modal" 
                nome="adicionar" tipo="link" conteudo="Criar" 
                css="">
            </modal-link>

            <div class="form-group float-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>

        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th 
                        style="cursor:pointer" 
                        v-on:click="ordernaColuna(index)" 
                        scope="col"  
                        v-for="(titulo, index) in titulos">
                        {{ titulo }}
                    </th>
                    <th v-if="detalhe || editar || deletar" scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="(item, index) in lista">
                        <!-- <th scope="row">{{ (index + 1) }}</th> -->
                        <td scope="" v-for="i in item">{{ i }}</td>
                        <td 
                            v-if="detalhe || editar || deletar" 
                            >
                            <form 
                                v-bind:id="index" v-if="deletar && token" 
                                v-bind:action="deletar + item.id" method="post">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" v-bind:value="token">

                                <a 
                                    v-if="detalhe && !modal" v-bind:item="item" 
                                    v-bind:href="detalhe">
                                        Detalhe |
                                </a>
                                <modal-link 
                                    v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe"
                                    nome="detalhe"  tipo="link" conteudo="Detalhe |" 
                                    css="">
                                </modal-link>
                                
                                <a 
                                    v-if="editar && !modal" 
                                    v-bind:href="editar">
                                        Editar |
                                </a>
                                <modal-link 
                                    v-if="editar && modal" v-bind:item="item" 
                                    v-bind:url="editar"
                                    nome="editar" tipo="link" conteudo="Editar |" 
                                    css="">
                                </modal-link>
                                
                                <a href="#" v-on:click="executaForm(index)">Deletar</a>

                            </form>

                            <span v-if="!token">
                                <a 
                                    v-if="detalhe && !modal" v-bind:item="item" 
                                    v-bind:href="detalhe">
                                        Detalhe |
                                </a>
                                <modal-link 
                                    v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe"
                                    nome="detalhe" tipo="link" conteudo="Detalhe |" 
                                    css="">
                                </modal-link>


                                <a 
                                    v-if="editar && !modal" 
                                    v-bind:href="editar">
                                        Editar |
                                </a>
                                <modal-link 
                                    v-if="editar && modal" 
                                    v-bind:item="item" v-bind:url="editar"
                                    nome="editar" tipo="link" conteudo="Editar |" 
                                    css="">
                                </modal-link>
                            </span>   

                            <span v-if="!token && !deletar">
                                <a 
                                    v-if="detalhe && !modal" v-bind:item="item" 
                                    v-bind:href="detalhe">
                                    Detalhe |
                                </a>
                                <modal-link 
                                    v-if="detalhe && modal" 
                                    v-bind:item="item" v-bind:url="detalhe"
                                    nome="detalhe" tipo="link" conteudo="Detalhe |" 
                                    css="">
                                </modal-link>

                                <a 
                                    v-if="editar && !modal" v-bind:href="editar">
                                    Editar |
                                </a>
                                <modal-link 
                                    v-if="editar && modal" v-bind:item="item" 
                                    v-bind:url="editar"
                                    nome="editar" tipo="link" conteudo="Editar |" 
                                    css="">
                                </modal-link>

                            </span>   
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordemcolum', 'ordem', 'modal'],
        data: function(){
            return {
                buscar: '',
                ordemAux: this.ordem || "asc",
                ordemColumAux: this.ordemcolum || 0
            }
        },
        methods: {
            executaForm: function(index){
                document.getElementById(index).submit();
            },
            ordernaColuna: function(coluna){
                this.ordemColumAux = coluna;

                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = "desc";
                }else{
                    this.ordemAux = "asc";
                }
            }
        },
        computed: {
            lista: function(){
                let lista = this.itens.data;
                let ordem =  this.ordemAux;
                let ordemColum = this.ordemColumAux;
                
                ordem = ordem.toLowerCase();
                ordemColum = parseInt(ordemColum);

                if(ordem == "asc"){
                    lista.sort(function(a, b){
                        if(Object.values(a)[ordemColum] > Object.values(b)[ordemColum]) { return 1 };
                        if(Object.values(a)[ordemColum] < Object.values(b)[ordemColum]) { return -1 };
                        return 0;
                    });
                }else{
                    lista.sort(function(a, b){
                        if(Object.values(a)[ordemColum] < Object.values(b)[ordemColum]) { return 1 };
                        if(Object.values(a)[ordemColum] > Object.values(b)[ordemColum]) { return -1 };
                        return 0;
                    });
                }

                if(this.buscar){
                    return lista.filter(res => {
                        res = Object.values(res);

                        for (let k = 0; k < res.length; k++) {
                            if( (res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                return true;    
                            }    
                        }
                    
                        return false;
                    });
                }
                

                return lista;                
            }
        }
    }
</script>

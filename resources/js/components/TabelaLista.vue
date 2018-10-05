<template>
    
    <div>

        <div class="form-group">
            <a v-if="criar" v-bind:href="criar">Criar</a>
            <div class="form-group float-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <!-- <div class="row justify-content-between">
            <a v-if="criar" class="col-2" v-bind:href="criar">Criar</a>
            <div class="col-2">
                <input type="search" class="form-control" placeholder="Buscar" >
            </div>
        </div> -->

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"  v-for="titulo in titulos">{{ titulo }}</th>
                    <th v-if="detalhe || editar || deletar" scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="(item, index) in lista">
                        <!-- <th scope="row">{{ (index + 1) }}</th> -->
                        <td scope="" v-for="i in item">{{ i }}</td>
                        <td v-if="detalhe || editar || deletar" >
                            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" v-bind:value="token">

                                <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                                <a v-if="editar" v-bind:href="editar"> Editar |</a>
                                <a href="#" v-on:click="executaForm(index)">Deletar</a>

                            </form>

                            <span v-if="!token">
                                <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                                <a v-if="editar" v-bind:href="editar"> Editar</a>  
                            </span>   

                            <span v-if="!token && !deletar">
                                <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                                <a v-if="editar" v-bind:href="editar"> Editar</a>
                            </span>   
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    
</template>

<script>
    export default {
        props:['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordemColum', 'ordem'],
        data: function(){
            return {
                buscar: ''
            }
        },
        
        methods: {
            executaForm: function(index){
                document.getElementById(index).submit();
            }
        },

        computed: {
            lista: function(){
                
                let ordem =  this.ordem || "asc";
                let ordemColum = this.ordemColum || 0;
                
                ordem = ordem.toLowerCase();
                ordemColum = parseInt(ordemColum);

                if(ordem == "asc"){
                    this.itens.sort(function(a, b){
                        if(a[ordemColum] > b[ordemColum]  ) { return 1 };
                        if(a[ordemColum] < b[ordemColum]) { return -1 };
                        return 0;
                    });
                }else{
                    this.itens.sort(function(a, b){
                        if(a[ordemColum] < b[ordemColum]  ) { return 1 };
                        if(a[ordemColum] > b[ordemColum]) { return -1 };
                        return 0;
                    });
                }

                
                return this.itens.filter(res => {
                    
                    for (let k = 0; k < res.length; k++) {
                        if( (res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                            return true;    
                        }    
                    }
                    
                    return false;
                });

                return this.itens;                
            }
        }
    }
</script>

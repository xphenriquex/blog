<template>
    <div>

        <button 
            v-if="!tipo || (tipo != 'button' && tipo != 'link')" 
            type="button" 
            v-bind:class="css || 'btn btn-primary'" 
            data-toggle="modal" 
            v-bind:data-target="'#' + nome"
            >{{ conteudo }}</button>

        <button 
            v-if="tipo == 'button'" 
            type="button" 
            v-bind:class="css || 'btn btn-primary'" 
            data-toggle="modal" 
            v-bind:data-target="'#' + nome"
            >{{ conteudo }}</button>
        
        <a 
            v-if="tipo == 'link'" 
            href="#" 
            v-bind:class="css || ''" 
            data-toggle="modal" 
            v-bind:data-target="'#' + nome"
            >{{ conteudo }}</a>
        
    </div>
</template>

<script>
    export default {
        props:['nome', 'tipo', 'conteudo', 'css'],
        mounted() {
            // console.log("nome = " + this.nome);
            // console.log("Tipo = " + this.tipo);
            // console.log("conteudo = " + this.conteudo);
            // console.log("css = " + this.css);
        },
    }
</script>

<template>
    <span>
        <span v-if="item">
            <button
                v-on:click="preencheFormulario()"
                v-if="!tipo || (tipo != 'button' && tipo != 'link')" 
                type="button" 
                v-bind:class="css || 'btn btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + nome"
                >
                    {{ conteudo }}
            </button>

            <button 
                v-on:click="preencheFormulario()"
                v-if="!tipo || (tipo != 'button' && tipo != 'link')" 
                type="button" 
                v-bind:class="css || 'btn btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + nome"
                >
                    {{ conteudo }}
            </button>

            <a 
                v-on:click="preencheFormulario()"
                v-if="tipo == 'link'" 
                href="#" 
                v-bind:class="css || ''" 
                data-toggle="modal" 
                v-bind:data-target="'#' + nome"
                >
                    {{ conteudo }}
            </a>
        </span>

        <span v-if="!item">
            <button 
                v-if="!tipo || (tipo != 'button' && tipo != 'link')" 
                type="button" 
                v-bind:class="css || 'btn btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + nome"
                >
                    {{ conteudo }}
            </button>

            <button 
                    v-if="tipo == 'button'" 
                    type="button" 
                    v-bind:class="css || 'btn btn-primary'" 
                    data-toggle="modal" 
                    v-bind:data-target="'#' + nome"
                    >
                        {{ conteudo }}
            </button>
        
            <a 
                v-if="tipo == 'link'" 
                href="#" 
                v-bind:class="css || ''" 
                data-toggle="modal" 
                v-bind:data-target="'#' + nome"
                >
                    {{ conteudo }}
            </a>
        </span>
    </span>
</template>

<script>
    export default {
        props:['nome', 'tipo', 'conteudo', 'css', 'item'],
        methods: {
            preencheFormulario: function(){
                this.$store.commit('setItem', this.item);
            }
        }
    }
</script>

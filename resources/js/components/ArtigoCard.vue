<template>

    <div :class="'card col-sm-' + (sm || '3') + ' col-md-' + (md || '4') ">
        <img class="card-img-top" src="https://gaea.com.br/wp-content/uploads/2016/09/tudo-que-voce-precisa-saber-sobre-desenvolvimento-de-software.jpeg" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><small class="text-muted">{{ autor }} - {{ data | formataData }}</small></p>
            <h5 class="card-title">{{ titulo }}</h5>
            <p class="card-text">{{ descricao }}</p>
            <a :href="link" class="btn btn-primary">Leia mais</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'autor', 'data', 'descricao', 'link', 'imagem', 'sm', 'md'],
        filters: {
            formataData: function(valor){
                if(!valor) return '';

                valor = valor.split('-');
                return valor[2] + '/' + valor[1] + '/' + valor[0];
            }
        }
    }
</script>

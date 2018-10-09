<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in lista" 
                v-bind:class="{'breadcrumb-item': item.url, 'breadcrumb-item active': !item.url}" >
                <a v-if="item.url" v-bind:href="item.url">{{ item.titulo }}</a>
                <span v-if="!item.url">{{ item.titulo }}</span>
            </li> 
        </ol>
    </nav>
</template>

<script>
    export default {
        props:['lista'], 
        mounted: function() {
            console.log(this.lista);
            console.log(this.lista.length);
        }
    }
</script>
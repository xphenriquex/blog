<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in lista" v-bind:class="defineClass">
                <a v-if="item.url" v-bind:href="item.url">{{ item.titulo }}</a>
                <span v-if="!item.url">{{ item.titulo }}</span>
            </li> 
            <!-- li class="breadcrumb-item"><a href="#">Library</a></li> -->
            <li class="breadcrumb-item active" aria-current="page">Data</li>

            <!-- <li v-for="(item, index) in lista"  v-bind:class="defineClass" >
                <a >{{ item.titulo }}
                </a>
                <span v-if="!item.url">{{ item.titulo }}</span>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data</li> -->
        </ol>
    </nav>
</template>

<script>
    export default {
        props:['lista'], 
        data: function(){
            return {
                teste: this.url,
            }
        },
        mounted: function() {
            console.log(this.lista);
            console.log(this.lista.length);
        },
        computed: {
            defineClass: function(){

                // return {
                // }
                // console.log(this.titulo);
                if(this.titulo){
                    return "breadcrumb-item active";
                }else{
                    return "";
                }
                
            }
        }
    }
</script>
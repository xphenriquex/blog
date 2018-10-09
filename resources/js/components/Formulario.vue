<template>
    <form v-bind:class="css" v-bind:method="defineMetodo" v-bind:action="action" v-bind:enctype="ectype">
        <input v-if="alterMetodo" type="hidden" name="_method" v-bind:value="alterMetodo" />
        <input v-if="token" type="hidden" name="_token" v-bind:value="token" />
        <slot></slot>
        
    </form>
</template>

<script>
    export default {
        props:['method', 'action', 'ectype', 'css', 'token'],
        data: function(){
            return  {
                alterMetodo: ""
            }
        },
        computed: {
            defineMetodo: function(){
                if(this.method.toLowerCase() ==  'post' || this.method.toLowerCase() ==  'get'){
                    return this.method.toLowerCase();
                }

                if(this.method.toLowerCase() == "put"){
                    this.alterMetodo = "put";
                }

                if(this.method.toLowerCase() == "delete"){
                    this.alterMetodo = "delete";
                }

                return "post";
            }
        }
    }
</script>
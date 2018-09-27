<template>
    <div v-bind:class="defineBorda">
        <div v-bind:class="defineCor">{{ titulo }}</div>

        <div class="card-body ">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo', 'cor', 'borda'],
        computed:{
            defineCor: function(){
                // return "card-header  " + (this.cor || "bg-default")
                return "card-header " + (this.cor || "bg-default")
            }
            ,
            defineBorda: function(){
                return "card " + (this.borda || "text-secundary")
            }
        }
    }
</script>

<style>
    .card > .bg-blue {
        background-color: #0323c3 !important;
        color: #f5f5f5;
    }

    .border-blue {
        border-color:#0323c3 !important;
    }

    .card > .bg-orange {
        background-color: #c96b00 !important;
        color: #f5f5f5;
    }

    .border-orange {
        border-color:#c96b00 !important;
    }
    
</style>

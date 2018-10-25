<template >
    <div>
        <textarea
            class="form-control"
            rows="3"
            :name="name"
            :id="id"
            :value="value"
            :types="types"
            >
        </textarea>
    </div>
</template>

<script>
    
    export default {
        props: ['name', 'value', 'id', 'types'],
        data: function(){
            return {
                content: '',
                config: {
                    toolbar: [
                        [
                            'Bold', 'Italic', 'Underline',
                            'Strike', 'Subscript', 'Superscript'
                        ]
                    ],
                    height: 300
                },
            }
        },
        mounted() {
            this.create();
        },
        methods: {
            create() {
                if (this.types === 'inline') {
                        CKEDITOR.inline(this.id, this.config);
                    }else {
                        CKEDITOR.replace(this.id, this.config);
                    }
            },
            teste: function(){
                
            }
        }
    };
</script>
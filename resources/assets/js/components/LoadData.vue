<template>
    <span v-html="data"></span>
</template>

<script>
    export default {
        props: ['url'],

        data() {
            return {
                data: '<i class="fa fa-repeat fa-spin"></i>'
            };
        },

        mounted() {
            this.prepareComponent();
        },

        methods: {
            prepareComponent() {
                axios.get(this.url).then(r => {
                    this.data = r.data;
                });
            },
        }
    }
</script>

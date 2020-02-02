<template>
    <div class="pbi">
        <p> {{ name }}</p>
        <button @click="del">Delete</button>
    </div>
</template>

<script>
    export default {
        methods: {
            del() {
                this.$emit('delete', this.id);
            }
        },
        props: ['id', 'name']
    }
</script>
<style>
    .pbi {
        padding: 1em;
        background-color: #d1d1d1;
    }
</style>
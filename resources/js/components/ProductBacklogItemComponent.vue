<template>
    <div class="pbi">
        <p> {{ name }}</p>
    </div>
</template>

<script>
    export default {
        props: ['id', 'name']
    }
</script>
<style>
    .pbi {
        padding: 1em;
        background-color: #d1d1d1;
    }
</style>
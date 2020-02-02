<template>
    <div id="app">
        <div class="heading">
            <h1>Lightweight Scrum</h1>
        </div>
        <product-backlog-item-component
                v-for="pbi in pbis"
                v-bind="pbi"
                :key="pbi.id"
        ></product-backlog-item-component>
    </div>
</template>
<script>
    function ProductBacklogItem({id, name}) {
        this.id = id;
        this.name = name;
    }

    import ProductBacklogItemComponent from "./components/ProductBacklogItemComponent";

    export default {
        data() {
            return {
                pbis: []
            }
        },
        methods: {
            read() {
                window.axios.get('/api/product-backlog-items').then(({data}) => {
                    data.forEach(pbi => {
                        this.pbis.push(new ProductBacklogItem(pbi));
                    });
                });
            }
        },
        components: {
            ProductBacklogItemComponent
        },
        created() {
            this.read();
        }
    }
</script>
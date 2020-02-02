<template>
    <div id="app">
        <div class="heading">
            <h1>Lightweight Scrum</h1>
        </div>
        <product-backlog-item-component
                v-for="pbi in pbis"
                v-bind="pbi"
                :key="pbi.id"
                @delete="del"
        ></product-backlog-item-component>
        <div>
            <input v-model="newPbi.name" placeholder="Input Product Backlog Item Name">
            <button @click="store()">Add</button>
        </div>
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
                pbis: [],
                newPbi: {
                    name: ''
                }
            }
        },
        methods: {
            del(id) {
                window.axios.delete(`/api/product-backlog-items/${id}`).then(() => {
                    let index = this.pbis.findIndex(pbi => pbi.id === id);
                    this.pbis.splice(index, 1);
                });
            },
            read() {
                window.axios.get('/api/product-backlog-items').then(({data}) => {
                    data.forEach(pbi => {
                        this.pbis.push(new ProductBacklogItem(pbi));
                    });
                });
            },
            store() {
                window.axios.post('/api/product-backlog-items', {
                    "name": this.newPbi.name
                }).then(({data}) => {
                    this.pbis.push(new ProductBacklogItem(data));
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
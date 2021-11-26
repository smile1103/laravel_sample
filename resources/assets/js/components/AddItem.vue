<template lang="html">

    <div class="add-item">

        <input type="text" placeholder="add item..." v-model="item" @keyup.enter="addSingleItem">

        <button class="btn btn-primary" @click.prevent="addSingleItem">Send</button>

    </div>

</template>


<script>

    export default {



        data() {

            return {

                item: ''

            }


        },

        methods: {

            addSingleItem(){

                this.$emit('itemcreated', {

                    item: this.item,

                });

                this.item = '';
            }

        }

    }


</script>


<style lang="css">

    .add-item{

        margin: 2rem;
        display: flex;
    }

    .add-item input {

        border: 1px solid;
        flex: 1 auto;
        padding: 1rem;

    }

    .add-item button {


        border-radius: 0;
    }


</style>
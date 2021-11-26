<template>
    <div>

        <!-- Category Select Form -->

        <div class="form-group">

            <label for="category_id">Category Name:</label>

            <select @change="onChange($event.target.value)"
                    class="form-control"
                    name="category_id">

                <option v-bind:value="category.id">{{ category.name }}</option>

                <option  v-for="category in categories"
                         v-bind:value="category.id"
                         >{{ category.name }}</option>

            </select>


        </div>

        <!-- Subcategory Select Form -->

        <div class="form-group" v-if="category.id > 0">

        <label for="subcategory_id">Subcategory Name:</label>

        <select v-model="defaultOption" class="form-control" name="subcategory_id">

            <option v-bind:value="subcategory.id">{{ subcategory.name }}</option>
            <option value="0">Please Choose One</option>
            <option v-for="option in options"
                    v-bind:value=" option.id ">
                    {{ option.name }}</option>

        </select>


        </div>


    </div>

</template>

<script>

    export default {

        props: ['category', 'subcategory','subcategories', 'categories'],

        data () {

            return {


                newSelectedCategory : '',

                options: [],

                defaultOption: this.subcategory.id


            }

        },

        methods: {

            filterSubcategories () {

                this.options = this.subcategories.filter(subcategories =>
                subcategories.category_id == this.newSelectedCategory);

            },

            onChange (value) {


                this.newSelectedCategory = value;

                this.defaultOption = 0;


                this.filterSubcategories();

            }


        }



    }

</script>
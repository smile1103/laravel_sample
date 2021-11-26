<template lang="html">
    <div class="child">
        <ul>

            <child v-for="item in items" v-bind:item="item"></child>

        </ul>



    </div>

</template>





<script>

    export default {

        props: ['items'],

    }


</script>
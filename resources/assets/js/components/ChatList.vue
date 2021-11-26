<template lang="html">
    <div class="chat-list">

        <chat-message v-for="message in messages" v-bind:message="message"></chat-message>
        <div class="empty" v-show="messages.length === 0">

            No Messages Yet!

        </div>


    </div>

</template>


<script>

    export default {

        props: ['messages'],

    }


</script>


<style lang="css">

    .chat-list .chat-message:nth-child(even) {

        background-color: #f7f7f7;
    }

    .empty {

        padding: 1rem;
        text-align: center;

    }


</style>
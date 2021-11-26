<template lang="html">

    <div class="chat-create">

        <input type="text" placeholder="Start typing your message..." v-model="messageText" @keyup.enter="sendMessage">

        <button class="btn btn-primary" @click.prevent="sendMessage">Send</button>

    </div>

</template>


<script>

    export default {

        props: ['currentuser'],

        data() {

            return {

                messageText: ''

            }


        },

        methods: {

            sendMessage(){

                this.$emit('messagecreated', {

                    message: this.messageText,
                    user: {

                        name: this.currentuser
                    }
                });

                this.messageText = '';
            }

        }

    }


</script>


<style lang="css">

    .chat-create{

        margin: 2rem;
        display: flex;
    }

    .chat-create input {

        border: 1px solid;
        flex: 1 auto;
        padding: 1rem;

    }

    .chat-create button {


        border-radius: 0;
    }


</style>
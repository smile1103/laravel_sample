<template lang="html">
    <div class="chat-message">

        <p>{{ message.message }}</p>

       <span class="name"> {{ message.user.name }}</span>
        <span class="pull-right"><small>{{ formattedDate() ? formattedDate() : currentDate() }}</small></span>

    </div>

</template>


<script>

    export default {

        props: ['message'],



        methods:  {

            formattedDate(){


                if (typeof this.message.created_at === 'undefined' || null){

                    return false;
                }

                let date = this.message.created_at;


                let NowMoment = moment(date);


                return NowMoment.fromNow();

            },

            currentDate(){


                let now = moment();


                return now.fromNow();


            }



        }


    }


</script>





<style lang="css">

    .chat-message{

    padding: 1rem;

    }

    .chat-message > p {

        font-size: 1.5rem;

        color: #868889;

        margin-bottom: .5rem;


    }

    .name{

        font-size: 1.5rem;
        color: #a9c1e8;

    }


</style>
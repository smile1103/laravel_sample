@extends('layouts.master')

@section('content')



    <div class="panel panel-default">
        <div class="panel-heading">
            Chatroom
            <span class="badge pull-right">@{{ roomCount.length }}</span>
        </div>

    <chat-list v-bind:messages="messages"></chat-list>

    <chat-create v-on:messagecreated="addMessage"
                     :currentuser="currentuser"></chat-create>

    </div>

    @endsection
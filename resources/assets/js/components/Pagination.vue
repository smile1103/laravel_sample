<template>
    <div>
        <div class="row">
            <div class="pull-right for-page-button">

                <button @click="$parent.getData($parent.go_to_page)"class="btn btn-default">
                    Go To Page:</button>
                <input v-model="$parent.go_to_page" class="number-input"></input>

            </div>

            <ul class="pagination pull-right">
                <li><a @click.prevent="$parent.getData($parent.first_page_url)"> first </a></li>
                <li v-if="$parent.checkUrlNotNull($parent.prev_page_url)">
                    <a @click.prevent="$parent.getData($parent.prev_page_url)" >prev</a>
                </li>
                <li v-for="page in $parent.pages"
                    v-if="page > $parent.current_page - 2 && page < $parent.current_page + 2"
                    v-bind:class="{'active': $parent.checkPage(page)}">
                    <a @click.prevent="$parent.getData(page)">{{ page }}</a>
                </li>
                <li v-if="$parent.checkUrlNotNull($parent.next_page_url)">
                    <a @click.prevent="$parent.getData($parent.next_page_url)">next</a>
                </li>
                <li><a @click.prevent="$parent.getData($parent.last_page_url)"> last </a></li>
            </ul>
        </div>
    </div>
</template>


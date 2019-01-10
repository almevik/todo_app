//require('./bootstrap');
//window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';

import App from './components/App.vue';
import NotesList from './components/NotesList.vue';
import NoteDetails from './components/NoteDetails.vue';
import NoteAdd from './components/NoteAdd.vue';
import NoteEdit from './components/NoteEdit.vue';

Vue.component('NotesList',NotesList);
Vue.component('NoteDetails',NoteDetails);
Vue.component('NoteAdd',NoteAdd);
Vue.component('NoteEdit',NoteEdit);

Vue.use(VueRouter);

const routes = [
    {
        path : '/',
        component : NotesList
    },
    {
        path : '/notes/add',
        component : NoteAdd,
    },
    {
        path : '/notes/edit/:id',
        component : NoteEdit,
    },
    {
        path : '/notes/:id',
        component : NoteDetails,
    },
    {
        path : '*',
        component : NotesList
    }
];

const router = new VueRouter ({
    mode: 'history',
    routes
});

import axios from 'axios';
axios.defaults.headers.common['Authorization'] = 'Bearer 1111111111111';

new Vue({
    router,
    el: '#app',
    render: h => h(App)
})
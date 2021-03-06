/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'

import VueSimplemde from 'vue-simplemde'
Vue.use(VueSimplemde)

Vue.use(Vuetify)

import User from "./Helpers/User"
window.User = User

import Exception from "./Helpers/Exception"
window.Exception = Exception

import md from "marked"
window.md = md



window.eventBus = new Vue();

Vue.component('AppHome', require('./components/AppHome.vue').default);


import router from "./Router/routes.js";



const app = new Vue({
    el: '#app',
    router,
});

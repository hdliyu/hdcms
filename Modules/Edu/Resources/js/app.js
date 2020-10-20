import './bootstrap'
import Vue from 'vue'
import store from './store'

const app = new Vue({
    el: '#app',
    mixins: [window.vue || {}],
    store
});

import Vue from 'vue';
import axios from 'axios';
window.axios = axios;
Object.defineProperties(Vue.prototype,{
    axios:{
        get(){
            return axios;
        }
    }
})

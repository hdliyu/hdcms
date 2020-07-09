import Vue from 'vue'
import axios from 'axios'
import loading from './loading'
import store from '../store'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
const _axios = axios.create({
    baseURL:'/',
    timeout:5000
})
Object.defineProperties(Vue.prototype,{
    axios:{
        get(){
            return _axios;
        }
    }
})
_axios.interceptors.request.use(
    function(config){
        loading.open();
        return config;
    },
    function(error){
        return Promise.reject(error);
    }
)
_axios.interceptors.response.use(function (response) {
    loading.close();
    return response;
}, function (error) {
    loading.close();
    let status = error.response.status;
    let data = error.response.data;
    switch (status) {
        case 422:
            store.commit('setErrors',data.errors);
            break;
    }
    return Promise.reject(error);
});

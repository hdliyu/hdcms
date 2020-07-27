import Vue from 'vue'
import axios from 'axios'
import loading from './loading'
import store from '../store'
import {Message} from 'element-ui'
import httpStatus from './httpStatus'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
const _axios = axios.create({
    baseURL:'/',
    timeout:5000
})
Object.defineProperties(Vue.prototype,{
    axios:{
        get(){
            return _axios
        }
    },
    $axios:{
        get() {
            return _axios
        }
    }
})
_axios.interceptors.request.use(
    function(config){
        loading.open()
        return config
    },
    function(error){
        return Promise.reject(error)
    }
)
_axios.interceptors.response.use(function (response) {
    loading.close()
    if(response.data.message){
        Message({
            message:response.data.message,
            type:'success',
        })
    }
    return response.data
}, function (error) {
    loading.close()
    let status = error.response.status
    let data = error.response.data
    switch (status) {
        case 422:
            store.commit('setErrors',data.errors)
            break;
        default:
            let message = data.message?data.message:httpStatus(status)
            Message({
                message,
                type:'error',
            });
    }
    return Promise.reject(error)
});

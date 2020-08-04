import {Loading} from 'element-ui'
export default {
    instance:null,
    open(){
        this.instance = Loading.service({
            lock: true,
            text: '加载中',
            background: 'rgba(255,255,255,0.1)'
        });

    },
    close(){
        this.instance.close();
    }
}

import {Loading} from 'element-ui'
export default {
    instance:null,
    open(){
        this.instance = Loading.service({
            lock: true,
            text: '加载中',
        });

    },
    close(){
        this.instance.close();
    }
}

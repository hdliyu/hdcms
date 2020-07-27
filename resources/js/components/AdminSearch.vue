<template>
    <div>
        <button class="btn btn-info btn-sm" @click="dialogVisible=true">添加管理员</button>
        <el-dialog
            title="提示"
            :visible.sync="dialogVisible"
            width="70%"
            :close-on-click-modal="false"
            >
            <div class="input-group">
                <input type="text" class="form-control" placeholder="请输入邮箱/手机号/昵称或用户编号" v-model="name" required @keyup.enter="search">
                <a href="#" class="input-group-append" @click.prevent="search">
                    <span class="input-group-text" id="basic-addon2">搜索</span>
                </a>
            </div>
            <table class="table mt-3 table-striped">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>手机号</th>
                    <th width="160"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td class="align-middle">{{user.id}}</td>
                    <td class="align-middle">
                        <img :src="user.avatar" class="rounded-circle w35">
                        {{user.name}}
                    </td>
                    <td class="align-middle">{{user.email}}</td>
                    <td class="align-middle">{{user.mobile}}</td>
                    <td class="align-middle text-right pr-2">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <slot :user="user"></slot>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </el-dialog>
    </div>
</template>
<script>
    export default {
        props:{
          action:{
              required:true,
              type:String,
          }
        },
        data(){
            return {
                name:'',
                dialogVisible:false,
                users:[],
            }
        },
        methods:{
            async search(){
                let data = await this.axios.post(this.action,{name:this.name});
                this.users = data;
            }
        }
    }

</script>

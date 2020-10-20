<template>
    <div>
        <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            需要先保存菜单后，再推着到微信公众号
            <br />立刻看到菜单效果，请取关后再次关注公众号
        </div>
        <div class="card mt-3">
            <div class="card-header">
                微信菜单
            </div>
            <div class="card-body wechat-menu">
                <div class="view">
                    <header><img src="/images/wechat-header.jpg" alt=""></header>
                    <footer>
                        <dl v-for="(menus,index) in button" :key="index">
                            <dt @click="edit(menus)">
                                {{menus.name}}
                                <i class="fa fa-times-circle text-secondary ml-1" @click="del(button,index)"></i>
                                <i class="fa fa-plus-circle text-secondary ml-1" @click="add(menus.sub_button,2)"></i>
                            </dt>
                            <dd v-for="(menu,i) in menus.sub_button" :key="i" @click="edit(menu)">
                                {{menu.name}}
                                <i class="fa fa-times-circle text-secondary ml-1"  @click="del(menus.sub_button,i)"></i>
                            </dd>
                        </dl>
                        <!--<dl>
                            <dt>+</dt>
                        </dl>-->
                    </footer>
                </div>
                <div class="edit border shadow-sm p-3 ml-3 d-flex flex-column">
                    <div class="flex-fill">
                        <div class="form-group">
                            <label for>菜单名称</label>
                            <input type="text" class="form-control" v-model="menu.name" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">类型</label>
                            <select class="form-control" id="exampleFormControlSelect1" v-model="menu.type">
                                <option value="click">关键词</option>
                                <option value="view">链接</option>
                            </select>
                        </div>
                        <div class="form-group" v-if="menu.type == 'click'">
                            <label>关键词</label>
                            <input type="text" class="form-control" v-model="menu.key" />
                        </div>
                        <div class="form-group" v-if="menu.type == 'view'">
                            <label>链接</label>
                            <input type="text" class="form-control" v-model="menu.url" />
                        </div>
                        <button class="btn btn-primary mt-3" @click="add(button,1)">添加一级菜单</button>
                    </div>
                <!--    <div>
                        <button class="btn btn-outline-danger btn-sm" @click.prevent="">删除菜单</button>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button class="btn btn-primary mt-3" @click="submit">保存菜单</button>
            <button class="btn btn-outline-info mt-3" @click="push">推送菜单到微信公众号</button>
        </div>
    </div>
</template>
<script>
    export default {
        props:{
            site_id:{required:true},
            wechat_id:{required:true}
        },
        data(){
            return {
                button:window.wechatMenu,
                menu:{},
            }
        },
        mounted() {
            if (this.button.length > 0) this.menu = this.button[0]
        },
        methods:{
            edit(menu){
                this.menu = menu
            },
            add(menu,level){
                if(level==1 && menu.length==3){
                    this.$message.error("一级菜单不能超过3个");
                    return;
                }
                if(level==2 && menu.length==5){
                    this.$message.error("二级菜单不能超过5个");
                    return;
                }
                menu.push({
                    "type":"view",
                    "name":"菜单名称",
                    "url":"https://",
                    "key":"",
                    "sub_button":[]
                })
            },
            del(menu,index){
                menu.splice(index,1)
            },
            async submit(){
                let url = `/site/${this.site_id}/menu/${this.wechat_id}`
                await this.axios.put(url,{
                    menus:this.button
                })
                // location.href = `/site/${this.site_id}/wechat`
            },
            async push(){
                let url = `/site/${this.site_id}/menu/${this.wechat_id}/push`
                await this.axios.get(url)
            }
        }
    }
</script>
<style lang="scss">
    .wechat-menu{
        display: flex;
        .view {
            width: 350px;
            height: 550px;
            border: solid 1px #ccc;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            header {
                img {
                    width: 100%;
                }
            }
            footer {
                display: flex;
                justify-content: space-between;
                dl {
                    flex-grow: 1;
                    display: flex;
                    flex-direction: column-reverse;
                    padding: 0;
                    margin: 0;
                    dt,
                    dd {
                        padding: 0;
                        margin: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 35px;
                        border-top: solid 1px #ccc;
                    }
                    &:nth-child(n+2){
                        dt,dd{
                            border-left: solid 1px #ccc;
                        }
                    }
                    &:nth-last-child(n+2){
                        dt,dd{
                            border-right: solid 1px #ccc;
                        }
                    }
                }
            }
        }
        .edit {
            flex-grow: 1;
        }
    }

</style>

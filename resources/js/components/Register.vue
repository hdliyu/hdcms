<template>
    <div class="card shadow captcha">
            <div class="card-header">
                会员注册
            </div>
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label for="account">账号</label>
                        <input id="account" title="账号" type="text" class="form-control" :class="{'is-invalid':errors.account}" @focus="errors.account=''" name="account" placeholder="请输入邮箱或手机号" v-model="account" >
                        <strong  class="invalid-feedback" v-if="errors.account">{{errors.account}}</strong>
                    </div>
                    <div class="form-group">
                        <label for="code">验证码</label>
                        <div class="input-group mb-3" :class="{'is-invalid':errors.code}" >
                            <input type="text" class="form-control" placeholder="请输入收到的验证码" id="code" v-model="code" @focus="errors.code=''" >
                            <div class="input-group-append"  @click="sendCode">
                                <span class="input-group-text" id="basic-addon2">发送验证码</span>
                            </div>
                        </div>
                        <strong  class="invalid-feedback" v-if="errors.code">{{errors.code}}</strong>
                    </div>
                    <div class="form-group">
                        <label for="captcha">图形验证码</label>
                        <div class="input-group" :class="{'is-invalid':errors.captcha}">
                            <input type="text" name="captcha" id="captcha" class="form-control"  @focus="errors.captcha=''" placeholder="请输入图形验证码" v-model="captcha">
                            <div class="input-group-append captcha-btn">
                                <img :src="captchImage" alt="验证码"  class="border" @click="updateCaptcha">
                            </div>
                        </div>
                        <strong  class="invalid-feedback" v-if="errors.captcha">{{errors.captcha}}</strong>
                    </div>
                </div>
                <el-divider><i class="el-icon-mobile-phone"></i></el-divider>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input id="password" type="password" class="form-control"  :class="{'is-invalid':errors.password}" name="password" placeholder="请输入注册密码" v-model="password">
                    <strong  class="invalid-feedback" v-if="errors.password">{{errors.password}}</strong>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">确认密码</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="请输入确认密码" v-model="password_confirmation">
                </div>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                <button class="btn btn-success" @click="onSubmit">注册</button>
                <div>
                    <a href="/login">登录</a> | <a href="">找回密码</a>
                </div>
            </div>
    </div>
</template>
<script>
    import { mapState } from 'vuex'
    export default {
        data(){
            return {
                   code:'',
                   account:'',
                   captcha:'',
                   captchImage:'/captcha',
                   password:'',
                   password_confirmation:'',
            }
        },
        methods: {
            async sendCode(){
                this.updateCaptcha();
                await this.axios.post('register/code',this.$data);
            },
            async onSubmit(){
                await this.axios.post('register',this.$data);
                location.href = '/';
            },
            updateCaptcha(){
                this.captchImage = this.captchImage+'?'+Math.random();
            }
        },
        computed:{
            ...mapState(['errors'])
        }
    }
</script>
<style lang="scss" scoped>
    .captcha{
        .input-group-append{
            cursor: pointer;
        }
        .captcha-btn{
            cursor: pointer;
        }
    }
</style>

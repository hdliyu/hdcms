<template>
    <div class="card shadow">
            <div class="card-header">
                会员注册
            </div>
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label for="account">账号</label>
                        <input id="account" title="账号" type="text" class="form-control" name="account" placeholder="请输入邮箱或手机号" v-model="account">
                    </div>
                    <div class="form-group">
                        <label for="code">验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="请输入收到的验证码" id="code" v-model="code">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="cursor: pointer;" @click="sendCode">发送验证码</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="captcha">图形验证码</label>
                        <div class="input-group">
                            <input type="text" name="captcha" id="captcha" class="form-control" placeholder="请输入图形验证码" v-model="captcha">
                            <div class="input-group-append">
                                <img src="/captcha" alt="验证码" style="cursor: pointer" class="border">
                            </div>
                        </div>
                    </div>
                </div>
                <el-divider><i class="el-icon-mobile-phone"></i></el-divider>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="请输入注册密码" v-model="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">确认密码</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="请输入确认密码" v-model="password_confirmation">
                </div>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                <button class="btn btn-success">注册</button>
                <div>
                    <a href="">登录</a> | <a href="">找回密码</a>
                </div>
            </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                   code:'',
                   account:'',
                   captcha:'',
                   password:'',
                   password_confirmation:'',
            }
        },
        methods: {
            sendCode(){
                alert(3);
            },
        }
    }
</script>

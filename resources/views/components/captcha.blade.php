<div class="form-group">
    <label for="captcha">验证码</label>
    <div class="input-group">
        <input type="text" name="captcha" id="captcha" class="form-control" placeholder="请输入图形验证码">
        <div class="input-group-append">
            <img src="/captcha" alt="验证码" onclick="this.src='/captcha?_'+Math.random()" style="cursor: pointer" class="border">
        </div>
    </div>
    @error('captcha')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>

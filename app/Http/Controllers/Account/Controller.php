<?php
namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller as BaseController;
class Controller extends BaseController{

    /**
     * 获取登录账号类型（表字段）
     */
    protected function username()
    {
        return filter_var(request()->account,FILTER_VALIDATE_EMAIL)?'email':'mobile';
    }

    /**
     * 根据提交的账号数据使用不同的验证规则
     */
    protected function validateAccountField()
    {
        return filter_var(request()->account,FILTER_VALIDATE_EMAIL)?'email':'regex:/^1\d{10}$/';
    }
}

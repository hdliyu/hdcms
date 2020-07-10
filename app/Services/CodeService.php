<?php

namespace App\Services;


use App\Notifications\VerificationCodeNotification;
use App\User;
use Illuminate\Support\Facades\Cache;

class CodeService
{
    /**
     * @param string $account 邮箱或手机号
     */
    public function send($account)
    {
        $code = mt_rand(1000,9999);
        call_user_func([$this, $this->action($account)], $account,$code);
        Cache::put($this->key($account),$code,now()->addMinute(20));
    }

    protected function key($account)
    {
        return md5('verification-code-'.$account);
    }
    public function email($account,$code)
    {
        app(User::class)->fill(['email'=>$account])->notify(new VerificationCodeNotification($code));
    }

    public function mobile($account)
    {

    }

    public function action($account)
    {
        if (filter_var($account, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }

        if (preg_match('/^1\d{10}$/', $account)) {
            return 'mobile';
        }
    }

    public function check($account, $code)
    {
        return Cache::get($this->key($account)) == $code;
    }
}

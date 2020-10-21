<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Wechat;
use App\Services\WechatService;
use Houdunren\Wechat\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    /**
     * 粉丝同步
     * @param Request $request
     * @param Site $site
     * @param Wechat $wechat
     * @param mixed $nextOpenid
     * @param User $userPackage
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function user(Request $request, Site $site, Wechat $wechat, $nextOpenid, User $userPackage, WechatService $wechatService)
    {
        $response = $userPackage->config($wechat)->getList($nextOpenid);

        if ($response['count'] == 0) {
            return response()->json(['state' => 1] + $response);
        }

        $users = $userPackage->getByOpenids($response['data']['openid']);

        $wechatService->batchSaveUser(array_map(function ($user) use ($wechat) {
            $user['wechat_id'] = $wechat['id'];
            return $user;
        }, $users['user_info_list']));

        return response()->json(array_filter($response, function ($k) {
            return $k != 'data';
        }, ARRAY_FILTER_USE_KEY) + ['state' => 0]);
    }
}

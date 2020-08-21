<?php

namespace App\Services;

use App\Models\Site;
use Spatie\Permission\Models\Permission;

class PermissionService
{

    //同步站点权限到数据库
    public function saveSitePermission($site)
    {
        $modules = app(ModuleService::class)->getSiteModules($site);
        $modules->map(function ($module) use ($site) {
            collect($module['menus'])->map(function ($menu) use ($site, $module) {
                foreach ($menu['items'] as $item) {
                    $name = permission_name($item['permission'], $site, $module);
                    Permission::updateOrCreate(
                        ['name' => $name],
                        ['site_id' => $site['id']]
                    );
                }
            });
        });
    }

    public function checkModuleAccess(Site $site, string $name)
    {
        if ($site->user_id == user('id') || user()->isSuperAdmin) {
            return true;
        }
        $module = app(ModuleService::class)->find($name);
        return true;
        return (bool) collect($module['menus'])->filter(function ($menu) use ($site, $module) {
            return (bool) collect($menu['items'])->filter(function ($item) use ($site, $module) {
                $name = permission_name($item['permission'], $site, $module);
                return user()->hasPermissionTo($name);
            })->count();
        })->count();
    }

    public function menuGroupAccess(Site $site, $module, array $menu)
    {
        if ($site->user_id == user('id') || user()->isSuperAdmin) {
            return true;
        }

        return (bool)collect($menu['items'])->filter(function ($item) use ($site, $module) {
            $name = permission_name($item['permission'], $site, $module);
            return user()->hasPermissionTo($name);
        })->count();
    }
}

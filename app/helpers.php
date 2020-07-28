<?php
function user($name=null){
    $user = auth()->user();
    return $name?$user[$name]:$user;
}
function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}

function permission_name($permission, $site, $module)
{
    return 's' . $site['id'] . '-' . $module['name'] . '-' . $permission;
}

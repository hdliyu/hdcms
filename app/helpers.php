<?php
function user($name=null){
    $user = auth()->user();
    return $name?$user[$name]:$user;
}
function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}

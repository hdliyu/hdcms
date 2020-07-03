<?php
function user($field=null){
    if(is_null($field))
        return auth()->user();
    return auth()->user()->$field;
}

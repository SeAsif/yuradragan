<?php

use Illuminate\Support\Facades\Auth;

/*
*@return @array
*/
if(!function_exists('todos_status')){
    function todos_status(){
        //
        $array = ['ACTIVE', 'DONE', 'DELETED'];
        //
        return $array;
    }
}
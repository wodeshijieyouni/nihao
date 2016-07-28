<?php
function outTypeInfo($path){
    //获取参数中，号的次数
    $m = substr_count($path,",")-1;
    return str_repeat("&nbsp;",$m*6)."|--";
}
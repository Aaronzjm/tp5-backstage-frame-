<?php
function status($status){
    if($status == 1){
        $str = '<span class="label label-success radius">已通过</span>';
    }else if($status == 0){
        $str = '<span class="label label-success radius">待审核</span>';
    }else{
        $str = '<span class="label label-success radius">已删除</span>';
    }
    return $str;
}
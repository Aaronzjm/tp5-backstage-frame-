<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//返回前端的数据集 $rs 1：表示成功 0：表示失败
function returnData($rs, $msg, $data=[]){
    $result = [
        'rs' => $rs,
        'msg' => $msg,
        'data' => $data
    ];
    exit(json_encode($result));
}

function ObjectToArray($object){
    if(is_object($object)){
        $array = (array)$object;
    }
    if(is_array($object)){
        foreach ($object as $k => $v){
            $array[$k] =  objectToArray($v);
        }
    }
    return $array;
}
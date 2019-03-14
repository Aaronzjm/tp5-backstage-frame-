<?php
/**
 * 根据传入参数返回对应状态的html代码
 */
function status($status){
    if($status == 1){
        $str = '<span class="label label-success radius">已通过</span>';
    }else if($status == 0){
        $str = '<span class="label label-warning radius">待审核</span>';
    }else{
        $str = '<span class="label radius">已删除</span>';
    }
    return $str;
}

/**
 * curl请求网站的数据
 * @param $url
 * @param int $type 0:get  1:post
 * @param array $data
 */
function doCurl($url, $type=0, $data=[]){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//获取信息已字符串返回，不输出
    curl_setopt($ch, CURLOPT_HEADER, 0);//0：不返回头部信息
    if($type == 1){
        curl_setopt($ch, CURLOPT_PORT,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

<?php
//接收页面数据
class input{
    function post($key){
        $val = $_POST[ $key ];
        return $val;
    }
    function get($key){
        $val = $_GET[ $key ];
        return $val;
    }
}
$input=new input();
?>
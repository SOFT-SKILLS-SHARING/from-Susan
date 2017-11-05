<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="History";

/* Report all errors except E_NOTICE */
error_reporting(E_ALL^E_NOTICE);

// 创建连接
$link = new mysqli($servername, $username, $password);
$link->query('set names utf8');
// 检测连接
if(mysqli_connect_errno()) {
    die();
}

//设定当前的连接数据库为soft_skill_sharing
if(!$link->select_db($dbname)) {
    die();
}

?>
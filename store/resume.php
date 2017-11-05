<?php
include ("connect.php");
//通过post获取页面提交数据信息
class input{
    function post($key){
        if(isset($_POST[$key])===false){
            return false;
        }
        $val = $_POST[$key];
        return $val;
    }
    function get($key){
        if(isset($_GET[$key])===false){
            return false;
        }
        $val = $_GET[$key];
        return $val;
    }
}

$input = new input();
$act = $input->get("act");
/*echo "简历"$input"<br>";*/


$sql = "INSERT INTO `my resume` (`customize your resume`) VALUES ('val')";
if (!mysqli_query($mysqli,$sql))
{
    die('Error: ' . mysqli_error($mysqli));
}
echo "添加一条记录";

//关闭连接
mysqli_close($mysqli);
?>
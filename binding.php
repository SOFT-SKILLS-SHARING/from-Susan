
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>绑定学号</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="amazeui/css/amazeui.min.css"/>
    <link rel="stylesheet" href="default/style.css"/>
    <script src="amazeui/js/jquery.min.js"></script>
    <script src="amazeui/js/amazeui.min.js"></script>
</head>

<body>
<div class="container">
    <header data-am-widget="header" class="am-header am-header-default my-header">
        <div class="am-header-left am-header-nav">
            <a href="user.php" class="">
                <i class="am-header-icon am-icon-chevron-left"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="binding.php" class="">绑定学号</a>
        </h1>
        <!--      <div class="am-header-right am-header-nav">
                <a href="#right-link" class="">
                  <i class="am-header-icon  am-icon-home"></i>
                </a>
              </div>
        -->
    </header>
    <div class="cart-panel">
        <form class="am-form" action="binding.php?act=chk" method="post">
            <div class="am-form-group am-form-icon">
                <i class="am-icon-user" style="color:#329cd9"></i>
                <input name="Number" type="text" class="am-form-field  my-radius" placeholder="请输入您的学号">
            </div>
            <div class="am-form-group am-form-icon">
                <i class="am-icon-lock" style="color:#329cd9"></i>
                <input name="num_key" type="password" class="am-form-field  my-radius" placeholder="请输入您的密码（教务系统登录密码）">
            </div>
            <div class="am-checkbox">
                <label>
                    <input type="checkbox"> 记住密码
                </label>
            </div>
            <p class="am-text-center"><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">立即绑定</button></p>
        </form>
    </div>

    <footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
        <div class="am-footer-miscs ">
            <p>&nbsp;</p>
        </div>
    </footer>
</div>
</body>
</html>


<?php
error_reporting(E_ALL || ~E_NOTICE);//显示除去 E_NOTICE 之外的所有错误信息
include("db.php");
$user_ID=45;

class input{
    function post($key){
        if(isset($_POST[$key]) === FALSE){
            return FALSE;
        }
        $val = $_POST[ $key ];
        return $val;
    }
    function get($key){
        if(isset($_GET[$key]) === FALSE){
            return FALSE;
        }
        $val = $_GET[$key];
        return $val;
    }
}

$input = new input();
$act = $input->get("act");
if($act!==FALSE) {
    $Number = $input->post("Number");
    $num_key = $input->post("num_key");

    $sql_read = "SELECT * from studentnumber WHERE Number ={$Number} and num_key={$num_key}";
    $read_result = $link->query($sql_read);

    if (empty($Number) || empty($num_key)) {
        echo "学号、密码均不能为空";
    } else {
        if ($read_result->fetch_array()) {
            $sql_write= "UPDATE `login` SET `user_number`= $Number WHERE `user_ID`=$user_ID";
            $write_result = $link->query($sql_write);
            if ($write_result) {
                //跳转至注册成功提示绑定的页面：binding_succ.php
                echo "<script language=\"javascript\">";
                echo "document.location=\"binding_succ.php\"";
                echo "</script>";
            } else {
                echo "绑定失败";
            }
        }
        else {
            echo "学号或密码错误";
        }

    }
}

?>

<?php
include("connect_User.php");
$user_ID="1";

//设定查询语句，用于显示用户昵称
$myquery="SELECT * FROM `login` WHERE `user_ID` = $user_ID";
$result=$link->query($myquery);
//创建记录集
$row=$result->fetch_array();

?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>换头像</title>
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
            <a href="Info_change.php" class="">
                <i class="am-header-icon am-icon-chevron-left"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="binding.html" class="">换头像</a>
        </h1>
        <!--      <div class="am-header-right am-header-nav">
                <a href="#right-link" class="">
                  <i class="am-header-icon  am-icon-home"></i>
                </a>
              </div>
        -->
    </header>
    <div class="cart-panel">
        你现在的头像是：
        <img align src="
       <?php echo $row["user_photo"]; ?>
        " height="150" width="150" / >
        <br></br>
        <form class="am-form" action="photo_change.php?act=chk" method="post">
            <div class="am-form-group am-form-icon">
                <i class="am-icon-user" style="color:#329cd9"></i>
                <input name="" type="text" class="am-form-field  my-radius" placeholder="请上传你的新头像（！这里还没做好，不能上传）">
            </div>
            <p class="am-text-center"><button type="text" class="am-btn am-btn-danger am-radius am-btn-block">确认</button></p>
            <!--这块儿还没弄-->
            <!--<p class="am-text-center"><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">确认</button></p>-->
        </form>
    </div>

    <!--<footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
        <div class="am-footer-miscs ">
            <p>&nbsp;</p>
        </div>

    </footer>-->
    <!--底部-->
    <div data-am-widget="navbar" class="am-navbar am-cf my-nav-footer " id="">
        <ul class="am-navbar-nav am-cf am-avg-sm-4 my-footer-ul">
            <li>
                <a href="index.html" class="">
                    <span class="am-icon-home"></span>
                    <span class="am-navbar-label">首页</span>
                </a>
            </li>
            <li>
                <a href="publish.html" class="">
                    <span class=" am-icon-comments"></span>
                    <span class="am-navbar-label">信息发布</span>
                </a>
            </li>
            <li>
                <a href="favorite.html" class="">
                    <span class="am-icon-user"></span>
                    <span class="am-navbar-label">收藏夹</span>
                </a>
            </li>
            <li>
                <a href="resume.html" class="">
                    <span class="am-icon-user"></span>
                    <span class="am-navbar-label">我的</span>
                </a>
            </li>
        </ul>
        <script>
            function showFooterNav(){
                $("#footNav").toggle();
            }
        </script>
    </div>
</div>
</body>
</html>


<?php

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

if($act!==FALSE){
    $user_name = $input->post("user_name");

    /*   $sql="SELECT * FROM `login` WHERE `user_ID` = $user_ID"; */

    $sql="update `login` set user_name='{$user_name}' where user_ID='{$user_ID}'";
    $result=$link->query($sql);

    if(empty($user_name)) {
        echo "昵称不能为空";
    }
    else {

        if($result){
            echo "<script language=\"javascript\">";
            echo "document.location=\"name_succ.php\"";
            echo "</script>";
        }
        else {
            echo "修改失败";
        }
    }
}



?>





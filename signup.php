<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册</title>
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
        <a href="signup.php" class="">注册</a>
      </h1>
<!--      <div class="am-header-right am-header-nav">
        <a href="#right-link" class="">
          <i class="am-header-icon  am-icon-home"></i>
        </a>
      </div>
-->
    </header>
    <div class="cart-panel">
        <form class="am-form" action="signup.php?act=chk" method="post">
			<div class="am-form-group am-form-icon">
                <i class="am-icon-user" style="color:#329cd9"></i>
                <input type="text" name="user_name" class="am-form-field  my-radius" placeholder="请输入您的昵称">
            </div>
            <div class="am-form-group am-form-icon">
                <i class="am-icon-phone" style="color:#329cd9"></i>
                <input type="text" name="user_ID" class="am-form-field  my-radius" placeholder="请输入您的手机号" >
            </div>
			<!--手机验证码部分
			<div class="am-form-group am-form-icon">
				<p class="am-text-center"><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">发送验证码</button></p>
				<input type="text" class="am-form-field  my-radius" placeholder="请输入该手机号接收到的验证码" >
			</div>-->
            <div class="am-form-group am-form-icon">
                <i class="am-icon-lock" style="color:#329cd9"></i>
                <input name="user_loginkey" type="password" class="am-form-field  my-radius" placeholder="请输入您的密码">
            </div>
            <div class="am-checkbox">
              <label>
                <input type="checkbox"> 记住密码
              </label>
            </div>
            <p class="am-text-center"><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">立即注册</button></p>
        </form>
    </div>
    
    <footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
      <div class="am-footer-miscs ">
        <p>&nbsp;</p>
      </div>
      <div class="am-footer-miscs ">
       <a href="login.php"><p class="am-text-center"><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">已注册？点击登录</button></p>
	   </a>
      </div>
    </footer>
    <!--底部-->
    <!--<div data-am-widget="navbar" class="am-navbar am-cf my-nav-footer " id="">
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
    </div>-->
</div>
</body>
</html>



<?php
include("connect_User.php");
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
    $user_ID = $input->post("user_ID");
    $user_loginkey = $input->post("user_loginkey");

    $sql_read="SELECT * from login WHERE user_ID={$user_ID}";
    $link_result=$link->query($sql_read);

    if(empty($user_name)|| empty($user_ID)|| empty($user_loginkey)) {
        echo "昵称、手机号和密码均不能为空";
    }
    else {
        if($link_result->fetch_array()){
            echo "您的手机号已注册，请直接登录";
        }
        else { //用户确实没注册过，空也都填上了
            //将昵称手机号密码写入用户信息表
            $sql_write="INSERT INTO `login`(`user_ID`, `user_loginkey`, `user_name`,`user_photo`) VALUES ($user_ID,$user_loginkey,'$user_name','')";
            $is=$link->query($sql_write);
            if($is){  //跳转至注册成功提示绑定的页面：signup_b.php
                echo "<script language=\"javascript\">";
                echo "document.location=\"signup_b.php\"";
                echo "</script>";
            }
            else {
                echo "no";
            }

            }
        }
}

?>

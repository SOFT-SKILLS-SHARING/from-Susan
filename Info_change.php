<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>更改个人信息</title>
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
            <a href="" class="">更改个人信息</a>
        </h1>
        <!--      <div class="am-header-right am-header-nav">
                <a href="#right-link" class="">
                  <i class="am-header-icon  am-icon-home"></i>
                </a>
              </div>
        -->
    </header>
    <!--<div class="am-form-group am-form-icon">
        <p align="center"><br>欢迎使用
    </div>-->
    <div class="cart-panel">
        <p class="am-text-center"><a href="photo_change.php" class="am-btn am-btn-danger am-radius am-btn-block">换头像</a></p>
        <p class="am-text-center"><a href="name_change.php" class="am-btn am-btn-danger am-radius am-btn-block">改昵称</a></p>
        <p class="am-text-center"><a href="resume_edit.php" class="am-btn am-btn-danger am-radius am-btn-block">编辑简历</a></p>
    </div>

    <footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
        <div class="am-footer-miscs ">
            <p>&nbsp;</p>
        </div>
    </footer>
    <!--底部-->

    <div data-am-widget="navbar" class="am-navbar am-cf my-nav-footer " id="">
        <ul class="am-navbar-nav am-cf am-avg-sm-4 my-footer-ul">
            <li>
                <a href="index.php" class="">
                    <span class="am-icon-home"></span>
                    <span class="am-navbar-label">首页</span>
                </a>
            </li>
            <li>
                <a href="publish.php" class="">
                    <span class=" am-icon-comments"></span>
                    <span class="am-navbar-label">信息发布</span>
                </a>
            </li>
            <li>
                <a href="shoucang.php" class="">
                    <span class="am-icon-user"></span>
                    <span class="am-navbar-label">收藏夹</span>
                </a>
            </li>
            <li>
                <a href="user.php" class="">
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
error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息

//点击进入平台
if($_GET["action"]=="login"){
    echo "<script language=\"javascript\">";
    echo "document.location=\"index.html\"";
    echo "</script>";
}

?>

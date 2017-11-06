<?php
include("db.php");
$user_ID="1";

//设定查询语句，用于显示用户昵称
$myquery="SELECT * FROM `resume` WHERE `user_ID` = $user_ID";
$result=$link->query($myquery);
//创建记录集
$row=$result->fetch_array();

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑简历</title>
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
            <a href="resume_edit.php" class="">编辑简历</a>
        </h1>
        <!--      <div class="am-header-right am-header-nav">
                <a href="#right-link" class="">
                  <i class="am-header-icon  am-icon-home"></i>
                </a>
              </div>
        -->
    </header>
    <div class="cart-panel">
        你现在的简历是：
        <?php echo $row["user_resume"];?>
        <br>请填写你的新简历
        <br></br>
        <form class="am-form" action="resume_edit.php?act=chk" method="post">
            <div class="">
                <textarea name="user_resume" rows="10" cols="33">
                <?php echo $row['user_resume'];?>
                </textarea>
            </div>

            <p class="am-text-center"><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">确认</button></p>
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
                <a href="shoucnag.php" class="">
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
    $user_resume = $input->post("user_resume");

    $sql="update `resume` set user_resume='{$user_resume}' where user_ID='{$user_ID}'";
    $result=$link->query($sql);

    if(empty($user_resume)) {
        echo "简历不能为空";
    }
    else {
        if($result){
            echo "<script language=\"javascript\">";
            echo "document.location=\"resume_succ.php\"";
            echo "</script>";
        }
        else {
            echo "修改失败";
        }
    }
}



?>





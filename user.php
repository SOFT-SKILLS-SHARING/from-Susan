<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的</title>
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
            <a href="index.html" class="">
                <i class="am-header-icon am-icon-chevron-left"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="resume.html" class="">我的</a>
        </h1>
        <!--
              <div class="am-header-right am-header-nav">
                <a href="#right-link" class="">
                  <i class="am-header-icon  am-icon-home"></i>
                </a>
              </div>
        -->
    </header>
    <div class="uchome-info">
        <div align="center" class="uchome-info-uimg">
            <img align src="default/photo.jpg" / >
        </div>

    </div>
    <!--头部导航-->
    <div class="am-cf uchome-nav">
        <ul class="am-avg-sm-3">
            <li><a href="user.php">个人信息</a></li>
            <li><a href="login.php">账号</a></li>
            <li><a href="history.php">我的历史</a></li>

        </ul>
    </div>
    <!--
    <div class="my-nav-bar">
        <ol class="am-breadcrumb">
            <li><a href="user.html">个人信息</a></li>
        </ol>
    </div>-->



    <?php
    include("db.php");

    $user_ID="1";
    $table1="Login";
    $table2="Binding";
    $table3="resume";

    //设定查询语句，用于显示用户昵称
    $myquery1="SELECT * FROM `login` WHERE `user_ID` = $user_ID";
    $result1=$link->query($myquery1);
    //创建记录集
    $row1=$result1->fetch_array();

    //设定查询语句，用于显示用户学号
    $myquery2="SELECT * FROM `binding` WHERE `user_ID` = $user_ID";
    $result2=$link->query($myquery2);
    //创建记录集
    $row2=$result2->fetch_array();

    //查询用户简历，用于显示用户简历
    //设定查询语句
    $myquery3="SELECT * FROM `resume` WHERE `user_ID` = $user_ID";
    $result3=$link->query($myquery3);
    //创建记录集
    $row3=$result3->fetch_array();


    ?>




    <section data-am-widget="accordion" class="am-accordion am-accordion-gapped"
             data-am-accordion='{"multiple": true}'>
        <dl class="am-accordion-item am-active">
            <dt class="am-accordion-title">个人资料</dt>
            <dd class="am-accordion-bd am-collapse am-in">
                <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->

                <table class="am-table am-table-striped am-table-hover comm-table">
                    <thead>
                    <tr>
                        <th>昵称</th>
                        <th>手机号</th>
                        <th>学号</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td> <?php echo $row1['user_name'];?></td>
                        <td> <?php echo $user_ID;?></td>
                        <td> <?php echo $row2['user_Number'];?></td>
                    </tr>
                    </tbody>
                </table>

            </dd>
        </dl>
        <dl class="am-accordion-item">
            <dt class="am-accordion-title">简历</dt>
            <dd class="am-accordion-bd am-collapse ">
                <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->

                <!--<div class="am-accordion-content">
                    <dl class="my-category-dl">
                        <dt><a href="#" class="red2 am-cf">体育</a></dt>
                        <dd><a href="#">排球</a></dd>
                        <dd><a href="#">篮球</a></dd>
                        <dd><a href="#">跑步</a></dd><dd><a href="#">引体向上</a></dd><dd><a href="#">立定跳远</a></dd><dd><a href="#">仰卧起坐</a></dd><dd><a href="#">减肥</a></dd>
                    </dl>
                </div>-->
                <div data-tab-panel-0 class="am-tab-panel am-active">
                    <?php echo $row3["user_resume"];?>
                    <br><br><br><br>
                </div>
            </dd>
        </dl>
        <br><br>
        <input type="button" class="am-btn am-btn-danger am-radius am-btn-block" name="change" value="更改个人信息" onClick="location.href='Info_change.'"/>
    </section>
    <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

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




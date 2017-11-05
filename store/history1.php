<?php
include("connect_History.php");

$table1="TeachingHistory";
//设定查询语句
$myquery1="select * from $table1";
$result1=$link->query($myquery1);

$table2="LearningHistory";
//设定查询语句
$myquery2="select * from $table2";
$result2=$link->query($myquery2);

/*
//获取总记录数量
$row_cnt=$result->num_rows;
echo "<br>$table 表总记录数：$row_cnt <br>";
//获取字段数量
$fields=$result->field_count;
echo "$table 表的字段数量为：$fields <br><br>";

//输出表格，用于显示字段名称和记录
echo "<table border=1><tr>";
//循环获取字段名称
while ($finfo=$result->fetch_field()) {
    echo "<td> $finfo->name </td>";
}
echo "</tr>";
*/

//创建记录集
//$row=$result->fetch_array();
$rows1=array();
while($row1=$result1->fetch_array( MYSQLI_ASSOC)){//assoc只取关联数组
    $rows1[]=$row1;
}

$rows2=array();
while($row2=$result2->fetch_array( MYSQLI_ASSOC)){//assoc只取关联数组
    $rows2[]=$row2;
}

//循环输出记录
/* while ($row)
 {
     echo "<tr><td> $row[0]</td>";
     echo "<td> $row[1]</td>";
     echo "<td> $row[2] </td></tr> ";
     $row=$result->fetch_array();
 }
*/
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的历史</title>
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
            <a href="resume.html" class="">
                <i class="am-header-icon am-icon-chevron-left"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="resume.html" class="">我的</a>
        </h1>
        <!--      <div class="am-header-right am-header-nav">
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
            <li><a href="resume.html">我的简历</a></li>
            <li><a href="login.php">注册/登录/绑定</a></li>
            <li><a href="history.html">我的历史</a></li>

        </ul>
    </div>
    <div class="my-nav-bar">
        <ol class="am-breadcrumb">
            <li><a href="history.html">历史</a></li>
        </ol>
    </div>

    <div class="cart-panel">
        <h3>授课记录</h3>
        <div class="withdrawals-panel">
            <table class="am-table am-table-striped am-table-hover comm-table">
                <thead>
                <tr>
                    <th>课程</th>
                    <th>学生</th>
                    <th>时间</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows1 as $row1 ){
                    ?>
                    <tr>
                        <td> <?php echo $row1['class_content'];?></td>
                        <td> <?php echo $row1['class_student'];?></td>
                        <td> <?php echo $row1['class_time'];?></td>
                        <td> <?php echo "0";?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <h3>学习记录</h3>
        <div class="withdrawals-panel">
            <table class="am-table am-table-striped am-table-hover comm-table">
                <thead>
                <tr>
                    <th>课程</th>
                    <th>学生</th>
                    <th>时间</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rows2 as $row2 ){
                    ?>
                    <tr>
                        <td> <?php echo $row2['class_content'];?></td>
                        <td> <?php echo $row2['class_teacher'];?></td>
                        <td> <?php echo $row2['class_time'];?></td>
                        <td> <?php echo "0";?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <!--<div class="withdrawals-panel">
            <table class="am-table am-table-striped am-table-hover comm-table">
                <thead>
                <tr>
                    <th>课程</th>
                    <th>教师</th>
                    <th>时间</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>足球</td>
                    <td>111</td>
                    <td>2015-06-07</td>
                    <td>已结束</td>
                </tr>
                <tr>
                    <td>PS</td>
                    <td>222</td>
                    <td>2015-06-07</td>
                    <td>已结束</td>
                </tr>
                </tbody>
            </table>
        </div>-->
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


<?php
include ('db.php');
include ('input.class.php');//接收数据
$class_ID =$input->get('id');
echo "进入评价的课程的class_ID是";
echo $class_ID;

?>
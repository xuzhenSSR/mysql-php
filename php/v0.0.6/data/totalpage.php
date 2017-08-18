<?php
//1:设置响应头
//2:创建数据库连接并且设置编码
require("init.php");
//5:创建SQL语句并且发送SQL
$sql ="SELECT count(*) as page FROM jd_product";
//6:抓取多行记录
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($result);
//7:转换json发送
echo json_encode($rows);
?>
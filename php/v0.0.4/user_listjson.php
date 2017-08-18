<?php
//1:创建数据库连接设置编码
require("init.php");
//2:创建SQL语法并且发送SQL
$sql = "SELECT * FROM user";
//3:抓取多行记录
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//$rows = mysqli_fetch_assoc($result);
//4:转换json发送
echo  json_encode($rows);
//抓取一行 json 转换对象
//抓取多行 json 转换数组[对象]
?>
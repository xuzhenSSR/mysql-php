<?php
$uid = $_REQUEST["uid"];
//1:创建数据库连接设置编码
require("init.php");
//2:创建SQL语法并且发送SQL
$sql = "DELETE FROM user WHERE uid=$uid";
//3:抓取多行记录
$result = mysqli_query($conn,$sql);
if($result===false){
  echo '{"code":-1,"msg":"删除失败"}';
}else{
  echo '{"code":1,"msg":"删除成功"}';
}
?>
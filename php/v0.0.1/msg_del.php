<?php
 //功能:删除指定留言
 //1:获取参数mid
 @$mid = $_REQUEST["mid"]or die("编号是必须的");
 //2:创建连接并且设置编码
 require("init.php");
 //3:创建sql并且发送sql
 $sql = "DELETE FROM msg WHERE mid=$mid";
 $result = mysqli_query($conn,$sql);
 //4:判断
 if($result===false){
   echo "删除失败";
 }else{
   //获取 DML 影响行数
   $row = mysqli_affected_rows($conn);
   if($row>0){
     echo "删除成功";
   }else{
     echo "操作错误请重试 <a href='msg_select.php'>回退</a>";
   }
 }
?>
<?php
   //功能:获取用户提交用户名查询是否存在
   @$u = $_REQUEST["uname"]or die("用户名是必须的");
   //1:创建连接
   //2:设置编码
   require("init.php");
   //3:创建SQL并且发送SQL
   $sql = " SELECT * FROM user";
   $sql .= " WHERE uname = '$u'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
   //4:判断???
   if($row===NULL){
     echo "欢迎使用";
   }else{
     echo "此用户名太受欢迎了，请改换一个";
   }
?>
<?php
   //功能:获取用户提交用户名查询是否存在
   @$u = $_REQUEST["uname"]or die("用户名是必须的");
   @$p = $_REQUEST["upwd"]or die("密码是必须的");
   //1:创建连接
   //2:设置编码
   require("init.php");
   //3:创建SQL并且发送SQL
   $sql = " SELECT * FROM user";
   $sql .= " WHERE uname = '$u'";
   $sql .= " AND upwd='$p'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
   if($row===NULL){
      echo "用户名或密码有误";
   }else{
      echo "登录成功";
   }

    //错误集锦:
	//原因:sql语句
    //mysqli_fetch_assoc() expects parameter 1 //to be mysqli_result, boolean given in 
?>
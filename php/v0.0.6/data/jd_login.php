<?php
  //1:设置响应格式json
  //2:创建数据库连接并且设置编码
  require("init.php");
  //3:获取参数 uname upwd
  @$u=$_REQUEST["uname"]or die('{"code":-1,"msg":"用户名是必须的"}');
  @$p=$_REQUEST["upwd"]or
  die('{"code":-2,"msg":"密码是必须的"}');
  //4:创建SQL语句并且发送SQL
  $sql = "SELECT * FROM jd_user";
  $sql .=" WHERE uname='$u' AND";
  $sql .=" upwd='$p'";
  //5:抓取一行记录
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  //6:判断
  //7:输出
  if($row===null){
   echo '{"code":-3,"msg":"用户名或密码有误"}';
  }else{
   $uid = $row['uid'];
   echo '{"code":1,"msg":"登录正确","uid":'.$uid.'}';
  }
?>
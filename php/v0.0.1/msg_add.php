<?php
 //功能:获取用户提交参数 uname;phone;content
 //将数据添加至mysql并且返回成功或者失败
 //1:获取参数
 @$u = $_REQUEST["uname"]or die("用户名是必须的");
 @$p = $_REQUEST["phone"]or die("电话是必须的");
 @$c = $_REQUEST["content"]or die("内容是必须的");
 //2:创建数据库连接并且设置编码
 //写一个简单方法,将常用代码保存在一个文件中
 //init.php 
 //加载php文件:require("init.php");
 require("init.php");
 //3:创建SQL并且发送SQL
 $sql = "INSERT INTO msg VALUES(null,'$u','$p',now(),'$c')";
 $result = mysqli_query($conn,$sql);
 //4:获取返回结果
 //5:判断输出
 if($result===false){
	 echo "添加失败";
 }else{
     echo "添加成功";
 }
 // http://127.0.0.1/day04/msg/msg_add.php?uname=tom&phone=1399&content=hello
?>
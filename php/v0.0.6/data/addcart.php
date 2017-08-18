<?php
  //11:30--11:40
  require("init.php");
  //获取二个参数 uid pid
  @$uid=$_REQUEST["uid"]or die('{"code":-1,"msg":"用户编号是必须的"}');
  @$pid=$_REQUEST["pid"]or die('{"code":-2,"msg":"产品编号是必须的"}');
  //查询是否正在指定记录，如果存在更新数量
  //                      如果不存在添加
  //1:设置响应格式
  //2:创建数据库连接并且设置编码
  //创建三条SQL
  //3:查询
  $sql="SELECT * FROM jd_cart WHERE uid=$uid AND pid=$pid";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  //最后添加数量
  $c = 1;
  if($row!==null){
  //4:更新
  $sql = "UPDATE jd_cart SET count=count+1";
  $sql .= " WHERE uid=$uid AND pid=$pid";
  $result = mysqli_query($conn,$sql);
  $c = $row["count"]+1;
  }else{
  //5:添加
  $sql = "INSERT INTO jd_cart VALUES(null,$uid,$pid,1)";
  $result = mysqli_query($conn,$sql);
  }
  echo '{"code":1,"msg":"购物数量'.$c.'"}';


   //错误集锦:
  //expects parameter 1 to 
  //be mysqli_result, boolean given
  //原因:sql语句

?>
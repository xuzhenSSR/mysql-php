<?php
  //功能:向汽车信息表中添加记录
  //1:获取三个参数 cname;pic;buycount
  @$n = $_REQUEST["cname"]or die("汽车名称是必须的");
  @$p = $_REQUEST["cpic"]or die("汽车图片是必须的");
  @$c = $_REQUEST["buycount"]or die("汽车购买数量是必须的");
  //2:创建连接设置编码
  require("init.php");
  //3:创建SQL语句并且发送SQL
  $sql = "INSERT INTO car VALUES(null,'$n','$p',20000,$c,1)";
  //4:判断结果
  $result = mysqli_query($conn,$sql);
  if($result===false){
    echo "添加失败";
	echo mysqli_error($conn);
	echo "<hr/>";
	echo $sql;
  }else{
    echo "添加成功";
  }

//错误集锦:
//SQL syntax  SQL语法语法;

?>
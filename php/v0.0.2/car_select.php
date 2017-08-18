<?php
 //功能:查询
 //1:创建连接
 //2:设置编码
 require("init.php");
 //3:创建SQL语句 图片,价格,类别名称
 //多表查询分三步
 //a:将多个表名保存from后
 //   from cartype,car;
 //b:给每张表起一个别名
 //   from cartype t,car c;
 //c:找二个表之间关系{列= < >}
 //   where t.tid=c.tid;
 $sql = " SELECT c.cid,c.cpic,c.cprice,t.tname";
 $sql .= " FROM cartype t,car c";
 $sql .= " WHERE t.tid=c.tid";
 //4:发送SQL语句
 $result = mysqli_query($conn,$sql);
 //5:抓取多行记录
 $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<table border="1" width="90%">
  <thead>
   <tr>
    <td>汽车图片</td>
    <td>汽车价格</td>
    <td>类别名称</td>
    <td>操作</td>
   </tr>
  </thead>
  <tbody id="tb1">
    <?php
	  foreach($rows as $k=>$v){
      echo "<tr>";
      echo "<td><img src='img/$v[cpic]'  width='120' /></td>";
      echo "<td>$v[cprice]</td>";
      echo "<td>$v[tname]</td>";
      echo "<td><a href='$v[cid]' class='btn-del'>删除</a></td>";
      echo "</tr>";
	  }
	?>
  </tbody>
</table>

<script>
    //1:获取父元素为其绑定点击事件
    tb1.onclick = function(e){
	  //2:阻止事件默认行为
	  //a 默认行为跳转<-->禁止跳转
	  e.preventDefault();
      //3:获取目标对象
	  //4:判断是否当前a
	  var target = e.target;
	  if(target.className==="btn-del"){
		  //5:获取当前汽车编号
		  var cid = target.getAttribute("href");
		  //6:询问是否删除
		  var rs = window.confirm("是否删除");
		  //7:自动跳转 location.href
		  if(rs===true){
		     location.href = "car_del.php?cid="+cid;
		  }
	  }
	}
</script>